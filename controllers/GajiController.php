<?php

namespace app\controllers;

use Yii;
use app\models\Gaji;
use app\models\GajiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GajiController implements the CRUD actions for Gaji model.
 */
class GajiController extends Controller
{
	public $selected = 'KEUANGAN';
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gaji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GajiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionDetail()
	{
		$id = $_GET['id'];
		$tanggal = $_GET['tanggal'];
		$bulan = $_GET['bulan'];
		
		if($bulan == '-' && $tanggal != '-')
		{
			$bulan = date('n', strtotime($tanggal));
		}
		
		 return $this->render('detail', [
            'id' => $id,
            'tanggal' => $tanggal,
			'bulan'=>$bulan,
        ]);
	}
	
	public function actionExcel($id, $bulan)
	{
		$fp = fopen("export/Export_Gaji_$bulan.csv", 'w');
		
		$sql = "select nama, sum(jam_lembur) as jam_lembur, sum(gaji_lembur) as gaji_lembur,
			sum(uang_makan) as uang_makan, sum(gaji_harian) as gaji_harian, sum(total_gaji) as total_gaji
			from gaji where id_proyek = '" . $id . "' and month(created_date) = $bulan group by nama order by nama";
		$models = Gaji::findBySql($sql)->all();
	
		$data = array();
		$data[] = "NAMA";
		$data[] = "LEMBUR(JAM)";
		$data[] = "TOTAL LEMBUR";
		$data[] = "UANG MAKAN";
		$data[] = "GAJI HARIAN";
		$data[] = "TOTAL GAJI";
	
		fputcsv($fp, $data);
		foreach($models as $model)
		{	
			$data = array();
			$data[] = $model['nama'];
			$data[] = number_format($model['jam_lembur']);
			$data[] = number_format($model['gaji_lembur']);
			$data[] = number_format($model['uang_makan']);
			$data[] = number_format($model['gaji_harian']);
			$data[] = number_format($model['total_gaji']);;
			
			
			fputcsv($fp, $data);
			
			
			
		}
		
		
		fclose($fp);
		
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		
		// force download  
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");

		// disposition / encoding on response body
		header('Content-type: text/csv');
		header("Content-Disposition: attachment;filename=Export_Gaji_$bulan.csv");
		header("Content-Transfer-Encoding: binary");
		readfile("export/Export_Gaji_$bulan.csv");
	}
	
	public function actionRekapBulanan($id, $bulan)
	{
		return  $this->render('rekap_bulanan', [
			'id'=>$id,
			'bulan'=>$bulan
            
        ]);
	}

    /**
     * Displays a single Gaji model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Gaji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Gaji();
		$model->id_proyek = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $model->id_proyek]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionSave()
	{
		$id = $_POST['id'];
		$status = $_POST['status'];
		$nama = $_POST['nama'];
		$jam_lembur = $_POST['jam_lembur'];
		$uang_lembur = $_POST['uang_lembur'];
		$uang_makan = $_POST['uang_makan'];
		$gaji_harian = $_POST['gaji_harian'];
		
		$model = Gaji::findOne($id);
		if($model)
		{
			$model->nama = $nama;
			$model->status = 1;
			$model->jam_lembur = $jam_lembur;
			$model->uang_lembur = $uang_lembur;
			$model->uang_makan = $uang_makan;
			$model->gaji_harian = $gaji_harian;
			$model->total_gaji = $uang_lembur + $uang_makan + $gaji_harian;
			$model->save();
		}
		
		return "OK";
	}
	
	public function actionRekap($id)
    {
     
      
            return $this->render('rekap', [
'id'=>$id,			
            ]);
      
    }


    /**
     * Updates an existing Gaji model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_gaji]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Gaji model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gaji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gaji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gaji::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

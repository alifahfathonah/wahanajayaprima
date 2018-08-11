<?php

namespace app\controllers;

use Yii;
use app\models\RitasiAspal;
use app\models\RitasiAspalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RitasiAspalController implements the CRUD actions for RitasiAspal model.
 */
class RitasiAspalController extends Controller
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
	
	public function actionExcel($id, $bulan)
	{
		$fp = fopen("export/Export_RitasiAspal_$bulan.csv", 'w');
		
		$sql = "select a.*, b.nama_basecamp, no_polisi, c.nama_proyek from ritasi_aspal a join proyek b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_aspal d on d.id_kendaraan = a.id_kendaraan where  id_proyek = '" . $id . "' and month(a.created_date) = $bulan order by a.created_date desc";
		$models = RitasiAspal::findBySql($sql)->all();
	
		$data = array();
		$data[] = "NO POLISI";
		$data[] = "TANGGAL";
		$data[] = "ASAL";
		$data[] = "TUJUAN";
		$data[] = "ASPAL";
		$data[] = "UKURAN";
		$data[] = "SATUAN";
		$data[] = "KETERANGAN";
	
		fputcsv($fp, $data);
		foreach($models as $model)
		{	
			$data = array();
			$data[] = $model['no_polisi'];
			$data[] = date('d/m/Y', strtotime($model['created_date']));
			$data[] = ($model['nama_basecamp']);
			$data[] = ($model['nama_proyek']);
			$data[] = ($model['aspal']);
			$data[] = ($model['ukuran']);
			$data[] = ($model['satuan']);
			$data[] = ($model['keterangan_berangkat']);
			
			
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
		header("Content-Disposition: attachment;filename=Export_RitasiAspal_$bulan.csv");
		header("Content-Transfer-Encoding: binary");
		readfile("export/Export_RitasiAspal_$bulan.csv");
	}

    /**
     * Lists all RitasiAspal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RitasiAspalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RitasiAspal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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
	
	public function actionRekapBulanan($id, $bulan)
	{
		return  $this->render('rekap_bulanan', [
			'id'=>$id,
			'bulan'=>$bulan
            
        ]);
	}
	
	public function actionRekap($id)
    {
     
      
            return $this->render('rekap', [
'id'=>$id,			
            ]);
      
    }

    /**
     * Creates a new RitasiAspal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_kendaraan)
    {
		$model = RitasiAspal::find()->where("id_kendaraan = $id_kendaraan and jarak is null")->one();		
		if(!$model)
		{
			$model = new RitasiAspal();
			$model->tanggal = date('d/m/Y');
		}
				
		$model->id_kendaraan = $id_kendaraan;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id_kendaraan' => $model->id_kendaraan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RitasiAspal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ritasi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RitasiAspal model.
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
     * Finds the RitasiAspal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RitasiAspal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RitasiAspal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

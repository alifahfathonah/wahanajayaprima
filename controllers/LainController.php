<?php

namespace app\controllers;

use Yii;
use app\models\Lain;
use app\models\LainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LainController implements the CRUD actions for Lain model.
 */
class LainController extends Controller
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
	
	public function actionRekapBulanan($id, $bulan)
	{
		return  $this->render('rekap_bulanan', [
			'id'=>$id,
			'bulan'=>$bulan
            
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
	
	public function actionSave()
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		$harga_satuan = $_POST['harga_satuan'];
		
		$model = Lain::findOne($id);
		if($model)
		{
			$model->nama_barang = $nama;
			$model->jumlah = $jumlah;
			$model->harga_satuan = $harga_satuan;
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
     * Lists all Lain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lain model.
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
     * Creates a new Lain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Lain();
		$model->id_proyek = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['create', 'id' => $model->id_proyek]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Lain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_lain]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lain model.
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
     * Finds the Lain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

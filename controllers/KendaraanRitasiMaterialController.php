<?php

namespace app\controllers;

use Yii;
use yii\helpers\Json;
use app\models\KendaraanRitasiMaterial;
use app\models\KendaraanRitasiMaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KendaraanRitasiMaterialController implements the CRUD actions for KendaraanRitasiMaterial model.
 */
class KendaraanRitasiMaterialController extends Controller
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
     * Lists all KendaraanRitasiMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KendaraanRitasiMaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KendaraanRitasiMaterial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	public function actionList()
	{
		$models = KendaraanRitasiMaterial::find()->where("1=1")->all();
		$result = "";
		
		$sql = "select count(*) as total from user_lokasi where tipe_lokasi = 'Basecamp' and id_user = " . Yii::$app->user->identity->id . "";
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$proyek = $command->queryScalar();
		if($proyek) {
			$models = KendaraanRitasiMaterial::find()->where("1=1")->all();
		}
		else{
			$models = KendaraanRitasiMaterial::find()->where("id_kendaraan in (select id_kendaraan from ritasi_material where jam_tiba is null and tujuan in (select id_lokasi from user_lokasi where tipe_lokasi = 'Proyek' and id_user = " . Yii::$app->user->identity->id . "))")->all();
		}
		
		foreach($models as $model)
		{
			$result.="<a class='btn' href='" . Yii::$app->urlManager->createUrl(['ritasi-material/create', 'id_kendaraan'=>$model->id_kendaraan]) . "' style='margin-left:10px;background-color:#01579B;color:white;'>" . $model->no_polisi."</a><br/><br/>";
		}
		echo Json::encode($result);
	}

    /**
     * Creates a new KendaraanRitasiMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new KendaraanRitasiMaterial();
		$model->id_proyek = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ritasi-material/create', 
				'id_kendaraan' => $model->id_kendaraan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KendaraanRitasiMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kendaraan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KendaraanRitasiMaterial model.
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
     * Finds the KendaraanRitasiMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KendaraanRitasiMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KendaraanRitasiMaterial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

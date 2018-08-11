<?php

namespace app\controllers;

use Yii;
use yii\helpers\Json;
use app\models\KendaraanRitasiAspal;
use app\models\KendaraanRitasiAspalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KendaraanRitasiAspalController implements the CRUD actions for KendaraanRitasiAspal model.
 */
class KendaraanRitasiAspalController extends Controller
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
     * Lists all KendaraanRitasiAspal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KendaraanRitasiAspalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KendaraanRitasiAspal model.
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
		$models = KendaraanRitasiAspal::find()->where("1=1")->all();
		$result = "";
		foreach($models as $model)
		{
			$result.="<a class='btn' href='" . Yii::$app->urlManager->createUrl(['ritasi-aspal/create', 'id_kendaraan'=>$model->id_kendaraan]) . "' style='margin-left:10px;background-color:#01579B;color:white;'>" . $model->no_polisi."</a><br/><br/>";
		}
		echo Json::encode($result);
	}

    /**
     * Creates a new KendaraanRitasiAspal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new KendaraanRitasiAspal();
		$model->id_proyek = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ritasi-aspal/create', 
				'id_kendaraan' => $model->id_kendaraan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KendaraanRitasiAspal model.
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
     * Deletes an existing KendaraanRitasiAspal model.
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
     * Finds the KendaraanRitasiAspal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KendaraanRitasiAspal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KendaraanRitasiAspal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

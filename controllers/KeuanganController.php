<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PasswordForm;
use app\models\User;
use app\models\Proyek;




class KeuanganController extends Controller
{
	public $selected = 'KEUANGAN';	
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'logout'],
                'rules' => [
     				[
						'allow' => true,
						'actions' => ['index'],
						'roles' => ['@'],
					],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	
    public function actionIndex()
    {
	
		return $this->render('index', [
			
				
        ]);
    }

	public function actionHarian()
    {
	
		return $this->render('harian', [
			
				
        ]);
    }
	
	public function actionSubHarian($id)
    {
	
		return $this->render('sub_harian', [
			'id'=>$id,
				
        ]);
    }
	
	public function actionBulanan()
    {
	
		return $this->render('bulanan', [
			
				
        ]);
    }
	
	public function actionSubBulanan($id)
    {
	
		return $this->render('sub_bulanan', [
			'id'=>$id,
				
        ]);
    }
	
	public function actionRekap($id)
    {
	
		return $this->render('rekap', [
			'id'=>$id,
				
        ]);
    }

} 

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

use app\models\UserLogin;


class SiteController extends Controller
{
	public $selected = 'Dashboard';	
	
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
		
		$sql = "select count(*) from proyek where tipe = 'Proyek'";
		$totalProyek = Proyek::findBySql($sql)->scalar();
		
		$sql = "select count(*) from proyek where tipe = 'Basecamp'";
		$totalBasecamp = Proyek::findBySql($sql)->scalar();
		
		
		
		return $this->render('index', [
				'totalProyek'=>($totalProyek),
				'totalBasecamp'=>$totalBasecamp,
				
        ]);
    }

    public function actionLogin()
    {
		$this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {											
			$m = new UserLogin();
			$m->username = $model->username;
			$m->tanggal = date('Y-m-d h:i:s');
			$m->save();
			
			return $this->goBack();			
        }		
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }   
	
	  public function actionPassword(){
        $model = new PasswordForm;
        $modeluser = User::find()->where([
            'username'=>Yii::$app->user->identity->username
        ])->one();
     
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{					
                    $modeluser->password = ($_POST['PasswordForm']['newpass']);
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'password_success','Password berhasil diubah'
                        );						
                        return $this->redirect(['password']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'password_error','Password gagal diubah'
                        );
                        return $this->redirect(['password']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'password_error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }
} 

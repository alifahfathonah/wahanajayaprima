<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RitasiMaterial;
use app\models\RitasiAspal;
use app\models\PasswordForm;
use app\models\User;
use app\models\Proyek;

use app\models\HistoryLokasi;
use app\models\Pengumuman;
use app\models\UserAkses;
use app\models\UserLokasi;


class AdminController extends Controller
{
	public $selected = 'ADMIN';	
	
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

	public function actionHistory()
    {
	
		return $this->render('history', [
			
				
        ]);
    }
	
	public function actionData()
    {
	
		return $this->render('data', [
		
				
        ]);
    }
	
	public function actionDaftar()
    {
	
		return $this->render('daftar', [
			
				
        ]);
    }
	
	public function actionLogin()
	{
		return $this->render('login', [
			
				
        ]);
	}
	
	public function actionLokasi()
	{
		$model  = new HistoryLokasi;
		return $this->render('lokasi', [
			'model'=>$model
				
        ]);
	}
	
	public function actionKeuangan()
	{
		
		return $this->render('keuangan', [
		
				
        ]);
	}
	
	public function actionBarang()
	{
		
		return $this->render('barang', [
		
				
        ]);
	}
	
	public function actionAlat()
	{
		
		return $this->render('alat', [
		
				
        ]);
	}
	
	public function actionDkeuangan()
    {
       return $this->render('detail_keuangan', [
			
				
        ]);
    }
	
	public function actionDbarang()
    {
       return $this->render('detail_barang', [
			
				
        ]);
    }
	
	public function actionDalat()
    {
       return $this->render('detail_alat', [
			
				
        ]);
    }
	
	public function actionFpersonil()
    {
       return $this->render('daftar_personil', [
			
				
        ]);
    }
	
	public function actionDlokasi()
	{
		
		return $this->render('daftar_lokasi_edit', [
		
		]);
       
	}
	
	public function actionEditlokasi($id)
	{
		$model = Proyek::find($id)->one();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['dlokasi']);
        } else {
			$diff =time() -  strtotime($model->tanggal_kontrak);
				$diff = floor($diff/3600/24);
				$model->sisa_hari = $diff;
            return $this->render('edit_lokasi', [
                'model' => $model,
            ]);
        }		
	}
	
	public function actionEditbasecamp($id)
	{
		$model = Proyek::find($id)->one();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['dlokasi']);
        } else {
            return $this->render('edit_basecamp', [
                'model' => $model,
            ]);
        }		
	}
	
	public function actionDpersonil()
	{
		$model = new User;
       
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['fpersonil']);
        } else {
            return $this->render('create_personil', [
                'model' => $model,
            ]);
        }		
	}
	
	public function actionDpengumuman()
    {
	   $model = new Pengumuman;
       $last = (Pengumuman::find()->orderBy("created_date desc")->one()); 
	   if($last != null)
	   {
		   $model->prev = strtoupper($last->judul_pengumuman);
	   }
	 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['dpengumuman']);
        } else {
            return $this->render('create_pengumuman', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionEditkeuanganbulanan()
    {
       return $this->render('edit_keuangan', [
			
				
        ]);
    }
	
	public function actionHapuskeuanganbulanan()
    {
       //return $this->render('hapus_keuangan', [
			
				
        //]);
		if(isset($_POST['bulan']))
		{		
			$connection = Yii::$app->getDb();
		
			$command = $connection->createCommand('
			delete from ritasi_material where month(tanggal) = ' . $_POST['bulan']);

			$result = $command->execute();
			
			$command = $connection->createCommand('
			delete from ritasi_aspal where month(tanggal) = ' . $_POST['bulan']);

			$result = $command->execute();
			return $this->redirect(['hapusritasimaterialbulanan']);
		}
		else{
			return $this->render('hapus_ritasi_material_bulanan', [
				
					
			]);
		}
    }
	
	public function actionEditritasimaterialbulanan()
	{
		if(isset($_POST['bulan']))
		{		
			$connection = Yii::$app->getDb();
			
			return $this->render('edit_ritasi_material_bulanan', ['bulan'=>$_POST['bulan']]);
		}
		else if(isset($_POST['bulansave']))
		{		
			$id = $_POST['id'];
			$model = RitasiMaterial::findOne($id);
			$model->no_polisi = $_POST['no_polisi'];
			
			$model->material = $_POST['material'];
			$model->ukuran = $_POST['ukuran'];
			$model->satuan = $_POST['satuan'];
			$model->keterangan_berangkat = $_POST['keterangan_berangkat'];
			$model->save(false);
			
			return $this->render('edit_ritasi_material_bulanan', ['bulan'=>$_POST['bulansave']]);
		}
		else{
			return $this->render('edit_ritasi_material_bulanan', [
				
					
			]);
		}
	}
	
	public function actionEditritasiaspalbulanan()
	{
		if(isset($_POST['bulan']))
		{		
			$connection = Yii::$app->getDb();
			
			return $this->render('edit_ritasi_aspal_bulanan', ['bulan'=>$_POST['bulan']]);
		}
		else if(isset($_POST['bulansave']))
		{		
			$id = $_POST['id'];
			$model = RitasiAspal::findOne($id);
			$model->no_polisi = $_POST['no_polisi'];
			
			$model->aspal = $_POST['aspal'];
			$model->ukuran = $_POST['ukuran'];
			$model->satuan = $_POST['satuan'];
			$model->keterangan_berangkat = $_POST['keterangan_berangkat'];
			$model->save(false);
			
			return $this->render('edit_ritasi_aspal_bulanan', ['bulan'=>$_POST['bulansave']]);
		}
		else{
			return $this->render('edit_ritasi_aspal_bulanan', [
				
					
			]);
		}
	}
	
	public function actionHapusritasimaterialbulanan()
	{
		if(isset($_POST['bulan']))
		{		
			$connection = Yii::$app->getDb();
		
			$command = $connection->createCommand('
			delete from ritasi_material where month(tanggal) = ' . $_POST['bulan']);

			$result = $command->execute();
			return $this->redirect(['hapusritasimaterialbulanan']);
		}
		else{
			return $this->render('hapus_ritasi_material_bulanan', [
				
					
			]);
		}
	}
	
	public function actionHapusritasiaspalbulanan()
	{
		if(isset($_POST['bulan']))
		{		
			$connection = Yii::$app->getDb();
		
			$command = $connection->createCommand('
			delete from ritasi_aspal where month(tanggal) = ' . $_POST['bulan']);

			$result = $command->execute();
			return $this->redirect(['hapusritasiaspalbulanan']);
		}
		else{
			return $this->render('hapus_ritasi_aspal_bulanan', [
				
					
			]);
		}
	}
	
	public function actionLbasecamp()
    {
		
		return $this->render('daftar_basecamp', [
			
		]);
   
    }
	
	public function actionDprofile()
	{
		 return $this->render('daftar_profile', [
			
				
        ]);
	}
	
	public function actionDuserakses($id)
	{
		$model = new UserAkses();	
		$model->id_user = $id;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['dprofile']);
        } else {
			
            return $this->render('create_user_akses', [
                'model' => $model,
            ]);
        }
	}
	
	public function actionDuserlokasi($id)
	{
		 $model = new UserLokasi();		
		 $model->id_user = $id;

		 if (isset($_POST['lokasi1']) || isset($_POST['lokasi2'])) {
			if (isset($_POST['lokasi1']))  {
				$connection = Yii::$app->getDb();
				$command = $connection->createCommand('
					delete from user_lokasi where id_user = ' . $id);
				$result = $command->execute();  
				
				$lokasi1 = $_POST['lokasi1'];
				foreach($lokasi1 as $l)
				{
					$m = new UserLokasi();
					$m->id_user = $id;
					$m->id_lokasi = $l;
					$m->tipe_lokasi = 'Proyek';
					$m->save();
				}
			}
			
			if (isset($_POST['lokasi2']))  {
				$connection = Yii::$app->getDb();
					
				$lokasi2 = $_POST['lokasi2'];
				foreach($lokasi2 as $l)
				{
					$m = new UserLokasi();
					$m->id_user = $id;
					$m->id_lokasi = $l;
					$m->tipe_lokasi = 'Basecamp';
					$m->save();
				}
			}
				
            return $this->redirect(['dprofile']);
        } else {
            return $this->render('create_user_lokasi', [
                'model' => $model,
            ]);
        }
	}
	
	
	public function actionDeletebasecamp()
	{
		 $id = $_POST['id'];
		 $model = Proyek::findOne($id);
		 if($model)
		 {
			 $model->delete();
		 }
		return $this->redirect(['lbasecamp']);
	}
	
	public function actionDeletepersonil()
	{
		 $id = $_POST['id'];
		 $model = User::findOne($id);
		 if($model)
		 {
			 $model->delete();
		 }
		return $this->redirect(['fpersonil']);
	}
	
	public function actionLlokasi()
    {
		
		return $this->render('daftar_lokasi', [
			
		]);
   
    }
	
	public function actionDeletelokasi()
	{
		 $id = $_POST['id'];
		 $model = Proyek::findOne($id);
		 if($model)
		 {
			 $model->delete();
		 }
		return $this->redirect(['llokasi']);
	}
	
	
	public function actionFlokasi()
    {
        $model = new Proyek();	
		$model->tipe = 'Proyek';		

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['flokasi']);
        } else {
            return $this->render('create_lokasi', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionFbasecamp()
    {
        $model = new Proyek();	
		$model->tipe = 'Basecamp';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['fbasecamp']);
        } else {
            return $this->render('create_basecamp', [
                'model' => $model,
            ]);
        }
    }
} 

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\date\DatePicker;
use app\models\Proyek;
use app\models\Basecamp;
use app\models\UserLokasi;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







/ DATA
<br/><br>

// USER PROFILE

<br/><br/>
/// LOKASI, <?php
	$user = User::find($model->id_user)->one();
	echo $user->username . ", " . $user->role;
	
?>
</h3>

	</div>


<div class="clearfix">
</div>

<div class="gaji-form" style="border:1px solid black">
<br/>



     <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
	
		<ul>				
			<?php
				$proyeks = Proyek::find()->where(["tipe"=>"Proyek"])->all();
				foreach($proyeks as $p) {?>
			<li><input type="checkbox" name="lokasi1[]" 
			<?php
				$userlokasi = UserLokasi::find()->where(["id_user"=>$model->id_user, "id_lokasi"=>$p->id, "tipe_lokasi"=>"Proyek"])->one();
				if($userlokasi) echo "checked";
			
			?>
			
			value="<?php echo $p->id;?>"/>&nbsp;<?php echo $p->nama_proyek;?></li>
				<?php } ?>
			<?php
				$proyeks = Proyek::find()->where(["tipe"=>"Basecamp"])->all();
				foreach($proyeks as $p) {?>
			<li><input 
			<?php
				$userlokasi = UserLokasi::find()->where(["id_user"=>$model->id_user, "id_lokasi"=>$p->id, "tipe_lokasi"=>"Basecamp"])->one();
				if($userlokasi) echo "checked";
			
			?>
			
			type="checkbox" name="lokasi2[]" value="<?php echo $p->id;?>"/>&nbsp;<?php echo $p->nama_basecamp;?></li>
				<?php } ?>
		</ul>
		
			
 
    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', ["style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br/>



<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/dprofile']);?>">KEMBALI</a>

<br/>

<script>
	
</script>
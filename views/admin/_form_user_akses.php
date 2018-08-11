<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\date\DatePicker;
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
/// EDIT AKSES, <?php
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
			<li>KEUANGAN
				<ul>
					<li><input type="checkbox" name="akses[]" value="A1"/>&nbsp;LAPORAN HARIAN (LAPANGAN)</li>
					<li><input type="checkbox" name="akses[]" value="A2"/>&nbsp;LAPORAN HARIAN (KANTOR)</li>
					<li><input type="checkbox" name="akses[]" value="A3"/>&nbsp;LAPORAN BULANAN</li>
				</ul>
			</li>
			<li><input type="checkbox" name="akses[]" value="D1"/>&nbsp;PROFIL PERUSAHAAN</li>
			<li><input type="checkbox" name="akses[]" value="E1"/>&nbsp;DOKUMEN PERUSAHAAN</li>			
			<li><input type="checkbox" name="akses[]" value="F1"/>&nbsp;PROFIL ANDA</li>
			<li>ADMIN
				<ul>
					<li><input type="checkbox" name="akses[]" value="G1"/>&nbsp;HISTORY</li>
					<li><input type="checkbox" name="akses[]" value="G2"/>&nbsp;DATA</li>
					<li><input type="checkbox" name="akses[]" value="G3"/>&nbsp;DAFTAR</li>
				</ul>
			</li>
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
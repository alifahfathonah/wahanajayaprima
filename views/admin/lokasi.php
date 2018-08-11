<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lokasi;
use app\models\UserLogin;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>






/ HISTORY

<br/><br>

<?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>

 <?php
	$a = ArrayHelper::map(Lokasi::find()->orderBy('nama_lokasi')->all(), 'id', 'nama_lokasi');
    echo $form->field($model, 'id_lokasi', 
	['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList
	($a,['prompt'=>'-Pilih Lokasi-', 'required'=>'required']);
	?>
	
	  <?php ActiveForm::end(); ?>
<br/><br>

</h3>

	</div>

	

<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/history']);?>">KEMBALI</a>

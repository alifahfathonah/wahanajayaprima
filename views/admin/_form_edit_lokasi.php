<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







/ DATA
<br/><br>

// <?php echo $model->nama_proyek;?>
<br/><br/>
/// DETIL LOKASI
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
		
		  <?= $form->field($model, 'penawar', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'autofocus'=>'autofocus' ]) ?>
	

   
    <?= $form->field($model, 'satker', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
	  <?= $form->field($model, 'paket', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
	<?= $form->field($model, 'provinsi', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	<?= $form->field($model, 'nomor_kontrak', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
	
	<div class="form-group required">
		<label class="col-md-3 control-label">Tanggal Kontrak</label>
		<div class="col-md-4">
	<?=  DatePicker::widget([
			'attribute' => 'tanggal_kontrak',
			'model'=>$model,
			'options' => ['placeholder' => 'Pilih Tanggal Kontrak ...', 'class'=>'form-control', 'required'=>'required'],
			'convertFormat' => true,
			 
			'pluginOptions' => [
				'format' => 'Y-M-d',
				'startDate' => '01-Mar-2016',
				'todayHighlight' => true,
				 'autoclose'=>true,
			]
		]); ?>
		</div>
	</div>
	
	<?= $form->field($model, 'masa_pelaksanaan', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
	<?= $form->field($model, 'sisa_hari', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'disabled'=>'disabled', 'autofocus'=>'autofocus']) ?>
	
	
 
    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', ["style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br/>



<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/dlokasi']);?>">KEMBALI</a>

<br/>

<script>
	
</script>
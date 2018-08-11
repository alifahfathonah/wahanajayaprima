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
<h3>LAPORAN HARIAN<br><br>

/ <?php $proyek = Proyek::findOne($model->id_proyek);
echo $proyek->nama_proyek;
?>


<br/><br>

// GAJI KARYAWAN
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

   
    <?= $form->field($model, 'nama', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
 <?= $form->field($model, 'jam_lembur', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'class'=>'form-control gaji', 'type'=>'number']) ?>

     <?= $form->field($model, 'uang_lembur', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required',  'class'=>'form-control gaji','type'=>'number']) ?>

    <?= $form->field($model, 'gaji_lembur', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'disabled'=>'disabled']) ?>
	
	<?= $form->field($model, 'uang_makan', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'class'=>'form-control gaji','type'=>'number']) ?>

    <?= $form->field($model, 'gaji_harian', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'class'=>'form-control gaji','type'=>'number']) ?>

  
    <?= $form->field($model, 'total_gaji', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'disabled'=>'disabled']) ?>

 
    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', ["style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br/>


<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-harian', 'id'=>$model->id_proyek]);?>">KEMBALI</a>

<br/>

<script>
	$(document).ready(function()
	{
		$(".gaji").change(function()
		{
			var jam_lembur = $("#gaji-jam_lembur").val();
			if(isNaN(jam_lembur)) jam_lembur = 0;
			
			var uang_lembur = $("#gaji-uang_lembur").val();
			if(isNaN(uang_lembur)) uang_lembur = 0;
			
			var total_lembur = jam_lembur * uang_lembur;
			$("#gaji-gaji_lembur").val(total_lembur);
			
			var uang_makan = $("#gaji-uang_makan").val();
			if(isNaN(uang_makan)) uang_makan = 0;
			
			var gaji_harian = $("#gaji-gaji_harian").val();
			if(isNaN(gaji_harian)) gaji_harian = 0;
			
			var total_gaji = parseInt(total_lembur) + parseInt(gaji_harian) + parseInt(uang_makan);
			if(isNaN(total_gaji)) total_gaji = 0;
			$("#gaji-total_gaji").val(total_gaji);
			
		});
	});
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Proyek;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Lain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>LAPORAN HARIAN<br><br>

/ <?php $proyek = Proyek::findOne($model->id_proyek);
echo $proyek->nama_proyek;
?>


<br/><br>

// LAINNYA
</h3>

	</div>


<div class="clearfix">
</div>


<div class="lain-form" style="border:1px solid black">
<br/>


      <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>

		
      <?= $form->field($model, 'nama_barang', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>

    <?= $form->field($model, 'jumlah', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'class'=>'form-control lain', 'type'=>'number']) ?>

     <?= $form->field($model, 'harga_satuan', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required',  'class'=>'form-control lain','type'=>'number']) ?>

    <?= $form->field($model, 'harga_total', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'disabled'=>'disabled']) ?>

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
		$(".lain").change(function()
		{
			var jumlah = $("#lain-jumlah").val();
			if(isNaN(jumlah)) jumlah = 0;
			
			var harga_satuan = $("#lain-harga_satuan").val();
			if(isNaN(harga_satuan)) harga_satuan = 0;
			
			var harga_total = jumlah * harga_satuan;
			$("#lain-harga_total").val(harga_total);
			
			
			
		});
	});
</script>
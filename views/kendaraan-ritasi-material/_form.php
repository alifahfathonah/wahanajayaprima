<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\KendaraanRitasiMaterial;
use app\models\Basecamp;
use app\models\Lokasi;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiMaterial */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<h3>LAPORAN HARIAN<br><br>


// RITASI MATERIAL
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
		
		 
		
		 <?php
	//$a = ArrayHelper::map(Proyek::find()->where("tipe = 'Basecamp' and  id in (select id_lokasi from user_lokasi where tipe_lokasi = 'Basecamp' and id_user = " . Yii::$app->user->identity->id . ")")->orderBy('nama_basecamp')->all(), 'id', 'nama_basecamp');
    /*echo $form->field($model, 'id_basecamp', 
	['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList
	($a,['prompt'=>'-Pilih Lokasi-', 'required'=>'required']);*/
	?>
		<button class="btn btn-add" style="margin-left:10px;background-color:#01579B;color:white;" >
		TAMBAH KENDARAAN
		</button><p>&nbsp;</p>

<div id="list" style="margin-left:10px;"></div>

	
		
	
		
     <?= $form->field($model, 'no_polisi', ['template'=>'<div id="kendaraan" class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>

     <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', ["style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn-simpan btn btn-success' : 'btn-simpan btn btn-primary']) ?>
		</div>
    </div>
	
	
		
		<br/><br/>

    <?php ActiveForm::end(); ?>

</div>

<br/>


<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-harian', 'id'=>$model->id_proyek]);?>">KEMBALI</a>

<br/>

<script>
	$(document).ready(function()
	{
		$("#kendaraan").hide();
		$(".btn-simpan").hide();
		$(".btn-add").click(function(){
			$("#kendaraan").show();	
			$(".btn-simpan").show();
		});
		
		$("#kendaraanritasimaterial-id_basecamp").change(function(){
			$("#list").html("");
			var id = $(this).val();
			if(id != ""){
				$.ajax({
					method:"GET",
					url:'<?php echo Yii::$app->urlManager->createUrl('kendaraan-ritasi-material/list'); ?>',	
					dataType: 'json',					
					cache:false,
					async:false,
					data: ({ 
							id:id,
							id_proyek:'<?php echo $model->id_proyek;?>'
							
						}),	
					success:function(data)
					{								
						$("#list").html(data);
					},
				});
			}
		});
		
			$("#list").html("");
			
				$.ajax({
					method:"GET",
					url:'<?php echo Yii::$app->urlManager->createUrl('kendaraan-ritasi-material/list'); ?>',	
					dataType: 'json',					
					cache:false,
					async:false,
					data: ({ 
							
						}),	
					success:function(data)
					{								
						$("#list").html(data);
					},
				});
			
	});
</script>
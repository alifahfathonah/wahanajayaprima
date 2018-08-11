<?php

use app\models\Proyek;
use app\models\KendaraanRitasiMaterial;
use yii\helpers\Html;
use app\models\Basecamp;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>LAPORAN BULANAN


<br/><br>

// RITASI MATERIAL

<br/><br>

/// <?php $kendaraan = KendaraanRitasiMaterial::findOne($model->id_kendaraan);
echo $kendaraan->no_polisi;
?>

</h3>

	</div>


<div class="clearfix">
</div>


<?php 
$disabled1 = 'disabled';
$disabled2 = 'disabled';


?>



<div class="gaji-form" style="border:1px solid black">
<br/>


     <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
		
		 <?php
	$a = ArrayHelper::map(Proyek::find()->where(["tipe"=>"Basecamp"])->orderBy('nama_basecamp')->all(), 'id', 'nama_basecamp');
    echo $form->field($model, 'asal', 
	['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList
	($a,[$disabled1=>$disabled1, 'prompt'=>'-Pilih Basecamp-']);
	


	
	?>
	
	 <?php
	$a = ArrayHelper::map(Proyek::find()->where(["tipe"=>"Proyek"])->orderBy('nama_proyek')->all(), 'id', 'nama_proyek');
    echo $form->field($model, 'tujuan', 
	['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList
	($a,[$disabled1=>$disabled1, 'prompt'=>'-Pilih Proyek-']);
	


	
	?>
		
		 <?= $form->field($model, 'tanggal', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'disabled'=>'disabled']) ?>
   

		
		 <?= $form->field($model, 'jam_berangkat', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled1=>$disabled1, 'type'=>'number', 'max'=>'23', 'min'=>0, 'maxlength' => true, 'required'=>'required']) ?>
	
	   <?= $form->field($model, 'menit_berangkat', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled1=>$disabled1, 'type'=>'number', 'max'=>'60', 'min'=>0, 'maxlength' => true, 'required'=>'required']) ?>
		
   
   <?= $form->field($model, 'material', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled1=>$disabled1, 'maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
   
   
   
   
   
   <?= $form->field($model, 'ukuran', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled1=>$disabled1, 'maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
   
  
	<?php
	  $a= ['Ton' => 'Ton', 'M.Kubik' => 'M.Kubik'];
    echo $form->field($model, 'satuan', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList($a, [$disabled1=>$disabled1]);
	?>
	
	<?= $form->field($model, 'keterangan_berangkat', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textArea([$disabled1=>$disabled1, 'maxlength' => true, ]) ?>

   

    <?php ActiveForm::end(); ?>

</div>

<br/>


<?php


?>


<div class="gaji-form" style="border:1px solid black">
<br/>


     <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
		
	
		
		

		
		 <?= $form->field($model, 'jam_tiba', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled2=>$disabled2, 'type'=>'number', 'max'=>'23', 'min'=>0, 'maxlength' => true, 'required'=>'required']) ?>
	
	   <?= $form->field($model, 'menit_tiba', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled2=>$disabled2, 'type'=>'number', 'max'=>'60', 'min'=>0, 'maxlength' => true, 'required'=>'required']) ?>
		
   
   <?= $form->field($model, 'jarak', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput([$disabled2=>$disabled2, 'type'=>'number', 'maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
   
   
   
   
 
	<?= $form->field($model, 'keterangan_tiba', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textArea([$disabled2=>$disabled2, 'maxlength' => true, ]) ?>

    

    <?php ActiveForm::end(); ?>

</div>
<?php 

?>

  
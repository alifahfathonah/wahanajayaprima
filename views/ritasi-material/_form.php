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
<h3>LAPORAN HARIAN


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
$disabled1 = '';
$disabled2 = '';

$sql = "select count(*) as total from user_lokasi where tipe_lokasi = 'Basecamp' and id_user = " . Yii::$app->user->identity->id . "";
$connection = Yii::$app->getDb();
$command = $connection->createCommand($sql);
$proyek = $command->queryScalar();
if($proyek) {
	$disabled1 = "";
}
else{
	$disabled1 = "disabled";
}

if($model->tujuan) {	
	$sql = "select count(*) as total from user_lokasi where tipe_lokasi = 'Proyek' and id_user = " . Yii::$app->user->identity->id . " and id_lokasi = $model->tujuan";
	$connection = Yii::$app->getDb();
	$command = $connection->createCommand($sql);
	$proyek = $command->queryScalar();
	if($proyek) {
		$disabled2 = "";
	}
	else{
		$disabled2 = "disabled";
	}
}
else{
	$disabled2 = "disabled";
}

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

    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', [$disabled1=>$disabled1, "style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

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

    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', [$disabled2=>$disabled2, "style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 

?>

  
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







// DATA
<br/><br>

/// KEUANGAN<br/><Br/>
//// RITASI ASPAL
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

		<div class="form-group">
			<label class="col-md-3 control-label">Bulan</label>
			<div class="col-md-4">
				<select name="bulan" required class="form-control">  
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
			</div>
		</div>
   

 
    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton('HAPUS', ["style"=>"background-color:#01579B;color:white;", 'class' =>'btn btn-primary', 'onclick'=>"return confirm('HAPUS LAPORAN BULAN INI?')"]) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br/>


<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/hapuskeuanganbulanan']);?>">KEMBALI</a>

<br/>

<script>
	
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\date\DatePicker;
use app\models\RitasiAspal;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







// DATA
<br/><br>

/// KEUANGAN<br/><Br/>
//// HAPUS LAPORAN BULANAN
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
				
				<?php
				$sql = "select distinct monthname(tanggal) as bulan, month(tanggal) as b, tanggal from ritasi_aspal
				union 
				select distinct monthname(tanggal), month(tanggal) as b, tanggal from ritasi_material
				order by tanggal desc";
			$models = RitasiAspal::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
				
				?>
				
					<option value="<?php echo $model['b'];?>"><?php echo $model['bulan'];?></option>
			<?php } ?>
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


<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/dkeuangan']);?>">KEMBALI</a>

<br/>

<script>
	
</script>
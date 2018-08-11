<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\date\DatePicker;
use app\models\Lokasi;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







/ DATA
<br/><br>

// BARANG HABIS PAKAI<br/><Br/>
/// EDIT STOK BARANG

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
			<label class="col-md-3 control-label">LOKASI</label>
			<div class="col-md-4">
			<select name="bulan" required class="form-control">  
			<?php
				$sql = "select * from lokasi
				
				order by 2 desc";
			$models = Lokasi::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
				
				?>
				
					<option  value="<?php echo $model['id'];?>"><?php echo $model['nama_lokasi'];?></option>
			<?php } ?>
				</select>
				
			</div>
		</div>
		
		
		
		 <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton('EDIT', ["style"=>"background-color:#01579B;color:white;", 'class' =>'btn btn-primary', 'onclick'=>""]) ?>
		</div>
    </div>
	 <?php ActiveForm::end(); ?>
   

</div>
 
    <br/>  
<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/data']);?>">KEMBALI</a>

   

</div>

<br/>




<br/>

<script>
	
</script>
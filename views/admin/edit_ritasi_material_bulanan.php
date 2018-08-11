<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\date\DatePicker;
use app\models\RitasiMaterial;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







// DATA
<br/><br>

/// KEUANGAN<br/><Br/>
//// EDIT RITASI MATERIAL
<?php if(isset($bulan)) { echo "<br/><br/>//// " . strtoupper(date("F", mktime(0, 0, 0, $bulan, 10))); ?>
<?php } ?>
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
				$sql = "select distinct monthname(tanggal) as bulan, month(tanggal) as b, tanggal from ritasi_material
			
				order by tanggal desc";
			$models = RitasiMaterial::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
				
				?>
				
					<option <?php if(isset($bulan) && $bulan  == $model['b']) echo 'selected';?> value="<?php echo $model['b'];?>"><?php echo $model['bulan'];?></option>
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
   
<?php if(isset($bulan)) { ?>

 <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
   <table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th style="background:#FFE0B2">NO POLISI</th>
				<TH style="background:#FFE0B2">TANGGAL</TH>
				<th style="background:#FFE0B2">ASAL</TH>
				<TH style="background:#FFE0B2">TUJUAN</TH>
				<TH style="background:#FFE0B2">MATERIAL</TH>
				<TH style="background:#FFE0B2">UKURAN</TH>
				<TH style="background:#FFE0B2">SATUAN</TH>
				<TH style="background:#FFE0B2">KETERANGAN</TH>
			
				<TH  style="background:#FFE0B2"></TH>			
			
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "select a.*, nama_basecamp, no_polisi, nama_proyek from ritasi_material a join basecamp b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_material d on d.id_kendaraan = a.id_kendaraan where month(a.tanggal) = $bulan order by a.created_date desc";
			
			$models = RitasiMaterial::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
		
		?>
				<tr >
					<td>
					<input type="hidden" name="bulansave" value="<?php echo $bulan;?>"/>
					<input type="hidden" name="id" value="<?php echo $model['id_ritasi'];?>"/>
					<input class="form-control" type="text" name="no_polisi" value='<?php echo $model['no_polisi'];?>'/>
					
					</td>
					
						<td>
					<?php echo date('d/m/Y', strtotime($model['created_date']));?>
					</td>
					
					
					<td>
					<?php echo ($model['nama_basecamp']);?>
					
					</td>
					
					<td>
					<?php echo ($model['nama_proyek']);?>
					
					</td>
					<td>
					<input class="form-control" type="text" name="material" value='<?php echo ($model['material']);?>'/>
					
					</td>
					
					<td>
					<input class="form-control" type="text" name="ukuran" value='<?php echo ($model['ukuran']);?>'/>
					
					</td>
					
					<td>
					<input class="form-control" type="text" name="satuan" value='<?php echo ($model['satuan']);?>'/>
					
					</td>
				
					<td>
					<input class="form-control" type="text" name="keterangan_berangkat" value='<?php echo ($model['keterangan_berangkat']);?>'/>
					
					</td>
					
							
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN">
						</td>
				
				</tr>
			<?php }?>
		</tbody>
	</table>
	<?php ActiveForm::end(); ?>
<?php } ?>
</div>
 
 <br/>  
<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/editkeuanganbulanan']);?>">KEMBALI</a>

   

</div>

<br/>



<br/>

<script>
	
</script>
<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\RitasiMaterial;
/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>LAPORAN BULANAN<br><br>

/ <?php $proyek = Proyek::findOne($id);
echo $proyek->nama_proyek;
?>


<br/><br>

// REKAP

<br/><br>

/// RITASI MATERIAL
</h3>

	</div>
<div class="row">


<br/>


<?php 
$sql = "select distinct monthname(tanggal) as bulan, month(tanggal) as b, year(tanggal) as tahun from ritasi_material
				
				order by 3, 2 desc";
			$models = RitasiMaterial::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
			?>

<a class="btn" href="<?php 
$arrayParams = ['bulan'=>$model['b'], 'id'=>$id];

$params = array_merge(["ritasi-material/rekap-bulanan"], $arrayParams);

echo Yii::$app->urlManager->createUrl($params);?>" style="color:black;background-color:#B3E5FC"><?php echo $model['bulan'];?>-<?php echo $model['tahun'];?></a>


			<?php } ?>

<div class="pull-right">


<br/>
<br/>

 <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],	
'action' => ['ritasi-material/detail'], 'method'=>'GET',
		]); ?>
<table>
	<tr>
		<td></td>
		
		<td colspan="2">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<input type="hidden" name="bulan" value="-"/>
		<a class="btn btn-detail"  href="<?php 
		$arrayParams = ['bulan'=>$_GET['bulan'], 'id'=>$id];

		$params = array_merge(["ritasi-material/excel"], $arrayParams);
		echo Yii::$app->urlManager->createUrl($params);
		?>" style="color:white;background-color:#01579B">SIMPAN DI EXCEL</a>
		<br/>
		<br/>
		<br/>

		</td>
	</tr>
	<tr>
		<td>
			TANGGAL&nbsp;
		</td>
		<td>
			<?=  DatePicker::widget([
			'name' => 'tanggal',
		
			'options' => ['placeholder' => 'Pilih Tanggal ...', 'class'=>'form-control', 'required'=>'required'],
			'convertFormat' => true,
			 
			'pluginOptions' => [
				'format' => 'd-M-Y',
				'startDate' => '01-Mar-2016',
				'todayHighlight' => true,
				 'autoclose'=>true,
			]
		]); ?>
		</td>
		<td>
			<input type="submit" class="btn" value="CARI" style="color:white;background-color:#05179B"/>
		</td>
	</tr>
</table>
 <?php ActiveForm::end(); ?>
<br/>
</div>

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
			$sql = "select a.*, b.nama_basecamp, no_polisi, c.nama_proyek from ritasi_material a join proyek b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_material d on d.id_kendaraan = a.id_kendaraan where  id_proyek = '" . $id . "' and month(a.created_date) = $bulan order by a.created_date desc";
			$models = RitasiMaterial::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
		
		?>
				<tr >
					<td>
					<?php echo $model['no_polisi'];?>
					
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
					<?php echo ($model['material']);?>
					
					</td>
					
					<td>
					<?php echo ($model['ukuran']);?>
					
					</td>
					
					<td>
					<?php echo ($model['satuan']);?>
					
					</td>
				
					<td>
					<?php echo ($model['keterangan_berangkat']);?>
					
					</td>
					
							
						<td>
							
							<a class="btn btn-detail"  href="<?php echo Yii::$app->urlManager->createUrl(['ritasi-material/detail', 'id'=>$model["id_ritasi"], 'tanggal'=>'-', 'bulan'=>$bulan]);?>" style="color:white;background-color:#01579B">DETIL</a>
						</td>
				
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>

<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-bulanan', 'id'=>$id]);?>">KEMBALI</a>



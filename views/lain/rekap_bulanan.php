<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\Lain;
/* @var $this yii\web\View */
/* @var $model app\models\Lain */
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

/// LAINNYA
</h3>

	</div>
<div class="row">

<?php 
$sql = "select distinct monthname(created_date) as bulan, month(created_date) as b, year(created_date) as tahun from lain
				
				order by 3, 2 desc";
			$models = Lain::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
			?>

<a class="btn" href="<?php 
$arrayParams = ['bulan'=>$model['b'], 'id'=>$id];

$params = array_merge(["lain/rekap-bulanan"], $arrayParams);

echo Yii::$app->urlManager->createUrl($params);?>" style="color:black;background-color:#B3E5FC"><?php echo $model['bulan'];?>-<?php echo $model['tahun'];?></a>

<br/>
<br/>
			<?php } ?>



<div class="pull-right">


<br/>
<br/>

 <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],	
'action' => ['lain/detail'], 'method'=>'GET',
		]); ?>
<table>
	<tr>
		<td></td>
		
		<td colspan="2">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<input type="hidden" name="bulan" value="-"/>
		<a class="btn btn-detail"  href="" style="color:white;background-color:#01579B">SIMPAN DI EXCEL</a>
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
				<th style="background:#FFE0B2">NAMA BARANG</th>
				<th style="background:#FFE0B2">JUMLAH</TH>
				<TH style="background:#FFE0B2">HARGA SATUAN</TH>
				<TH style="background:#FFE0B2">TOTAL</TH>
				<TH style="background:#FFE0B2">TANGGAL</TH>
				
			
				
			
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "select nama_barang, cast(created_date as date) as created_date, sum(jumlah) as jumlah, sum(harga_satuan) as harga_satuan,
			sum(harga_total) as harga_total
			from lain where id_proyek = '" . $id . "' and month(created_date) = $bulan order by created_date desc";
			$models = Lain::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
		
		?>
				<tr >
					<td>
					<?php echo $model['nama_barang'];?>
					
					</td>
					
					<td>
					<?php echo number_format($model['jumlah']);?>
					
					</td>
					
					<td>
					<?php echo number_format($model['harga_satuan']);?>
					
					</td>
					<td>
					<?php echo number_format($model['harga_total']);?>
					
					</td>
					
					<td>
					<?php echo date('d/M/Y', strtotime($model['created_date']));?>
					
					</td>
					
					
							
						<!--<td>
							<a class="btn btn-detail"  href="<?php echo Yii::$app->urlManager->createUrl(['lain/detail', 'id'=>$id, 'tanggal'=>'-', 'bulan'=>$bulan]);?>" style="color:white;background-color:#01579B">DETIL</a>
							
						</td>-->
				
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>

<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-bulanan', 'id'=>$id]);?>">KEMBALI</a>



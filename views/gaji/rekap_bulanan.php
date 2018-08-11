<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\Gaji;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
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

/// GAJI KARYAWAN
</h3>

	</div>
	
	
<div class="row">

<br/>
<br/>

<?php 
$sql = "select distinct monthname(created_date) as bulan, month(created_date) as b, year(created_date) as tahun from gaji
				
				order by 3, 2 desc";
			$models = Gaji::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
			?>

<a class="btn" href="<?php 
$arrayParams = ['bulan'=>$model['b'], 'id'=>$id];

$params = array_merge(["gaji/rekap-bulanan"], $arrayParams);

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
'action' => ['gaji/detail'], 'method'=>'GET',
		]); ?>
<table>
	<tr>
		<td></td>
		
		<td colspan="2">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<input type="hidden" name="bulan" value="-"/>
		<a class="btn btn-detail"  href="<?php 
		$arrayParams = ['bulan'=>$_GET['bulan'], 'id'=>$id];

		$params = array_merge(["gaji/excel"], $arrayParams);
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
				<th style="background:#FFE0B2">NAMA</th>
				<th style="background:#FFE0B2">LEMBUR(JAM)</TH>
				<TH style="background:#FFE0B2">TOTAL LEMBUR</TH>
				<TH style="background:#FFE0B2">UANG MAKAN</TH>
					<TH style="background:#FFE0B2">GAJI HARIAN</TH>
				
				<TH style="background:#FFE0B2">TOTAL GAJI</TH>
			
			
				<TH  style="background:#FFE0B2"></TH>			
			
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "select nama, sum(jam_lembur) as jam_lembur, sum(gaji_lembur) as gaji_lembur,
			sum(uang_makan) as uang_makan, sum(gaji_harian) as gaji_harian, sum(total_gaji) as total_gaji
			from gaji where id_proyek = '" . $id . "' and month(created_date) = $bulan group by nama order by nama";
			$models = Gaji::findBySql($sql)->all();
			
			foreach($models as $model)
			{			
		
		?>
				<tr >
					<td>
					<?php echo $model['nama'];?>
					
					</td>
					
					<td>
					<?php echo number_format($model['jam_lembur']);?>
					
					</td>
					
					<td>
					<?php echo number_format($model['gaji_lembur']);?>
					
					</td>
					<td>
					<?php echo number_format($model['uang_makan']);?>
					
					</td>
					
					<td>
					<?php echo number_format($model['gaji_harian']);?>
					
					</td>
					
					<td>
					<?php echo number_format($model['total_gaji']);?>
					
					</td>
				
					
					
							
						<td>
							<a class="btn btn-detail"  href="<?php echo Yii::$app->urlManager->createUrl(['gaji/detail', 'id'=>$id, 'tanggal'=>'-', 'bulan'=>$bulan]);?>" style="color:white;background-color:#01579B">DETIL</a>
							
						</td>
				
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>

<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-bulanan', 'id'=>$id]);?>">KEMBALI</a>



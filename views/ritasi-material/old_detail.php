<?php

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

// RITASI MATERIAL

<br/><br>

<?php if($tanggal != "-") { ?>
/// <?php echo date('M-Y', strtotime($tanggal));?>

<br/><br>

//// <?php echo $tanggal;?>

<br/><br>

<?php } else { ?>

/// <?php echo date('M-Y');?>

<?php } ?>

</h3>

	</div>
<div class="row">
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
				<TH style="background:#FFE0B2">JAM BERANGKAT</TH>
				<TH style="background:#FFE0B2">MENIT BERANGKAT</TH>
				<TH style="background:#FFE0B2">KETERANGAN</TH>
				<TH style="background:#FFE0B2">JAM TIBA</TH>
				<TH style="background:#FFE0B2">MENIT TIBA</TH>
				<TH style="background:#FFE0B2">JARAK</TH>
				<TH style="background:#FFE0B2">KETERANGAN</TH>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "select a.*, b.nama_basecamp, no_polisi, c.nama_proyek from ritasi_material a join proyek b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_material d on d.id_kendaraan = a.id_kendaraan where  id_proyek = '" . $id . "' and month(a.created_date) = $bulan order by a.created_date desc";
			
			if($tanggal != '-')
			{
				$sql = "select a.*, nama_basecamp, no_polisi, nama_proyek from ritasi_material a join basecamp b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_material d on d.id_kendaraan = a.id_kendaraan where  id_proyek = '" . $id . "' and cast(a.created_date) = = '" . date('Y-m-d', strtotime($tanggal)) . "' order by a.created_date desc";
				
			}
			$models = RitasiMaterial::findBySql($sql)->all();
			foreach($models as $model)
			{			
		
		?>
				<tr id="tr<?php echo $model->id_ritasi;?>">
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
					<?php echo ($model['jam_berangkat']);?>
					
					</td>
					
					<td>
					<?php echo ($model['menit_berangkat']);?>
					
					</td>
				
					<td>
					<?php echo ($model['keterangan_berangkat']);?>
					
					</td>
					
						<td>
					<?php echo ($model['jam_tiba']);?>
					
					</td>
					
					<td>
					<?php echo ($model['menit_tiba']);?>
					
					</td>
					
					<td>
					<?php echo ($model['jarak']);?>
					
					</td>
				
					<td>
					<?php echo ($model['keterangan_tiba']);?>
					
					</td>
					
					
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>


<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['ritasi-material/rekap-bulanan', 'id'=>$id, 'bulan'=>$bulan]);?>">KEMBALI</a>

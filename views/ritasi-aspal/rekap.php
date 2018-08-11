<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\RitasiAspal;
/* @var $this yii\web\View */
/* @var $model app\models\RitasiAspal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>LAPORAN HARIAN<br><br>

/ <?php $proyek = Proyek::findOne($id);
echo $proyek->nama_proyek;
?>


<br/><br>

/ REKAP

<br/><br>

/ RITASI ASPAL
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
				<TH style="background:#FFE0B2">ASPAL</TH>
				<TH style="background:#FFE0B2">UKURAN</TH>
				<TH style="background:#FFE0B2">SATUAN</TH>
				<TH style="background:#FFE0B2">KETERANGAN</TH>
			
				<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>
				<TH  style="background:#FFE0B2"></TH>			
				<?php } ?>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "select a.*, a.nama_basecamp, no_polisi, nama_proyek from ritasi_aspal a join basecamp b on a.asal = b.id join proyek c on c.id = a.tujuan join kendaraan_ritasi_aspal d on d.id_kendaraan = a.id_kendaraan where cast(a.created_date as date) = cast(now() as date) 
			order by a.created_date desc";
			$models = RitasiAspal::findBySql($sql)->all();
			foreach($models as $model)
			{			
		
		?>
				<tr id="tr<?php echo $model->id_ritasi;?>">
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo $model['no_polisi'];?></span>
					<input type="text" id="nama<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['no_polisi'];?>" />
					</td>
					
					<td>
					<?php echo date('d/m/Y', strtotime($model['created_date']));?>
					</td>
					
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['nama_basecamp']);?></span>
					<input type="number" id="jam_lembur<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['nama_basecamp'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['nama_proyek']);?></span>
					<input type="number" id="nama_proyek<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['nama_proyek'];?>" />
					</td>
					
				
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['aspal']);?></span>
					<input type="number" id="aspal<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['aspal'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['ukuran']);?></span>
					<input type="number" id="ukuran<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['ukuran'];?>" />
					</td>
					
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['satuan']);?></span>
					<input type="number" id="satuan<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['satuan'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_ritasi;?>"><?php echo ($model['keterangan_berangkat']);?></span>
					<input type="number" id="keterangan_berangkat<?php echo $model->id_ritasi;?>" class="form-control input input<?php echo $model->id_ritasi;?>" value="<?php echo $model['keterangan_berangkat'];?>" />
					</td>
					
					<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>				
						<td>
							<button class="btn btn-detail" data-id="<?php echo $model->id_ritasi;?>" type="button" style="color:white;background-color:#01579B">DETAIL</button>
							<button  class="btn  btn-simpan" data-id="<?php echo $model->id_ritasi;?>" type="button" style="color:white;background-color:#01579B">SIMPAN</button>
						</td>
					<?php } ?>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-harian', 'id'=>$id]);?>">KEMBALI</a>

<script>
	$(document).ready(function()
	{
		$(".input").hide();
		
		$(".btn-simpan").click(function()
		{						
					
			location.href='<?php echo Yii::$app->urlManager->createUrl(['ritasi-aspal/rekap', 'id'=>$id]);?>';
		});
	});
</script>	

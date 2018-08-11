<?php

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

// LAINNYA

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
				<th style="background:#FFE0B2">NAMA BARANG</th>
				<th style="background:#FFE0B2">JUMLAH</TH>
				<TH style="background:#FFE0B2">HARGA SATUAN</TH>
				<TH style="background:#FFE0B2">HARGA TOTAL</TH>
				<TH style="background:#FFE0B2">TANGGAL</TH>
				<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>
				<TH  style="background:#FFE0B2"></TH>			
				<?php } ?>
			</tr>
		</thead>
		<tbody>
		<?php
			$models = Lain::find()->where(['id_proyek'=>$id])->all();
			if($tanggal != '-')
			{
				$models = Lain::find()->where("cast(created_date as date) = '" . date('Y-m-d', strtotime($tanggal)) . "' and id_proyek=$id")->all();
			}
			foreach($models as $model)
			{			
		
		?>
				<tr id="tr<?php echo $model->id_lain;?>">
					<td>
					<span class="span<?php echo $model->id_lain;?>"><?php echo $model['nama_barang'];?></span>
					<input type="text" id="nama<?php echo $model->id_lain;?>" class="form-control input input<?php echo $model->id_lain;?>" value="<?php echo $model['nama_barang'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_lain;?>"><?php echo number_format($model['jumlah']);?></span>
					<input type="number" id="jumlah<?php echo $model->id_lain;?>" class="form-control input input<?php echo $model->id_lain;?>" value="<?php echo $model['jumlah'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_lain;?>"><?php echo number_format($model['harga_satuan']);?></span>
					<input type="number" id="harga_satuan<?php echo $model->id_lain;?>" class="form-control input input<?php echo $model->id_lain;?>" value="<?php echo $model['harga_satuan'];?>" />
					</td>
					
					<td>
					<span ><?php echo number_format($model['harga_total']);?></span>
					
					</td>
					
					
					<td>
					<?php echo date('d/m/Y', strtotime($model['created_date']));?>
					</td>
					
					<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>				
						<td>
							<button class="btn btn-edit" data-id="<?php echo $model->id_lain;?>" type="button" style="color:white;background-color:#01579B">EDIT</button>
							<button  class="btn  btn-simpan" data-id="<?php echo $model->id_lain;?>" type="button" style="color:white;background-color:#01579B">SIMPAN</button>
						</td>
					<?php } ?>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function()
	{
		$(".input").hide();
		$(".btn-edit").click(function()
		{
			var id = $(this).data('id');
			$(".span" + id).hide();
			$(".input" + id).show();
		});
		$(".btn-simpan").click(function()
		{
			var id = $(this).data('id');
			var nama = $("#nama" + id).val();
			var jumlah = $("#jumlah" + id).val();
			var harga_satuan = $("#harga_satuan" + id).val();
		
			
			$.ajax({
				method:"POST",
				url:'<?php echo Yii::$app->urlManager->createUrl('lain/save'); ?>',	
				//dataType: 'json',					
				cache:false,
				async:false,
				data: ({ 
						id:id,
						nama: nama,
						jumlah: jumlah,
						harga_satuan:harga_satuan,
						
					}),	
				success:function(data)
				{				
					location.href='<?php echo Yii::$app->urlManager->createUrl(['lain/detail', 'tanggal'=>$tanggal, 'bulan'=>$bulan, 'id'=>$id]);?>';
				},
			});
			
			$(".span" + id).show();
			$(".input" + id).hide();
			
			
			
		});
	});
</script>	

<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['lain/rekap-bulanan', 'id'=>$id, 'bulan'=>$bulan]);?>">KEMBALI</a>

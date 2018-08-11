<?php

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

// GAJI KARYAWAN

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
				<th style="background:#FFE0B2">NAMA</th>
				<th style="background:#FFE0B2">LEMBUR(JAM)</TH>
				<TH style="background:#FFE0B2">GAJI LEMBUR</TH>
				<TH style="background:#FFE0B2">TOTAL LEMBUR</TH>
				<TH style="background:#FFE0B2">UANG MAKAN</TH>
				<TH style="background:#FFE0B2">GAJI HARIAN</TH>
				<TH style="background:#FFE0B2">TOTAL GAJI</TH>
				<TH style="background:#FFE0B2">TANGGAL</TH>
				<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>
				<TH  style="background:#FFE0B2"></TH>			
				<?php } ?>
			</tr>
		</thead>
		<tbody>
		<?php
			$models = Gaji::find()->where(['status'=>0, 'id_proyek'=>$id])->all();
			if($tanggal != '-')
			{
				$models = Gaji::find()->where("cast(created_date as date) = '" . date('Y-m-d', strtotime($tanggal)) . "' and id_proyek=$id")->all();
			}
			if($bulan != '')
			{
				$models = Gaji::find()->where("month(created_date) = '" . $bulan. "' and id_proyek=$id")->all();
			}
			foreach($models as $model)
			{			
		
		?>
				<tr id="tr<?php echo $model->id_gaji;?>">
					<td>
					<span class="span<?php echo $model->id_gaji;?>"><?php echo $model['nama'];?></span>
					<input type="text" id="nama<?php echo $model->id_gaji;?>" class="form-control input input<?php echo $model->id_gaji;?>" value="<?php echo $model['nama'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_gaji;?>"><?php echo number_format($model['jam_lembur']);?></span>
					<input type="number" id="jam_lembur<?php echo $model->id_gaji;?>" class="form-control input input<?php echo $model->id_gaji;?>" value="<?php echo $model['jam_lembur'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_gaji;?>"><?php echo number_format($model['uang_lembur']);?></span>
					<input type="number" id="uang_lembur<?php echo $model->id_gaji;?>" class="form-control input input<?php echo $model->id_gaji;?>" value="<?php echo $model['uang_lembur'];?>" />
					</td>
					
					<td>
					<span ><?php echo number_format($model['gaji_lembur']);?></span>
					
					</td>
					
					<td>
					<span class="span<?php echo $model->id_gaji;?>"><?php echo number_format($model['uang_makan']);?></span>
					<input type="number" id="uang_makan<?php echo $model->id_gaji;?>" class="form-control input input<?php echo $model->id_gaji;?>" value="<?php echo $model['uang_makan'];?>" />
					</td>
					
					<td>
					<span class="span<?php echo $model->id_gaji;?>"><?php echo number_format($model['gaji_harian']);?></span>
					<input type="number" id="gaji_harian<?php echo $model->id_gaji;?>" class="form-control input input<?php echo $model->id_gaji;?>" value="<?php echo $model['gaji_harian'];?>" />
					</td>
					
					<td>
					<span><?php echo number_format($model['total_gaji']);?></span>
					
					</td>
					
					<td>
					<?php echo date('d/m/Y', strtotime($model['created_date']));?>
					</td>
					
					<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>				
						<td>
							<button class="btn btn-edit" data-id="<?php echo $model->id_gaji;?>" type="button" style="color:white;background-color:#01579B">EDIT</button>
							<button  class="btn  btn-simpan" data-id="<?php echo $model->id_gaji;?>" type="button" style="color:white;background-color:#01579B">SIMPAN</button>
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
			var jam_lembur = $("#jam_lembur" + id).val();
			var uang_lembur = $("#uang_lembur" + id).val();
			var uang_makan = $("#uang_makan" + id).val();
			var gaji_harian = $("#gaji_harian" + id).val();
			
			$.ajax({
				method:"POST",
				url:'<?php echo Yii::$app->urlManager->createUrl('gaji/save'); ?>',	
				//dataType: 'json',					
				cache:false,
				async:false,
				data: ({ 
						id:id,
						nama: nama,
						jam_lembur: jam_lembur,
						uang_lembur:uang_lembur,
						uang_makan:uang_makan,						
						gaji_harian:gaji_harian,
						status:1,
					}),	
				success:function(data)
				{				
					location.href='<?php echo Yii::$app->urlManager->createUrl(['gaji/detail', 'tanggal'=>$tanggal, 'bulan'=>$bulan, 'id'=>$id]);?>';
				},
			});
			
			$(".span" + id).show();
			$(".input" + id).hide();
			
			
			
		});
	});
</script>	

<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['gaji/rekap-bulanan', 'id'=>$id, 'bulan'=>$bulan]);?>">KEMBALI</a>

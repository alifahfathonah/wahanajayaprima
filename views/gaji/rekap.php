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
<h3>LAPORAN HARIAN<br><br>

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
			$sql = "select * from gaji where id_proyek = '" . $id . "'";
			$models = Gaji::find()->where(['id_proyek'=>$id ])->where("TIMESTAMPDIFF(HOUR, created_date, now()) <= 24")->orderBy('created_date desc')->all();
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
					<input type="hidden" name="status" class="status<?php echo $model->id_gaji;?>" id="status<?php echo $model->id_gaji;?>" value="0"/>
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
<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/rekap', 'id'=>$id]);?>">KEMBALI</a>

<script>
	$(document).ready(function()
	{
		$(".input").hide();
		$(".btn-edit").click(function()
		{
			var id = $(this).data('id');
			$(".span" + id).hide();
			$(".input" + id).show();
			$(".status" + id).val(1);
		});
		$(".btn-simpan").click(function()
		{
			var id = $(this).data('id');
			var nama = $("#nama" + id).val();
			var jam_lembur = $("#jam_lembur" + id).val();
			var uang_lembur = $("#uang_lembur" + id).val();
			var uang_makan = $("#uang_makan" + id).val();
			var gaji_harian = $("#gaji_harian" + id).val();
			var status = $("#status" + id).val();
			
			$.ajax({
				method:"POST",
				url:'<?php echo Yii::$app->urlManager->createUrl('gaji/save'); ?>',	
				//dataType: 'json',	
				async:true,
				cache:false,
				data: ({ 
						id:id,
						nama: nama,
						jam_lembur: jam_lembur,
						uang_lembur:uang_lembur,
						uang_makan:uang_makan,						
						gaji_harian:gaji_harian,
						status:status,
					}),	
				success:function(data)
				{	
						location.href='<?php echo Yii::$app->urlManager->createUrl(['gaji/rekap', 'id'=>$id]);?>';
					
				},
				error:function(data)
				{
					alert("Gagal update");
				}
			});
			
			$(".span" + id).show();
			$(".input" + id).hide();
			
			
		
			
		});
	});
</script>	

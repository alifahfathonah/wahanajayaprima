<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lokasi;
use app\models\UserLogin;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>






// HISTORY<br><br>

/// KEUANGAN



	</div>
	
<div class="row">
	<ul>
	<?php $sql = "select * from gaji";
	$connection = Yii::$app->getDb();
	$data = $connection->createCommand($sql)->queryAll();
	foreach($data as $d) {?>
		<li style="font-size:18px;"><?php echo $d['created_by']. ", Gaji " . $d['nama'] . ", " . number_format($d['total_gaji']) . " <small style='font-size:11px;'>" . $d['created_date']."</small>";?></li>
	<?php } ?>
	
	<?php $sql = "select * from kendaraan_ritasi_aspal a join ritasi_aspal b on a.id_kendaraan = b.id_kendaraan";
	$connection = Yii::$app->getDb();
	$data = $connection->createCommand($sql)->queryAll();
	foreach($data as $d) {?>
		<li style="font-size:18px;"><?php echo $d['created_by']. ", No Polisi " . $d['no_polisi'] . ", " . ($d['aspal']) . ", " . ($d['ukuran']) . ", " . ($d['satuan']) . ", " . ($d['jarak']) . " <small style='font-size:11px;'>" . $d['created_date']."</small>";?></li>
	<?php } ?>
	
	
	
	<?php $sql = "select * from kendaraan_ritasi_material a join ritasi_material b on a.id_kendaraan = b.id_kendaraan";
	$connection = Yii::$app->getDb();
	$data = $connection->createCommand($sql)->queryAll();
	foreach($data as $d) {?>
		<li style="font-size:18px;"><?php echo $d['created_by']. ", No Polisi " . $d['no_polisi'] . ", " . ($d['material']) . ", " . ($d['ukuran']) . ", " . ($d['satuan']) . ", " . ($d['jarak']) . " <small style='font-size:11px;'>" . $d['created_date']."</small>";?></li>
	<?php } ?>
	</ul>
</div>	

	

<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/history']);?>">KEMBALI</a>

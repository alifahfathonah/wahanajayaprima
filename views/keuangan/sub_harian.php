<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\Proyek;
/* @var $this yii\web\View */

$this->title = 'Keuangan';
?>

<?php
/* @var $this SiteController */


$this->title = 'Keuangan';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- BEGIN DASHBOARD STATS -->



<div class="row">
<h2>LAPORAN HARIAN</h2>

<h3>/<?php $proyek = Proyek::find($id)->one();
echo $proyek->nama_proyek;?></h3>



<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['gaji/create', 'id'=>$id]);?>">GAJI KARYAWAN</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['kendaraan-ritasi-material/create', 'id'=>$id]);?>">RITASI MATERIAL</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['kendaraan-ritasi-aspal/create', 'id'=>$id]);?>">RITASI ASPAL</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['lain/create', 'id'=>$id]);?>">LAINNYA
</div>


<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/rekap', 'id'=>$id]);?>">REKAP</a>
</div>


<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/harian');?>">KEMBALI</a>
</div>



	</div>


<div class="clearfix">
</div>



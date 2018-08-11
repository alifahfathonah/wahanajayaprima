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
<h2>LAPORAN BULANAN</h2>

<h3>/<?php $proyek = Proyek::find($id)->one();
echo $proyek->nama_proyek;?></h3>



<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['gaji/rekap-bulanan', 'id'=>$id, 'bulan'=>date('n')]);?>">GAJI KARYAWAN</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['ritasi-material/rekap-bulanan', 'id'=>$id, 'bulan'=>date('n')]);?>">RITASI MATERIAL</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['ritasi-aspal/rekap-bulanan', 'id'=>$id, 'bulan'=>date('n')]);?>">RITASI ASPAL</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['lain/rekap-bulanan', 'id'=>$id, 'bulan'=>date('n')]);?>");?>LAINNYA
</div>





<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/bulanan');?>">KEMBALI</a>
</div>



	</div>


<div class="clearfix">
</div>



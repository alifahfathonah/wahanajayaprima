<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\Pengumuman;
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
<h2>KEUANGAN</h2>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/harian');?>">LAPORAN HARIAN</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/bulanan');?>">LAPORAN BULANAN</a>
</div>

	</div>


<div class="clearfix">
</div>



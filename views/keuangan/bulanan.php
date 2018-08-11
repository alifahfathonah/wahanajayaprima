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

<?php
$proyeks = Proyek::find()->where("tipe = 'Proyek' and id in (select id_lokasi from user_lokasi where tipe_lokasi = 'Proyek' and id_user = " . Yii::$app->user->identity->id . ")")->all();
foreach($proyeks as $proyek) { ?>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-bulanan', 'id'=>$proyek->id]);?>"><?php echo $proyek->nama_proyek;?></a>
</div>

<?php } ?>

<?php
$proyeks = Proyek::find()->where("tipe = 'Basecamp' and id in (select id_lokasi from user_lokasi where tipe_lokasi = 'Basecamp' and id_user = " . Yii::$app->user->identity->id . ")")->all();
foreach($proyeks as $proyek) { ?>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl(['keuangan/sub-bulanan', 'id'=>$proyek->id]);?>"><?php echo $proyek->nama_basecamp;?></a>
</div>

<?php } ?>

	</div>


<div class="clearfix">
</div>



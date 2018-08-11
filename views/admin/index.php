<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\Pengumuman;
/* @var $this yii\web\View */

$this->title = 'Admin';
?>

<?php
/* @var $this SiteController */


$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- BEGIN DASHBOARD STATS -->



<div class="row">
<h2>ADMIN</h2>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('admin/history');?>">HISTORY</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;;margin-bottom:8px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('admin/data');?>">DATA</a>
</div>

<div style="background-color:#B3E5FC;border:1px solid black;padding:10px;">
<a href="<?php echo Yii::$app->urlManager->createUrl('admin/daftar');?>">DAFTAR</a>
</div>

	</div>


<div class="clearfix">
</div>



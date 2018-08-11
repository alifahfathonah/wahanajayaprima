<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\Pengumuman;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>

<?php
/* @var $this SiteController */


$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- BEGIN DASHBOARD STATS -->



<div class="row">
<h2>MENU UTAMA</h2>

<div style="border:1px solid black;padding:10px;">
<h3>PEMBERITAHUAN</h3>
<?php
$model = Pengumuman::find()->orderBy("created_date desc")->one();

	
	echo strtoupper("<h4>" . $model->judul_pengumuman . "</h4>");
	
	
		?>
</div>

	</div>


<div class="clearfix">
</div>



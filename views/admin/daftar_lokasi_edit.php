<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\Proyek;

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>

<?php
/* @var $this SiteController */


$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- BEGIN DASHBOARD STATS -->



<div class="row">
<h3>ADMIN<br><br>



/ DATA

<br/><br>

// LOKASI
</h3>

	</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<td>NAMA PROYEK</td>
			
			<td></td>
		</tr>
	</thead>
	<tbody>
<?php
$models = Proyek::find()->orderBy('nama_proyek')->all();
$no = 1;
foreach($models as $model)
{	
	echo "<tr><td><a href='" . Yii::$app->urlManager->createUrl(['admin/editlokasi', 'id'=>$model->id]) . "'> PROYEK " . $model->nama_proyek . "</a></td>";

	echo "</tr>";
	
	
}
		
		?>
		
<?php
$models = Proyek::find()->where(["tipe"=>"Basecamp"])->orderBy('nama_basecamp')->all();
$no = 1;
foreach($models as $model)
{	
	echo "<tr><td><a href='" . Yii::$app->urlManager->createUrl(['admin/editbasecamp', 'id'=>$model->id]) . "'> BASECAMP " . $model->nama_basecamp . "</a></td>";

	echo "</tr>";
	
	
}
		
		?>		
		</tbody>
</table>
<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/data']);?>">KEMBALI</a>


	</div>




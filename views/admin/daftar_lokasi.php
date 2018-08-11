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



/ DAFTAR

<br/><br>

// LOKASI
</h3>

	</div>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/flokasi']);?>">DATA BARU</a>	
<p>&nbsp;</p>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>NAMA PROYEK</td>
			<td>KLASIFIKASI</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
<?php
$models = Proyek::find()->all();
$no = 1;
foreach($models as $model)
{	
	echo "<tr><td>" . $model->nama_proyek . "</td>";
	echo "<td>PROYEK</td>";
	echo "<td>
	<form method='post' action='" . Yii::$app->urlManager->createUrl(['admin/deletelokasi']) . "'>
	<input type='hidden' name='_csrf' value='" . Yii::$app->request->getCsrfToken() . "'/>
	<input type='hidden' name='id' value='" . $model->id . "'/>
	<button type='submit' onclick='return confirm(\"HAPUS DATA INI?\");' class='btn btn-primary'>HAPUS</button>
	</form>
	</td></tr>
	
	";
}
		
		?>
		</tbody>
</table>
<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/daftar']);?>">KEMBALI</a>


	</div>




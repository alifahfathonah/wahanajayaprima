<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GroupAccess;
use app\models\User;
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

// USER PROFILE
</h3>

	</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<td align="center"  rowspan="2" >USERNAME</td>
			<td align="center"  rowspan="2" >JABATAN</td>
			<td align="center" colspan="4">AKSES</td>
			<td align="center"  rowspan="2" ></td>
		</tr>
		<tr>
			<td align="center" >KEUANGAN</td>
			<td align="center" >BARANG HABIS PAKAI</td>
			<td align="center" >ALAT BERAT DAN KENDARAAN</td>
			<td align="center" >ADMIN</td>
		</tr>
	</thead>
	<tbody>
<?php
$models = User::find()->all();
$no = 1;
foreach($models as $model)
{	
	echo "<tr><td>" . $model->username . "</td>";
	echo "<td>" . $model->role . "</td>";
	echo "<td>0</td>";
	echo "<td>0</td>";
	echo "<td>0</td>";
	echo "<td>0</td>";
	echo "<td><a  class='btn btn-primary' href='" . Yii::$app->urlManager->createUrl(['admin/duserakses', 'id'=>$model->id]) . "'>EDIT AKSES</a>
	<a  class='btn btn-primary' href='" . Yii::$app->urlManager->createUrl(['admin/duserlokasi', 'id'=>$model->id]) . "'>LOKASI</a>
	</tr>";
}
		
		?>
		</tbody>
</table>
<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/data']);?>">KEMBALI</a>


	</div>




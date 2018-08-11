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



/ DAFTAR

<br/><br>

// PERSONIL
</h3>

	</div>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/dpersonil']);?>">DATA BARU</a>	
<p>&nbsp;</p>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>USERNAME</td>
			<td>JABATAN</td>
			<td></td>
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
		echo "<td>
	<form method='post' action='" . Yii::$app->urlManager->createUrl(['admin/deletepersonil']) . "'>
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




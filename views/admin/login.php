<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use app\models\UserLogin;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>






/ HISTORY

<br/><br>

/ USER LOGIN
</h3>

	</div>
	
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/fpersonil']);?>">USER LIST</a>
<p></p>
	
<div class="row">
	<div style="border:1px solid black;padding:10px;">

<?php
$models = UserLogin::find()->orderBy('tanggal desc')->all();
$no = 1;
foreach($models as $model)
{	
	echo "<h4>$no. " . $model->username . " login pada " . $model->tanggal . "</h4>";
	$no++;
}
		
		?>
</div>
</div>

<p></p>
<a class="btn" style="background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/history']);?>">KEMBALI</a>

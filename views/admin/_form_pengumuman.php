<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Gaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<h3>ADMIN<br><br>







/ DATA
<br/><br>

// PEMBERITAHUAN
</h3>

	</div>


<div class="clearfix">
</div>

<div class="gaji-form" style="border:1px solid black">
<br/>



     <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
		
		  <?= $form->field($model, 'prev', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textArea(['maxlength' => true, 'disabled'=>'disabled']) ?>
	

   
    <?= $form->field($model, 'judul_pengumuman', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textArea(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>
	
	
 
    <div class="form-group">
	<div class="col-md-3" style="margin-left:150px;">
        <?= Html::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN', ["style"=>"background-color:#01579B;color:white;", 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<br/>



<a class="btn" style="margin-left:150px;background-color:#01579B;color:white;" href="<?php echo Yii::$app->urlManager->createUrl(['admin/data']);?>">KEMBALI</a>

<br/>

<script>
	
</script>
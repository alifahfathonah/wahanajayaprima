<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

     <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
		
		<?php if($model->hasErrors()) { ?>
			<div class="alert alert-danger display">
				<button class="close" data-close="alert"></button>
				<?php echo $form->errorSummary($model); ?>
			</div>
		<?php } ?>
		
		<div class="form-body">
		
		
    <?= $form->field($model, 'nama_basecamp', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required', 'autofocus'=>'autofocus']) ?>

   
   	<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
				</div>
			</div>

		</div>
		
	<?php ActiveForm::end(); ?>
	
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Basecamp;


/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-form">

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
		
		
		<?php 
	
	$a = ArrayHelper::map(Proyek::find()->where(["tipe"=>"Basecamp"])->orderBy('nama_basecamp')->all(), 'id', 'nama_basecamp');
		echo $form->field($model, 'id_basecamp', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->dropDownList($a,['prompt'=>'-Pilih Basecamp-', 'autofocus'=>'autofocus', 'required'=>'required']);
		
		
		?>
		
					
	
	
  
    <?= $form->field($model, 'nama_proyek', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'required'=>'required']) ?>
	
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


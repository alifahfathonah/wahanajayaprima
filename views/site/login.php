<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="content" style="background-color:white">


	
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form'],
        'fieldConfig' => [
           
            'labelOptions' => ['class' => 'form-control form-control-solid placeholder-no-fix'],
        ],
    ]); ?>
		<h3 class="form-title" style="color:#01579B"><?php echo Yii::$app->name; ?></h3>
		<?php if($model->hasErrors()) { ?>
		<div class="alert alert-danger display">
			<button class="close" data-close="alert"></button>
			<?php echo $form->errorSummary($model); ?>
		</div>
		<?php } ?>	  
	
		 <div class="form-group">
			<?= $form->field($model, 'username')->textInput(['style'=>'background-color:#EEEEEE;color:black;', 'placeholder'=>'NAMA', 'required' => 'required', 'autofocus'=>'autofocus', 'class'=>'form-control'])->label(false) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'password')->passwordInput(['style'=>'background-color:#EEEEEE;color:black;', 'placeholder'=>'KATA SANDI','required' => 'required', 'class'=>'form-control'])->label(false) ?>
		</div>
		
	
    
            
                <?= Html::submitButton('Login', ['style'=>'color:#FFFFFF;background-color:#01579B', 'class' => 'btn btn-default uppercase', 'name' => 'login-button']) ?>
           
     	<div class="form-group">
		
			<center><a href="#" class="btn" style="color:white;background-color:#01579B">COMPANY PROFILE</A	></center>
		
	</div>

    <?php ActiveForm::end(); ?>
	


</div>   

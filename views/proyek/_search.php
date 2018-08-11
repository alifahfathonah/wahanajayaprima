<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyekSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyek-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_basecamp') ?>

    <?= $form->field($model, 'nama_proyek') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'edited_by') ?>

    <?php // echo $form->field($model, 'edited_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

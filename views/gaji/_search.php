<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GajiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gaji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gaji') ?>

    <?= $form->field($model, 'id_proyek') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jam_lembur') ?>

    <?= $form->field($model, 'uang_lembur') ?>

    <?php // echo $form->field($model, 'gaji_lembur') ?>

    <?php // echo $form->field($model, 'uang_makan') ?>

    <?php // echo $form->field($model, 'gaji_harian') ?>

    <?php // echo $form->field($model, 'total_gaji') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'edited_by') ?>

    <?php // echo $form->field($model, 'edited_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

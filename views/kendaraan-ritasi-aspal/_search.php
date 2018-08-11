<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiAspalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-ritasi-aspal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kendaraan') ?>

    <?= $form->field($model, 'no_polisi') ?>

    <?= $form->field($model, 'id_basecamp') ?>

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

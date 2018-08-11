<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ritasi-aspal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ritasi') ?>

    <?= $form->field($model, 'id_kendaraan') ?>

    <?= $form->field($model, 'asal') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'jam_berangkat') ?>

    <?php // echo $form->field($model, 'menit_berangkat') ?>

    <?php // echo $form->field($model, 'aspal') ?>

    <?php // echo $form->field($model, 'ukuran') ?>

    <?php // echo $form->field($model, 'satuan') ?>

    <?php // echo $form->field($model, 'keterangan_berangkat') ?>

    <?php // echo $form->field($model, 'jam_tiba') ?>

    <?php // echo $form->field($model, 'menit_tiba') ?>

    <?php // echo $form->field($model, 'jarak') ?>

    <?php // echo $form->field($model, 'keterangan_tiba') ?>

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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LainSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lain-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_lain') ?>

    <?= $form->field($model, 'id_proyek') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'harga_satuan') ?>

    <?php // echo $form->field($model, 'harga_total') ?>

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

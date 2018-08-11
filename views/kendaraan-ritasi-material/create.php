<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiMaterial */

$this->title = 'Create Kendaraan Ritasi Material';
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan Ritasi Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>



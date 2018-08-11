<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiAspal */

$this->title = 'Create Kendaraan Ritasi Aspal';
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan Ritasi Aspals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>



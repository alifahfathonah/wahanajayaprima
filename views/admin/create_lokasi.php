<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = 'Create Lokasi';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form_lokasi', [
        'model' => $model,
    ]) ?>

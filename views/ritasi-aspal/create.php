<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterial */

$this->title = 'Create Ritasi Material';
$this->params['breadcrumbs'][] = ['label' => 'Ritasi Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


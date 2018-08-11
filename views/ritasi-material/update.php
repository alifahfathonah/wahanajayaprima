<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterial */

$this->title = 'Update Ritasi Material: ' . ' ' . $model->id_ritasi;
$this->params['breadcrumbs'][] = ['label' => 'Ritasi Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ritasi, 'url' => ['view', 'id' => $model->id_ritasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ritasi-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

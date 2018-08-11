<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiAspal */

$this->title = 'Update Kendaraan Ritasi Aspal: ' . ' ' . $model->id_kendaraan;
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan Ritasi Aspals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kendaraan, 'url' => ['view', 'id' => $model->id_kendaraan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kendaraan-ritasi-aspal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

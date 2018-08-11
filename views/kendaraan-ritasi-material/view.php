<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KendaraanRitasiMaterial */

$this->title = $model->id_kendaraan;
$this->params['breadcrumbs'][] = ['label' => 'Kendaraan Ritasi Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendaraan-ritasi-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kendaraan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kendaraan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kendaraan',
            'no_polisi',
            'id_basecamp',
            'created_by',
            'created_date',
            'edited_by',
            'edited_date',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RitasiMaterial */

$this->title = $model->id_ritasi;
$this->params['breadcrumbs'][] = ['label' => 'Ritasi Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ritasi-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ritasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ritasi], [
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
            'id_ritasi',
            'id_kendaraan',
            'asal',
            'tujuan',
            'tanggal',
            'jam_berangkat',
            'menit_berangkat',
            'material',
            'ukuran',
            'satuan',
            'keterangan_berangkat:ntext',
            'jam_tiba',
            'menit_tiba',
            'jarak',
            'keterangan_tiba:ntext',
            'created_by',
            'created_date',
            'edited_by',
            'edited_date',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lain */

$this->title = $model->id_lain;
$this->params['breadcrumbs'][] = ['label' => 'Lains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lain-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_lain], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_lain], [
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
            'id_lain',
            'id_proyek',
            'nama_barang',
            'jumlah',
            'harga_satuan',
            'harga_total',
            'created_by',
            'created_date',
            'edited_by',
            'edited_date',
        ],
    ]) ?>

</div>

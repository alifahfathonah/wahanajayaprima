<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = $model->id_gaji;
$this->params['breadcrumbs'][] = ['label' => 'Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gaji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_gaji], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_gaji], [
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
            'id_gaji',
            'id_proyek',
            'nama',
            'jam_lembur',
            'uang_lembur',
            'gaji_lembur',
            'uang_makan',
            'gaji_harian',
            'total_gaji',
            'created_by',
            'created_date',
            'edited_by',
            'edited_date',
        ],
    ]) ?>

</div>

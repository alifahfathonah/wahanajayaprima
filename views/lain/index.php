<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lain-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lain', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_lain',
            'id_proyek',
            'nama_barang',
            'jumlah',
            'harga_satuan',
            // 'harga_total',
            // 'created_by',
            // 'created_date',
            // 'edited_by',
            // 'edited_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

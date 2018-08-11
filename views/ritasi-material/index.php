<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RitasiMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ritasi Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ritasi-material-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ritasi Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ritasi',
            'id_kendaraan',
            'asal',
            'tujuan',
            'tanggal',
            // 'jam_berangkat',
            // 'menit_berangkat',
            // 'material',
            // 'ukuran',
            // 'satuan',
            // 'keterangan_berangkat:ntext',
            // 'jam_tiba',
            // 'menit_tiba',
            // 'jarak',
            // 'keterangan_tiba:ntext',
            // 'created_by',
            // 'created_date',
            // 'edited_by',
            // 'edited_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

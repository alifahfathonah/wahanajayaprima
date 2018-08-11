<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GajiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gajis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gaji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gaji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_gaji',
            'id_proyek',
            'nama',
            'jam_lembur',
            'uang_lembur',
            // 'gaji_lembur',
            // 'uang_makan',
            // 'gaji_harian',
            // 'total_gaji',
            // 'created_by',
            // 'created_date',
            // 'edited_by',
            // 'edited_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

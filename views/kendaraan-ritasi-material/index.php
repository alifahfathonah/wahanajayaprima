<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KendaraanRitasiMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kendaraan Ritasi Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendaraan-ritasi-material-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kendaraan Ritasi Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kendaraan',
            'no_polisi',
            'id_basecamp',
            'created_by',
            'created_date',
            // 'edited_by',
            // 'edited_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

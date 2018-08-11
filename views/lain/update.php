<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lain */

$this->title = 'Update Lain: ' . ' ' . $model->id_lain;
$this->params['breadcrumbs'][] = ['label' => 'Lains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lain, 'url' => ['view', 'id' => $model->id_lain]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lain-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

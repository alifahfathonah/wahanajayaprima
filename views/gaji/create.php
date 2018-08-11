<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = 'Create Gaji';
$this->params['breadcrumbs'][] = ['label' => 'Gajis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

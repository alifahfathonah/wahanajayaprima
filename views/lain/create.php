<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lain */

$this->title = 'Create Lain';
$this->params['breadcrumbs'][] = ['label' => 'Lains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = 'Create Personil';
$this->params['breadcrumbs'][] = ['label' => 'Personil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form_personil', [
        'model' => $model,
    ]) ?>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = 'Create Basecamp';
$this->params['breadcrumbs'][] = ['label' => 'Basecamp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form_user_lokasi', [
        'model' => $model,
    ]) ?>

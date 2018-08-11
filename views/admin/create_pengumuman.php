<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gaji */

$this->title = 'Create Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form_pengumuman', [
        'model' => $model,
    ]) ?>

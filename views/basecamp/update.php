<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Basecamp */

$this->title = 'Ubah Basecamp - ' . ' ' . $model->nama_basecamp;
$this->params['breadcrumbs'][] = ['label' => 'Basecamp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_basecamp, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
				</div>
				<div class="actions">
				<?= Html::a('List Basecamp', ['index'], ['class' => 'btn btn-default btn-sm']) ?>
				</div>
			</div>
			<div class="portlet-body form">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

			</div>
		</div>
	</div>
</div>

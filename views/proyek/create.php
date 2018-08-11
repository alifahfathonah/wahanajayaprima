<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = 'Tambah Proyek';
$this->params['breadcrumbs'][] = ['label' => 'Proyek', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
				<?= Html::a('List Proyek', ['index'], ['class' => 'btn btn-default btn-sm']) ?>
			
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

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Basecamp */

$this->title = 'Tambah Basecamp';
$this->params['breadcrumbs'][] = ['label' => 'Basecamps', 'url' => ['index']];
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

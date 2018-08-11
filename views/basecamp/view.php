<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Basecamp */

$this->title = $model->nama_basecamp;
$this->params['breadcrumbs'][] = ['label' => 'Basecamp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Lihat Basecamp #<?php echo $model->nama_basecamp; ?>
				</div>
				<div class="actions">
					<?= Html::a('List Basecamp', ['index'], ['class' => 'btn btn-default btn-sm']) ?>
				</div>
			</div>
			<div class="portlet-body">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
            'nama_basecamp',
            'created_by',
            'created_date:datetime',
            'edited_by',
            'edited_date:datetime',
        ],
    ]) ?>

</div>
		</div>
		<!-- END Portlet PORTLET-->
	</div>
</div>

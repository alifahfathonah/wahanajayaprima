<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = $model->nama_proyek;
$this->params['breadcrumbs'][] = ['label' => 'Proyek', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Lihat Proyek #<?php echo $model->nama_proyek; ?>
				</div>
				<div class="actions">
					<?= Html::a('List Proyek', ['index'], ['class' => 'btn btn-default btn-sm']) ?>
				</div>
			</div>
			<div class="portlet-body">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
            'basecamp.nama_basecamp',
            'nama_proyek',
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

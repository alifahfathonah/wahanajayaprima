<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\GroupAccess;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyek';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    
	 [
      
        'attribute' => 'basecamp_search',        
		'value'=>'basecamp.nama_basecamp',
        'vAlign'=>'middle',		
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
       
    ],
	
	 [
      
        'attribute' => 'nama_proyek',        
        'vAlign'=>'middle',		
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
       
    ],
	
	
	 ['class' => 'kartik\grid\ActionColumn',
		
	  
	 ],
];
?>
<div class="status-index">

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       'export'=>[
			'fontAwesome'=>true,
			'label'=>'Export',
		],
       'exportConfig'=>[
		       GridView::EXCEL => [
        'label' => 'Excel',
        'icon' => 'file-excel-o',
        'iconOptions' => ['class' => 'text-success'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => 'Proyek',
        'alertMsg' => 'The EXCEL export file will be generated for download.',
        'options' => ['title' => 'Microsoft Excel'],
        'mime' => 'application/vnd.ms-excel',
        'config' => [
            'worksheet' => 'ExportWorksheet',
            'cssFile' => ''
        ]
    ],
	    GridView::PDF => [
        'label' => 'PDF',
        'icon' => 'file-pdf-o',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => 'data-export',
        'alertMsg' => 'The PDF export file will be generated for download.',
        'options' => ['title' => 'Portable Document Format'],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
           
            'options' => [
                'title' => 'Proyek',
                'subject' =>'Proyek',
                'keywords' =>'Proyek'
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],
	],
	
	   'panel' => [
        'heading'=>'<i class="glyphicon glyphicon-globe"></i> Proyek </i>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Proyek', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>true
    ],
	'bordered'=>true,
	'condensed'=>true,
    'columns' => $gridColumns,
    'responsive'=>true,
	'responsiveWrap'=>true,
	'perfectScrollbar'=>true,
	'resizableColumns'=>true,
    'hover'=>true,
	'toolbar' => [
        [
            
        ],
        '{export}',
        '{toggleData}'
    ]
]);
			?>
           
            </div>
        </div>
    </div>
</div>
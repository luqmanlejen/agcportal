<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */

$this->breadcrumbs=array(
	'Ost Tiles Hits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OstTilesHit', 'url'=>array('index')),
	array('label'=>'Create OstTilesHit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ost-tiles-hit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ost Tiles Hits</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ost-tiles-hit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tiles_bm',
		'tiles_bi',
		'tiles_url_bm',
		'tiles_url_bi',
		'hits_bm',
		/*
		'hits_bi',
		'hits_last_date_bm',
		'hits_last_date_bi',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

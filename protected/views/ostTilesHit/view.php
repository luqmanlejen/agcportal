<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */

$this->breadcrumbs=array(
	'Ost Tiles Hits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OstTilesHit', 'url'=>array('index')),
	array('label'=>'Create OstTilesHit', 'url'=>array('create')),
	array('label'=>'Update OstTilesHit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OstTilesHit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OstTilesHit', 'url'=>array('admin')),
);
?>

<h1>View OstTilesHit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tiles_bm',
		'tiles_bi',
		'tiles_url_bm',
		'tiles_url_bi',
		'hits_bm',
		'hits_bi',
		'hits_last_date_bm',
		'hits_last_date_bi',
	),
)); ?>

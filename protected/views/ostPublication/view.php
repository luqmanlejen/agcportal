<?php
/* @var $this OstPublicationController */
/* @var $model OstPublication */

$this->breadcrumbs=array(
	'Ost Publications'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List OstPublication', 'url'=>array('index')),
	array('label'=>'Create OstPublication', 'url'=>array('create')),
	array('label'=>'Update OstPublication', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OstPublication', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OstPublication', 'url'=>array('admin')),
);
?>

<h1>View OstPublication #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'doc_type',
		'title',
		'doc_url',
		'doc_dt',
		'publish_startdt',
		'publish_enddt',
		'doc_dvsn',
		'hits',
		'parent_id',
		'lang',
		'created_dt',
		'created_by',
		'updated_dt',
		'updated_by',
	),
)); ?>

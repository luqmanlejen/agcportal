<?php
/* @var $this CaseInfoController */
/* @var $model CaseInfo */

$this->breadcrumbs=array(
	'Case Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseInfo', 'url'=>array('index')),
	array('label'=>'Create CaseInfo', 'url'=>array('create')),
	array('label'=>'Update CaseInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CaseInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseInfo', 'url'=>array('admin')),
);
?>

<h1>View CaseInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_type',
		'url',
		'case_cat',
		'case_month',
		'case_year',
		'hits',
		'lang',
		'created_dt',
		'created_by',
		'updated_dt',
		'updated_by',
	),
)); ?>

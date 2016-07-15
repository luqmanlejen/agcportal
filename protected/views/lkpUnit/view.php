<?php
/* @var $this LkpUnitController */
/* @var $model LkpUnit */

$this->breadcrumbs=array(
	'Lkp Units'=>array('index'),
	$model->UNIT_ID,
);

$this->menu=array(
	array('label'=>'List LkpUnit', 'url'=>array('index')),
	array('label'=>'Create LkpUnit', 'url'=>array('create')),
	array('label'=>'Update LkpUnit', 'url'=>array('update', 'id'=>$model->UNIT_ID)),
	array('label'=>'Delete LkpUnit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->UNIT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LkpUnit', 'url'=>array('admin')),
);
?>

<h1>View LkpUnit #<?php echo $model->UNIT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'UNIT_ID',
		'UNIT',
		'BAHAGIAN_ID',
		'UNIT_SORT',
	),
)); ?>

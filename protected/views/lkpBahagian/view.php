<?php
/* @var $this LkpBahagianController */
/* @var $model LkpBahagian */

$this->breadcrumbs=array(
	'Lkp Bahagians'=>array('index'),
	$model->BAHAGIAN_ID,
);

$this->menu=array(
	array('label'=>'List LkpBahagian', 'url'=>array('index')),
	array('label'=>'Create LkpBahagian', 'url'=>array('create')),
	array('label'=>'Update LkpBahagian', 'url'=>array('update', 'id'=>$model->BAHAGIAN_ID)),
	array('label'=>'Delete LkpBahagian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BAHAGIAN_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LkpBahagian', 'url'=>array('admin')),
);
?>

<h1>View LkpBahagian #<?php echo $model->BAHAGIAN_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BAHAGIAN_ID',
		'BAHAGIAN',
		'sort',
		'hide',
	),
)); ?>

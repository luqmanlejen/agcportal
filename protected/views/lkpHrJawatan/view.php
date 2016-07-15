<?php
/* @var $this LkpHrJawatanController */
/* @var $model LkpHrJawatan */

$this->breadcrumbs=array(
	'Lkp Hr Jawatans'=>array('index'),
	$model->JTN_ID,
);

$this->menu=array(
	array('label'=>'List LkpHrJawatan', 'url'=>array('index')),
	array('label'=>'Create LkpHrJawatan', 'url'=>array('create')),
	array('label'=>'Update LkpHrJawatan', 'url'=>array('update', 'id'=>$model->JTN_ID)),
	array('label'=>'Delete LkpHrJawatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->JTN_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LkpHrJawatan', 'url'=>array('admin')),
);
?>

<h1>View LkpHrJawatan #<?php echo $model->JTN_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'JTN_ID',
		'JTN_JWTN_NAMA',
	),
)); ?>

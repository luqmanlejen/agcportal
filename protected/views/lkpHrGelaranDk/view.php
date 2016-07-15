<?php
/* @var $this LkpHrGelaranDkController */
/* @var $model LkpHrGelaranDk */

$this->breadcrumbs=array(
	'Lkp Hr Gelaran Dks'=>array('index'),
	$model->GDK_ID,
);

$this->menu=array(
	array('label'=>'List LkpHrGelaranDk', 'url'=>array('index')),
	array('label'=>'Create LkpHrGelaranDk', 'url'=>array('create')),
	array('label'=>'Update LkpHrGelaranDk', 'url'=>array('update', 'id'=>$model->GDK_ID)),
	array('label'=>'Delete LkpHrGelaranDk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GDK_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LkpHrGelaranDk', 'url'=>array('admin')),
);
?>

<h1>View LkpHrGelaranDk #<?php echo $model->GDK_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GDK_ID',
		'GDK_DK_ID',
		'GDK_GELARAN',
		'GDKTKH_DICIPTA',
		'GDK_ID_CIPTA',
		'GDK_TKH_KEMASKINI',
		'GDK_ID_KEMASKINI',
	),
)); ?>

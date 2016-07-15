<?php
/* @var $this HrPenempatanController */
/* @var $model HrPenempatan */

$this->breadcrumbs=array(
	'Hr Penempatans'=>array('index'),
	$model->PEN_ID,
);

$this->menu=array(
	array('label'=>'List HrPenempatan', 'url'=>array('index')),
	array('label'=>'Create HrPenempatan', 'url'=>array('create')),
	array('label'=>'Update HrPenempatan', 'url'=>array('update', 'id'=>$model->PEN_ID)),
	array('label'=>'Delete HrPenempatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PEN_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HrPenempatan', 'url'=>array('admin')),
);
?>

<h1>View HrPenempatan #<?php echo $model->PEN_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PEN_ID',
		'PEN_GREDJWT_ID',
		'PEN_AGENSI_ID',
		'PEN_STATUS_KADER',
		'PEN_STATUS_ID',
		'PEN_BHGN_ID',
		'PEN_UNIT_ID',
		'PEN_NEGERI_ID',
		'PEN_STF_ID',
		'PEN_DAERAH_ID',
	),
)); ?>

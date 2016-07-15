<?php
/* @var $this FaxController */
/* @var $model Fax */

$this->breadcrumbs=array(
	'Faxes'=>array('index'),
	$model->FAX_ID,
);

$this->menu=array(
	array('label'=>'List Fax', 'url'=>array('index')),
	array('label'=>'Create Fax', 'url'=>array('create')),
	array('label'=>'Update Fax', 'url'=>array('update', 'id'=>$model->FAX_ID)),
	array('label'=>'Delete Fax', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->FAX_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fax', 'url'=>array('admin')),
);
?>

<h1>View Fax #<?php echo $model->FAX_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FAX_ID',
		'FAX_SEC_UNIT',
		'FAX_NO',
		'FAX_DIVISION',
		'FAX_PARENT_LANG',
		'FAX_LANG',
		'FAX_SORT',
		'FAX_FLAG_DELETE',
		'FAX_CREATED_BY',
		'FAX_CREATED_DT',
		'FAX_UPDATED_BY',
		'FAX_UPDATED_DT',
	),
)); ?>

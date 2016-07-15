<?php
/* @var $this HrPenempatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hr Penempatans',
);

$this->menu=array(
	array('label'=>'Create HrPenempatan', 'url'=>array('create')),
	array('label'=>'Manage HrPenempatan', 'url'=>array('admin')),
);
?>

<h1>Hr Penempatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

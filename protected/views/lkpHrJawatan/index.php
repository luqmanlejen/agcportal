<?php
/* @var $this LkpHrJawatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lkp Hr Jawatans',
);

$this->menu=array(
	array('label'=>'Create LkpHrJawatan', 'url'=>array('create')),
	array('label'=>'Manage LkpHrJawatan', 'url'=>array('admin')),
);
?>

<h1>Lkp Hr Jawatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this LkpUnitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lkp Units',
);

$this->menu=array(
	array('label'=>'Create LkpUnit', 'url'=>array('create')),
	array('label'=>'Manage LkpUnit', 'url'=>array('admin')),
);
?>

<h1>Lkp Units</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

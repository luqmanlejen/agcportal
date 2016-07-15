<?php
/* @var $this LkpBahagianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lkp Bahagians',
);

$this->menu=array(
	array('label'=>'Create LkpBahagian', 'url'=>array('create')),
	array('label'=>'Manage LkpBahagian', 'url'=>array('admin')),
);
?>

<h1>Lkp Bahagians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

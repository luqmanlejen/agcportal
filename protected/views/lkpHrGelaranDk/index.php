<?php
/* @var $this LkpHrGelaranDkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lkp Hr Gelaran Dks',
);

$this->menu=array(
	array('label'=>'Create LkpHrGelaranDk', 'url'=>array('create')),
	array('label'=>'Manage LkpHrGelaranDk', 'url'=>array('admin')),
);
?>

<h1>Lkp Hr Gelaran Dks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

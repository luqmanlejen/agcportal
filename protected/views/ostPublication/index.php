<?php
/* @var $this OstPublicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ost Publications',
);

$this->menu=array(
	array('label'=>'Create OstPublication', 'url'=>array('create')),
	array('label'=>'Manage OstPublication', 'url'=>array('admin')),
);
?>

<h1>Ost Publications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

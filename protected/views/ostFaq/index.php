<?php
/* @var $this OstFaqController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ost Faqs',
);

$this->menu=array(
	array('label'=>'Create OstFaq', 'url'=>array('create')),
	array('label'=>'Manage OstFaq', 'url'=>array('admin')),
);
?>

<h1>Ost Faqs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

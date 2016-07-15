<?php
/* @var $this OstTilesHitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ost Tiles Hits',
);

$this->menu=array(
	array('label'=>'Create OstTilesHit', 'url'=>array('create')),
	array('label'=>'Manage OstTilesHit', 'url'=>array('admin')),
);
?>

<h1>Ost Tiles Hits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

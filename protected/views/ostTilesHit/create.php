<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */

$this->breadcrumbs=array(
	'Ost Tiles Hits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OstTilesHit', 'url'=>array('index')),
	array('label'=>'Manage OstTilesHit', 'url'=>array('admin')),
);
?>

<h1>Create OstTilesHit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
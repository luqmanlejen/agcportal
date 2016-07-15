<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */

$this->breadcrumbs=array(
	'Ost Tiles Hits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OstTilesHit', 'url'=>array('index')),
	array('label'=>'Create OstTilesHit', 'url'=>array('create')),
	array('label'=>'View OstTilesHit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OstTilesHit', 'url'=>array('admin')),
);
?>

<h1>Update OstTilesHit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
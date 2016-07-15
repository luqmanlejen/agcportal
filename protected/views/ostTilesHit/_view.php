<?php
/* @var $this OstTilesHitController */
/* @var $data OstTilesHit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiles_bm')); ?>:</b>
	<?php echo CHtml::encode($data->tiles_bm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiles_bi')); ?>:</b>
	<?php echo CHtml::encode($data->tiles_bi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiles_url_bm')); ?>:</b>
	<?php echo CHtml::encode($data->tiles_url_bm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiles_url_bi')); ?>:</b>
	<?php echo CHtml::encode($data->tiles_url_bi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_bm')); ?>:</b>
	<?php echo CHtml::encode($data->hits_bm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_bi')); ?>:</b>
	<?php echo CHtml::encode($data->hits_bi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_last_date_bm')); ?>:</b>
	<?php echo CHtml::encode($data->hits_last_date_bm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_last_date_bi')); ?>:</b>
	<?php echo CHtml::encode($data->hits_last_date_bi); ?>
	<br />

	*/ ?>

</div>
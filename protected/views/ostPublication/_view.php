<?php
/* @var $this OstPublicationController */
/* @var $data OstPublication */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_type')); ?>:</b>
	<?php echo CHtml::encode($data->doc_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_url')); ?>:</b>
	<?php echo CHtml::encode($data->doc_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_dt')); ?>:</b>
	<?php echo CHtml::encode($data->doc_dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_startdt')); ?>:</b>
	<?php echo CHtml::encode($data->publish_startdt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_enddt')); ?>:</b>
	<?php echo CHtml::encode($data->publish_enddt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_dvsn')); ?>:</b>
	<?php echo CHtml::encode($data->doc_dvsn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits')); ?>:</b>
	<?php echo CHtml::encode($data->hits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang')); ?>:</b>
	<?php echo CHtml::encode($data->lang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_dt')); ?>:</b>
	<?php echo CHtml::encode($data->created_dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_dt')); ?>:</b>
	<?php echo CHtml::encode($data->updated_dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	*/ ?>

</div>
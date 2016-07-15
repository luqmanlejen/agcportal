<?php
/* @var $this FaxController */
/* @var $data Fax */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FAX_ID), array('view', 'id'=>$data->FAX_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_SEC_UNIT')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_SEC_UNIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_NO')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_DIVISION')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_DIVISION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_PARENT_LANG')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_PARENT_LANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_LANG')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_LANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_SORT')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_SORT); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_FLAG_DELETE')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_FLAG_DELETE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_CREATED_BY')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_CREATED_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_CREATED_DT')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_CREATED_DT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_UPDATED_BY')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_UPDATED_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX_UPDATED_DT')); ?>:</b>
	<?php echo CHtml::encode($data->FAX_UPDATED_DT); ?>
	<br />

	*/ ?>

</div>
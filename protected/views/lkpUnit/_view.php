<?php
/* @var $this LkpUnitController */
/* @var $data LkpUnit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNIT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->UNIT_ID), array('view', 'id'=>$data->UNIT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNIT')); ?>:</b>
	<?php echo CHtml::encode($data->UNIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BAHAGIAN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->BAHAGIAN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNIT_SORT')); ?>:</b>
	<?php echo CHtml::encode($data->UNIT_SORT); ?>
	<br />


</div>
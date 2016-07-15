<?php
/* @var $this LkpBahagianController */
/* @var $data LkpBahagian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BAHAGIAN_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BAHAGIAN_ID), array('view', 'id'=>$data->BAHAGIAN_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BAHAGIAN')); ?>:</b>
	<?php echo CHtml::encode($data->BAHAGIAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hide')); ?>:</b>
	<?php echo CHtml::encode($data->hide); ?>
	<br />


</div>
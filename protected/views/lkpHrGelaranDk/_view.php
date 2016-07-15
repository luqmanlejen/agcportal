<?php
/* @var $this LkpHrGelaranDkController */
/* @var $data LkpHrGelaranDk */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GDK_ID), array('view', 'id'=>$data->GDK_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_DK_ID')); ?>:</b>
	<?php echo CHtml::encode($data->GDK_DK_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_GELARAN')); ?>:</b>
	<?php echo CHtml::encode($data->GDK_GELARAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDKTKH_DICIPTA')); ?>:</b>
	<?php echo CHtml::encode($data->GDKTKH_DICIPTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_ID_CIPTA')); ?>:</b>
	<?php echo CHtml::encode($data->GDK_ID_CIPTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_TKH_KEMASKINI')); ?>:</b>
	<?php echo CHtml::encode($data->GDK_TKH_KEMASKINI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GDK_ID_KEMASKINI')); ?>:</b>
	<?php echo CHtml::encode($data->GDK_ID_KEMASKINI); ?>
	<br />


</div>
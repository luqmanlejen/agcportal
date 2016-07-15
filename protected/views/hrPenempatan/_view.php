<?php
/* @var $this HrPenempatanController */
/* @var $data HrPenempatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PEN_ID), array('view', 'id'=>$data->PEN_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_GREDJWT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_GREDJWT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_AGENSI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_AGENSI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_STATUS_KADER')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_STATUS_KADER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_STATUS_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_STATUS_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_BHGN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_BHGN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_UNIT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_UNIT_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_NEGERI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_NEGERI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_STF_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_STF_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEN_DAERAH_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEN_DAERAH_ID); ?>
	<br />

	*/ ?>

</div>
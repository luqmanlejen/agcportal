<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ost-tiles-hit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tiles_bm'); ?>
		<?php echo $form->textField($model,'tiles_bm',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tiles_bm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tiles_bi'); ?>
		<?php echo $form->textField($model,'tiles_bi',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tiles_bi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tiles_url_bm'); ?>
		<?php echo $form->textField($model,'tiles_url_bm',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tiles_url_bm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tiles_url_bi'); ?>
		<?php echo $form->textField($model,'tiles_url_bi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tiles_url_bi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_bm'); ?>
		<?php echo $form->textField($model,'hits_bm'); ?>
		<?php echo $form->error($model,'hits_bm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_bi'); ?>
		<?php echo $form->textField($model,'hits_bi'); ?>
		<?php echo $form->error($model,'hits_bi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_last_date_bm'); ?>
		<?php echo $form->textField($model,'hits_last_date_bm',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hits_last_date_bm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_last_date_bi'); ?>
		<?php echo $form->textField($model,'hits_last_date_bi',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hits_last_date_bi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
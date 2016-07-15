<?php
/* @var $this OstTilesHitController */
/* @var $model OstTilesHit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiles_bm'); ?>
		<?php echo $form->textField($model,'tiles_bm',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiles_bi'); ?>
		<?php echo $form->textField($model,'tiles_bi',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiles_url_bm'); ?>
		<?php echo $form->textField($model,'tiles_url_bm',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiles_url_bi'); ?>
		<?php echo $form->textField($model,'tiles_url_bi',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_bm'); ?>
		<?php echo $form->textField($model,'hits_bm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_bi'); ?>
		<?php echo $form->textField($model,'hits_bi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_last_date_bm'); ?>
		<?php echo $form->textField($model,'hits_last_date_bm',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_last_date_bi'); ?>
		<?php echo $form->textField($model,'hits_last_date_bi',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="row">
    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route . $exturl), 'method' => 'get',)); ?>

    &nbsp;&nbsp;    
    <?php echo $form->label($model, 'case_type'); ?>
    <?php echo $form->textField($model, 'case_type', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>

    <button class="btn btn-sm btn-warning width-10" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
    <a href="index.php?r=caseInfo/admin<?php echo $exturl; ?>" class="btn btn-sm btn-success width-10"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
    <a href="index.php?r=caseInfo/create<?php echo $exturl; ?>" class="btn btn-sm btn-primary width-10"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>

    <?php $this->endWidget(); ?>
</div>
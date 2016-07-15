<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/ckfinder.js"></script>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'ost-faq-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>
    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Fields with * are required.</div>
    
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'question', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'question', array('size' => 60, 'maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'question'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'answer', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'answer', array('rows' => 6, 'cols' => 50, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'answer'); ?>
        </div>
    </div>
    <div class="space-4"></div>    
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'sort', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model, 'sort', OstFaq::model()->getSortList(), array('class' => 'col-sm-7')); ?>
            <br><br><div class="grey"><b>Nota</b> : These parameters will be placed under the  selected order</div>
            <?php echo $form->error($model, 'sort'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model, 'status', array('1'=>'True', '0'=>'False'), array('class' => 'col-sm-7')); ?>
            <?php // echo $form->textField($model, 'status', array('size' => 60, 'maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=ostFaq/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110"></i>&nbsp;Back</a>&nbsp;&nbsp;
        <button class="btn btn-success" type="button" onclick="window.location.reload()"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</button>&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit"><?php echo $model->isNewRecord ? '<i class="ace-icon fa fa-plus bigger-110"></i>&nbsp;Add' : '<i class="ace-icon fa fa-pencil bigger-110"></i>&nbsp;Update'; ?></button>
    </div>
    <?php $this->endWidget(); ?>
</div>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/datepicker.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            jQuery(function($) {
                $('.input-daterange').datepicker({autoclose: true, format: "yyyy-mm-dd"});
                CKEDITOR.replace('News_message_my', {height: 300});
                CKEDITOR.replace('News_message_en', {height: 300});
            });
</script>
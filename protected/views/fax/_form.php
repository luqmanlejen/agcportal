<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'fax-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!--section/unit-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'FAX_SEC_UNIT', array('class' => 'control-label')); ?> (English Version)</div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'FAX_SEC_UNIT', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'FAX_SEC_UNIT'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'FAX_SEC_UNIT2', array('class' => 'control-label')); ?> (Malay Version)</div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'FAX_SEC_UNIT2', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'FAX_SEC_UNIT2'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    
    <!-- Fax No* -->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'FAX_NO', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'FAX_NO', array('maxlength' => 255, 'class' => 'col-sm-3')); ?> 
            <?php echo $form->error($model, 'FAX_NO'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--Division-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'FAX_DIVISION', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model, 'FAX_DIVISION', LkpBahagian::model()->getdeptlist2(), array('prompt' => '-- Choose Department --', 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'FAX_DIVISION'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=fax/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
        <a href="<?php echo Yii::app()->request->getUrl(); ?>" class="btn btn-success"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</a>&nbsp;&nbsp;
        <?php
        if ($model->isNewRecord)
            echo '<button class="btn btn-primary" type="submit"><i class="ace-icon fa fa-plus bigger-110"></i>&nbsp;Add</button>&nbsp;&nbsp;';
        else
            echo '<button class="btn btn-primary" type="submit"><i class="ace-icon fa fa-pencil bigger-110"></i>&nbsp;Update</button>&nbsp;&nbsp;';
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
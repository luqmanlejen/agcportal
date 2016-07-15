<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'lkp-hr-gelaran-dk-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!--gelaran-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'GDK_GELARAN', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'GDK_GELARAN', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'GDK_GELARAN'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=lkpHrGelaranDk/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
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
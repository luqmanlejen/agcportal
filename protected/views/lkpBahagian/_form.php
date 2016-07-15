<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'lkp-bahagian-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!--division name-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'BAHAGIAN', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'BAHAGIAN', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'BAHAGIAN'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--division name-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'BAHAGIAN_EN', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'BAHAGIAN_EN', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'BAHAGIAN_EN'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--sort-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'sort', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model, 'sort', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->dropDownList($model, 'sort', LkpBahagian::model()->getdeptlist(),array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'sort'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--status-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'hide', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'hide', array('0'=>'Display', '1'=>'Hide'),array('maxlength' => 255, 'class' => 'col-sm-2')); ?>
            <?php echo $form->error($model, 'hide'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=lkpBahagian/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
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
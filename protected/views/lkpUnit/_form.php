<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'lkp-unit-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!--section/unit-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'UNIT', array('class' => 'control-label')); ?> (English Version)</div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'UNIT', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'UNIT'); ?>
        </div>
    </div>
    <div class="space-4"></div>    
    
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'UNIT_MY', array('class' => 'control-label')); ?> (Malay Version)</div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'UNIT_MY', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'UNIT_MY'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    
    <!-- NEGERI ID* -->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'NEGERI_ID', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php //echo $form->textField($model, 'NEGERI_ID', array('maxlength' => 255, 'class' => 'col-sm-3')); ?> 
            <?php echo $form->dropdownlist($model, 'NEGERI_ID', Negeri::model()->getlist(), array('prompt' => '-- Choose State --', 'class' => 'col-sm-3'))?> 
            <?php echo $form->error($model, 'NEGERI_ID'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--Division-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'BAHAGIAN_ID', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model, 'BAHAGIAN_ID', LkpBahagian::model()->getdeptlist2(), array('prompt' => '-- Choose Department --', 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'BAHAGIAN_ID'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--Hide-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'UNIT_HIDE', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->checkbox($model, 'UNIT_HIDE'); ?>
            <span style="color:red;"><b>Note :</b> Tick to view in portal</span>
            <?php echo $form->error($model, 'UNIT_HIDE'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=lkpUnit/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
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
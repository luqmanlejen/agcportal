<?php
$dept = '';
$unit = '';
$bahagian = '';
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'hr-penempatan-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!-- Menu -->
    <?php
    if (isset($_GET['id'])) {
        echo CHtml::hiddenField('HrPenempatan[id]', $_GET['id']);
        //echo CHtml::hiddenfield($model2->STF_ID, $_GET['STF_ID']);
    }
    ?>

    <!--honorary title-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_TITLE', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">          
            <?php echo $form->dropDownList($model2, 'STF_TITLE', LkpHrGelaranDk::model()->getList(),array('class' => 'col-sm-4', 'prompt'=>'-- Please Choose --')); ?>
            <?php echo $form->error($model2, 'STF_TITLE'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--nama staff-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NAMA', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model2, 'STF_NAMA', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo CHtml::textfield('HrStaffPeribadi[STF_NAMA]', $data['STF_NAMA'], array('class' => 'col-sm-7', 'readonly' => '', 'id' => 'name')); ?>
            <?php echo $form->error($model2, 'STF_NAMA'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--email staff-->
    <?php echo CHtml::hiddenfield($model2->STF_NOKP_BARU, $data['STF_NOKP_BARU'], array('class' => 'col-sm-7', 'readonly' => '')); ?>  

    <!--email staff-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_EMAIL', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model2, 'STF_EMAIL', array('maxlength' => 255, 'class' => 'col-sm-7', 'id'=>'email')); ?>
            <?php echo CHtml::textfield($model2->STF_EMAIL, $data['STF_USERNAME'], array('class' => 'col-sm-7', 'readonly' => '')); ?>
            <?php echo $form->error($model2, 'STF_EMAIL'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--no. tel staff-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NO_TEL_PEJABAT', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <span id="s4" class="required"></span>
            <?php // echo $form->textField($model2, 'STF_NO_TEL_PEJABAT', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php
            if (isset($_GET['STF_NO_TEL_PEJABAT']) && $_GET['STF_NO_TEL_PEJABAT'] != '') {
                echo CHtml::textfield('HrStaffPeribadi[STF_NO_TEL_PEJABAT]', $data['STF_NO_TEL_PEJABAT'], array('class' => 'col-sm-7', 'readonly' => '', 'id' => 'name'));
            } else {
                echo $form->textField($model2, 'STF_NO_TEL_PEJABAT', array('maxlength' => 255, 'class' => 'col-sm-7'));
            }
            ?>
            <?php echo $form->error($model2, 'STF_NO_TEL_PEJABAT'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--division-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model5, 'Division', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php
            echo $form->dropdownlist($model5, 'BAHAGIAN_ID', $model5->getdeptlist2(), array( 'class' => 'col-sm-7', 'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('hrPenempatan/changedept'),
                    'success' => 'function(data){
                            $("#LkpUnit_UNIT_ID").html(data);
                        }'
                ,)));
            ?>
            <?php echo $form->error($model5, 'BAHAGIAN'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--unit-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model4, 'UNIT', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model4, 'UNIT_ID', $model4->getdeptsub($model5->BAHAGIAN_ID), array('class' => 'col-sm-7')); ?>
            <?php echo $form->error($model4, 'UNIT'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--grade-->
<!--    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_GRED_ID', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model6, 'GRED_ID', $model6->getgredlist(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7')) ?>
            <?php // echo $form->textField($model6, 'GRED_ID', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model6, 'GRED_ID'); ?>
        </div>
    </div>
    <div class="space-4"></div>-->

    <!--position-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'Position', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model3, 'JTN_JWTN_NAMA', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->dropDownList($model2, 'STF_JWTN_ID', $model3->getpositionlist(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7')) ?>
            <?php echo $form->error($model3, 'JTN_JWTN_NAMA'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=hrPenempatan/list" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;        
        <a href="<?php echo Yii::app()->request->getUrl(); ?>" class="btn btn-success"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</a>&nbsp;&nbsp;
        <?php
        if ($model->isNewRecord)
            echo '<button id="submit" class="btn btn-primary" data-toggle="modal" type="submit"><i class="ace-icon fa fa-plus bigger-110"></i>&nbsp;Add</button>&nbsp;&nbsp;';
        else
            echo '<button id="submit" class="btn btn-primary" data-toggle="modal" type="submit"><i class="ace-icon fa fa-pencil bigger-110"></i>&nbsp;Update</button>&nbsp;&nbsp;';
        ?>
        <!--<a id="test" href="" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;-->        
    </div>    
    <?php $this->endWidget(); ?>

</div><!-- form -->
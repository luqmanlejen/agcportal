<?php
$dept = '';
$unit = '';
$bahagian = '';
$position = '';
?>

<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/ckfinder.js"></script>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'hr-penempatan-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <!-- Menu -->

    <?php
    if (isset($_GET['id'])) {
        echo CHtml::hiddenField('HrPenempatan[id]', $_GET['id']);
    }
    ?>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NAMA', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model2, 'STF_NAMA', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model2, 'STF_NAMA'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'Position', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php
            if($model2->STF_JWTN_ID != ''){
                echo $form->dropDownList($model2, 'STF_JWTN_ID', $model3->getpositionlist(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7'));
            } else {
                $position_list = CHtml::listData(LkpHrJawatan::model()->findAll(), 'JTN_ID', 'JTN_JWTN_NAMA');               
                echo CHtml::dropDownList('HrPenempatan[PEN_UNIT_ID]', $position, $position_list, array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7'));
            }
            ?>
            <?php echo $form->error($model2, 'STF_JWTN_ID'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NO_TEL_PEJABAT', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->textField($model2, 'STF_NO_TEL_PEJABAT', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model2, 'STF_NO_TEL_PEJABAT'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model5, 'Department', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php
            echo $form->dropdownlist($model5, 'BAHAGIAN_ID', $model5->getdeptlist2(), array('prompt' => '-- Choose Department --', 'class' => 'col-sm-7', 'ajax' => array(
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

    <div class="form-group">
        <div class="col-sm-2">
            <?php
            if ($model4 != '') {
                echo $form->labelEx($model4, 'UNIT', array('class' => 'control-label'));
            } else {
                echo $form->labelEx($model, 'UNIT', array('class' => 'control-label'));
            }
            ?>
        </div>
        <div class="col-sm-10">
            <?php
            if ($model4 != '') {
                echo $form->dropdownlist($model4, 'UNIT_ID', $model4->getdeptsub($model5->BAHAGIAN_ID), array('class' => 'col-sm-7'));
            } else {
                $unit_list = CHtml::listData(LkpUnit::model()->findAll(), 'UNIT_ID', 'UNIT');
                echo CHtml::dropDownList('HrPenempatan[PEN_UNIT_ID]', $unit, $unit_list, array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7'));
            }
            ?>
<?php if ($model4 != '') {
    echo $form->error($model4, 'UNIT');
} ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_LEVEL', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
<?php echo $form->dropdownlist($model2, 'STF_LEVEL', $model2->getlevel(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7')); ?>
<?php echo $form->error($model2, 'STF_LEVEL'); ?>
            <br><br> <p style="color:red;"><b>Note :</b> For selected staff level only.</p>
        </div>
    </div>    
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'NO FAKS', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
<?php echo $form->textField($model2, 'STF_NO_FAKS', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
<?php echo $form->error($model2, 'STF_NO_FAKS'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=hrPenempatan/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
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


<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.hotkeys.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap-wysiwyg.js"></script>

<script>
    $(function () {

//        CKEDITOR.replace('OstArticles_content', {height: 300, toolbar: [
//                {name: 'clipboard', items: ['Source', 'Cut', 'Copy', 'Paste', 'Undo', 'Redo']},
//                {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline']},
//                {name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
//                {name: 'links', items: ['Link', 'Unlink']},
//                {name: 'insert', items: ['Image', 'Table']},
//                {name: 'tools', items: ['Maximize']}
//            ]});
//        CKEDITOR.replace('content_my', {height: 300, toolbar: [
//                {name: 'clipboard', items: ['Source', 'Cut', 'Copy', 'Paste', 'Undo', 'Redo']},
//                {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline']},
//                {name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
//                {name: 'links', items: ['Link', 'Unlink']},
//                {name: 'insert', items: ['Image', 'Table']},
//                {name: 'tools', items: ['Maximize']}
//            ]});

        //CKEDITOR.replace('OstArticles_content', {height: 300});
        //CKEDITOR.replace('content_my', {height: 300});

    });

</script>
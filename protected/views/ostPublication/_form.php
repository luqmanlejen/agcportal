<?php
include 'header.php';

$daterange = '';
$date = '';

if (!$model->isNewRecord) {
    if ($model->publish_startdt != '0000-00-00' && $model->publish_enddt != '0000-00-00') {
        $publish_startdt_exp = explode(' ', $model->publish_startdt);
        $publish_publish_enddt = explode(' ', $model->publish_enddt);
        //$daterange = $publish_startdt_exp[0] . '-' . $publish_startdt_exp[1] . '-' . $publish_startdt_exp[2] . ' - ' . $publish_publish_enddt[0] . '-' . $publish_publish_enddt[1] . '-' . $publish_publish_enddt[2];
        $daterange = $publish_startdt_exp[0]. ' - ' . $publish_publish_enddt[0];
    }
    if ($model->doc_dt != '0000-00-00') {
//        $date = $model->display_startdt;
        //$publish_doc_exp = explode('-', $model->doc_dt);
        //$date = $publish_doc_exp[0] . '-' . $publish_doc_exp[1] . '-' . $publish_doc_exp[0];
        $date = $model->doc_dt;
    }
}

$statusp = '';
$statust = '';

if ($model->isNewRecord) {
    $statusp = 'checked';
} else {
    if ($model->display_type == 'p')
        $statusp = 'checked';
    if ($model->display_type == 't')
        $statust = 'checked';
}

Yii::app()->clientScript->registerScript("", "");
?>
<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckeditor.js"></script>

<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/ckfinder.js"></script>
<script>

    function BrowseServer() {

        var finder = new CKFinder();

        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';

        finder.selectActionFunction = SetFileField;

        finder.popup();
    }
    
    function BrowseServer2() {

        var finder = new CKFinder();

        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';

        finder.selectActionFunction = SetFileField2;

        finder.popup();
    }

    function SetFileField(fileUrl) {

        //$('.div_foto').html('<img src="' + fileUrl + '">');
        
        $('#doc').val(fileUrl);

        $('#doc_url').val(fileUrl);
    }
    
    function SetFileField2(fileUrl) {

        //$('.div_foto').html('<img src="' + fileUrl + '">');
        
        $('#doc_bm').val(fileUrl);

        $('#doc_url_bm').val(fileUrl);
    }

</script>

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui.custom.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/daterangepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-datetimepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/colorpicker.css" />

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'ost-publication-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>
    
    <!--Title-->
    <div class="form-group">
        <div class="col-sm-3"><?php echo $form->labelEx($model, 'title', array('class' => 'control-label')); ?> (English Version)</div>
        <div class="col-sm-9">
            <?php echo $form->textField($model, 'title', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="form-group">
        <div class="col-sm-3"><label class="control-label">Title</label> (Malay Version)</div>
        <div class="col-sm-9"><?php echo CHtml::textField('title_my', $model2->title, array('maxlength' => 255, 'class' => 'col-sm-7')); ?></div>
    </div>
    <div class="space-4"></div>
    
    <!--Document-->
    <div class="form-group">
        <div class="col-sm-3"><?php echo $form->labelEx($model, 'doc_url', array('class' => 'control-label')); ?> (English Version)</div>
        <div class="col-sm-9">
            <?php // echo $form->textField($model, 'doc_url', array('maxlength' => 255, 'class' => 'col-sm-12')); ?>
            <?php // echo $form->error($model, 'doc_url'); ?>
            <div class="col-sm-6">
                <div class="col-xs-10 col-lg-10" style="margin-left: -25px; width: 88%;">
                    <input type="hidden" id="doc_url" name="OstPublication[doc_url]" value="<?php echo $model->doc_url; ?>">
                    <?php if(isset($model->doc_url)){ ?>
                        <input type="text" id="doc" class="form-control" value="<?php echo $model->doc_url ?>">
                    <?php } else { ?>
                        <input type="text" id="doc" class="form-control" value="">
                    <?php } ?>
                    <?php echo $form->error($model, 'doc_url'); ?>
                </div>
                <div class="col-xs-2 col-lg-2">
                    <input type="button" value="Upload Document" onclick="BrowseServer();" class="btn btn-sm btn-success width-200"/>
                </div>
            </div>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="form-group">
        <div class="col-sm-3"><label class="control-label">Document</label> (Malay Version)</div>
        <div class="col-sm-9">
            <?php // echo CHtml::textField('doc_url_my', $model2->title, array('maxlength' => 255, 'class' => 'col-sm-12')); ?>
            <div class="col-sm-6">
                <div class=" col-xs-10 col-lg-10" style="margin-left: -25px; width: 88%;">
                    <?php echo CHtml::hiddenField('doc_url_bm', $model2->doc_url , array('class' => 'form-control form-control-medium')); ?>
                    <?php if(isset($model2->doc_url)){ ?>
                    <input type="text" id="doc_bm" class="form-control" value="<?= $model2->doc_url ?>"/>
                    <?php } else { ?>
                        <input type="text" id="doc_bm" class="form-control" value=""/>
                    <?php } ?>
                    <?php echo $form->error($model2, 'doc_url_bm'); ?>
                </div>
                <div class="col-xs-2 col-lg-2">
                    <input type="button" value="Upload Document" onclick="BrowseServer2();" class="btn btn-sm btn-success width-200"/>
                </div>
            </div>
        </div>
    </div>
    <div class="space-4"></div>
    <div class="form-group">
        <div class="col-sm-3"><?php echo $form->labelEx($model, 'doc_dt', array('class' => 'control-label')); ?></div>
        <div class="col-sm-9">
            <?php // echo $form->textField($model, 'doc_dt', array('maxlength' => 255, 'class' => 'col-sm-12')); ?>
            <!--<div class="col-sm-4">-->
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                    </span>
                    <?php if(isset($_GET['doc_dt']) && $_GET['doc_dt'] != '') { ?>
                        <!--<input class="col-sm-4" type="text" name="date" value="<?php // echo $date; ?>" />-->
                        <input  class="col-sm-6" style="width:56%" type="text" name="date" value="<?php echo $_GET['doc_dt']; ?>" />
                    <?php } else { ?>
                        <input class="col-sm-6" style="width:56%" type="text" name="date" value="<?php echo $date ?>" />
                    <?php }?>
                </div>
            <!--</div>-->
            <?php echo $form->error($model, 'doc_dt'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--archive-->
    <div class="form-group">
        <div class="col-sm-3"><?php echo $form->labelEx($model, 'display_type', array('class' => 'control-label')); ?></div>
        <div class="col-sm-9">
            <div class="col-sm-2">
                <div class="radio">
                    <label class="no-padding">
                        <input name="OstPublication[display_type]" class="ace" type="radio" value="p" <?php echo $statusp; ?>>
                        <span class="lbl"> Permanent</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">&nbsp;</div>
        <div class="col-sm-9">
            <div class="col-sm-2">
                <div class="radio">
                    <label class="no-padding">
                        <input name="OstPublication[display_type]" class="ace" type="radio" value="t" <?php echo $statust; ?>>
                        <span class="lbl"> Temporary</span>
                    </label>
                </div>
            </div>
<!--        </div>
    </div>-->
    
    <!--Date-->
<!--    <div class="form-group">
        <div class="col-sm-3"><?php // echo $form->labelEx($model, '', array('class' => 'control-label', 'label'=>'Display Date Range')); ?></div>
        <div class="col-sm-9">-->
            <!--<div class="col-sm-4">-->
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                    </span>
                    <?php // if(isset($_GET['daterange'])) {?>
                    <input class="col-sm-6" style="width:46.5%" type="text" name="daterange" value="<?php echo $daterange; ?>"/>
                    <?php // } ?>
                </div>
            <!--</div>-->
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--Division-->
    <div class="form-group">
        <div class="col-sm-3"><?php echo $form->labelEx($model, 'doc_dvsn', array('class' => 'control-label')); ?></div>
        <div class="col-sm-9">
            <?php // echo $form->textField($model, 'doc_dvsn', array('maxlength' => 255, 'class' => 'col-sm-12')); ?>
            <?php echo $form->dropDownList($model, 'doc_dvsn', $model->getdvsnlist(), array('prompt'=>'--Please Choose--', 'class'=>'col-sm-7')); ?>
            <?php echo $form->error($model, 'doc_dvsn'); ?>
        </div>
    </div>
<!--    <div class="form-group">
        <div class="col-sm-2"><label class="control-label required">Division Access</label></div>
        <div class="col-sm-10" id="divroles">
            <?php
//            $rolesarr = array();
//            if (!$model->isNewRecord) {
//                $rolesarr = $model->getdvsn();
//            }
//            if (isset($_POST['role_code'])) {
//                $rolesarr = $_POST['role_code'];
//            }
//            echo CHtml::checkBoxList('role_code', $rolesarr, OstRefList::model()->listRef3(3));
            ?>
            <div class="errorMessage" id="errorMessageDvsn" style="display:none;">Please select at least ONE (1) division.</div>
        </div>
    </div>-->
    <div class="space-4"></div>
    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=ostPublication/admin&doc_type=<?php echo $_GET['doc_type']; ?>" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
        <button class="btn btn-success" type="button" onclick="window.location.reload()"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</button>&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit"><?php echo $model->isNewRecord ? '<i class="ace-icon fa fa-plus bigger-110"></i>&nbsp;Add' : '<i class="ace-icon fa fa-pencil bigger-110"></i>&nbsp;Update'; ?></button>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->


<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/bootstrap-timepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/moment.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/date-time/daterangepicker.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.hotkeys.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap-wysiwyg.js"></script>

<script>
    $(function() {

        $('input[name=daterange]').daterangepicker({
            format: 'YYYY-MM-DD',
            'applyClass': 'btn-sm btn-success',
            'cancelClass': 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        }).prev().on(ace.click_event, function() {
            $(this).next().focus();
        });
        
        $('input[name=date]').datepicker({
            format: 'yyyy-mm-dd',
            'applyClass': 'btn-sm btn-success',
            'cancelClass': 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        }).prev().on(ace.click_event, function() {
            $(this).next().focus();
        });
        
        $(document).one('ajaxloadstart.page', function(e) {
            $('textarea[class*=autosize]').trigger('autosize.destroy');
            $('.limiterBox,.autosizejs').remove();
            $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
            $('.datepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
        });
        
        

    });

</script>
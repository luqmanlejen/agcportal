<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/webshim/js-webshim/minified/polyfiller.js"></script>-->
<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/remote-list.min.js"></script>-->
<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/ckfinder.js"></script>



<div class="form">
    
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'case-info-form', 
        'enableAjaxValidation' => false, 
        'htmlOptions' => array('class' => 'form-horizontal',))); ?>
    
    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>
    
    <?php if($_GET['case_type'] == 'trial'){ ?>
<!--    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'case_cat', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            1.
            <?php echo $form->dropdownlist($model, 'case_cat', array('criminal' => 'Criminal Cases','civil' => 'Civil Cases'), array('class' => 'col-sm-4','prompt'=>'--Sila Pilih--', 'id'=>'case')); ?>
            <?php echo $form->error($model, 'case_cat'); ?>
        </div>
    </div>
    <div class="space-4"></div>-->
    <?php } ?>
    
    
    <?php if($_GET['case_type'] == 'trial'){ ?>
        
        <h4>Criminal Case</h4><hr>
        <!--upload criminal document english-->
        <div class="form-group" id="section_doc_en">
            <div class="col-sm-2"><?php echo $form->labelEx($model, 'criminal_url', array('class' => 'control-label')); ?> (English Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">
                        <input type="hidden" id="doc_criminal_url" name="CaseInfo[criminal_url]" value="<?php echo $model->criminal_url; ?>">
                        <?php if (isset($model->criminal_url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="criminal_url" class="form-control" value="<?php echo $model->criminal_url ?>">
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="criminal_url" class="form-control" value="">
                        <?php } ?>
                        <?php echo $form->error($model, 'criminal_url'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServerCriminal();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
            </div>
        </div>
        <div class="space-4"></div>

        <!--upload criminal document malay-->
        <div class="form-group" id="section_doc_my">
            <div class="col-sm-2"><label class="control-label">Document</label> (Malay Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">                    
                        <?php echo CHtml::hiddenField('criminal_url_my', $model2->criminal_url, array('class' => 'form-control form-control-medium')); ?>
                        <?php if (isset($model2->criminal_url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_criminal_url_my" class="form-control" value="<?= $model2->criminal_url ?>"/>
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_criminal_url_my" class="form-control" value=""/>
                        <?php } ?>
                        <?php // echo $form->error($model2, 'lom_doc_my'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServerCriminal2();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>
                </div>   
            </div>                
        </div>
        <div class="space-4"></div>
    <?php } else { ?>
        <!--upload document-->
        <div class="form-group" id="section_doc_en">
            <div class="col-sm-2"><?php echo $form->labelEx($model, 'url', array('class' => 'control-label')); ?> (English Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">
                        <input type="hidden" id="doc_url" name="CaseInfo[url]" value="<?php echo $model->url; ?>">
                        <?php if (isset($model->url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="url" class="form-control" value="<?php echo $model->url ?>">
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="url" class="form-control" value="">
                        <?php } ?>
                        <?php echo $form->error($model, 'url'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServer();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
            </div>
        </div>
        <div class="space-4"></div>
    <?php } ?>
    
    
    <?php if($_GET['case_type'] == 'trial'){ ?>
        
        <h4>Civil Case</h4><hr>
        <!--upload trial document english-->
        <div class="form-group" id="section_doc_en">
            <div class="col-sm-2"><?php echo $form->labelEx($model, 'civil_url', array('class' => 'control-label')); ?> (English Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">
                        <input type="hidden" id="doc_civil_url" name="CaseInfo[civil_url]" value="<?php echo $model->civil_url; ?>">
                        <?php if (isset($model->civil_url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="civil_url" class="form-control" value="<?php echo $model->civil_url ?>">
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="civil_url" class="form-control" value="">
                        <?php } ?>
                        <?php echo $form->error($model, 'civil_url'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServerCivil();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
            </div>
        </div>
        <div class="space-4"></div>

        <!--upload trial document malay-->
        <div class="form-group" id="section_doc_my">
            <div class="col-sm-2"><label class="control-label">Document</label> (Malay Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">                    
                        <?php echo CHtml::hiddenField('civil_url_my', $model2->civil_url, array('class' => 'form-control form-control-medium')); ?>
                        <?php if (isset($model2->civil_url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_civil_url_my" class="form-control" value="<?= $model2->civil_url ?>"/>
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_civil_url_my" class="form-control" value=""/>
                        <?php } ?>
                        <?php // echo $form->error($model2, 'lom_doc_my'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServerCivil2();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>
                </div>   
            </div>                
        </div>
        <div class="space-4"></div>
    <?php } else { ?>
        <!--upload document my-->
        <div class="form-group" id="section_doc_my">
            <div class="col-sm-2"><label class="control-label">Document</label> (Malay Version)</div>
            <div class="col-sm-10">
                <div class="form-group" style="margin-bottom: 0">
                    <div class="col-sm-5">                    
                        <?php echo CHtml::hiddenField('url_my', $model2->url, array('class' => 'form-control form-control-medium')); ?>
                        <?php if (isset($model2->url)) { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_url_my" class="form-control" value="<?= $model2->url ?>"/>
                        <?php } else { ?>
                            <input class="col-sm-12" readonly="readonly" type="text" id="doc_url_my" class="form-control" value=""/>
                        <?php } ?>
                        <?php // echo $form->error($model2, 'lom_doc_my'); ?>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Upload Document" onclick="BrowseServer2();" class="btn btn-sm btn-success width-200"/>
                    </div>
                    <div class="col-sm-3"></div>
                </div>   
            </div>                
        </div>
        <div class="space-4"></div>
    <?php } ?>
    
    
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'schedule_for_month', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <!--1.-->
            <?php echo $form->dropdownlist($model, 'case_month', $model->getmonthlist(), array('class' => 'col-sm-2','prompt'=>'--Sila Pilih--')); ?>
            <?php echo $form->error($model, 'case_month'); ?>
            <?php echo $form->dropdownlist($model, 'case_year', $model->getyearlist(), array('class' => 'col-sm-2','prompt'=>'--Sila Pilih--')); ?>
            <?php echo $form->error($model, 'case_year'); ?>
            
            <!--2.-->
            <?php
            //$moduleArray = CHtml::listData(OstRefList::model()->findAllByAttributes(array('cat_id' => 9)), 'id', 'label');
            //$selected_case_year = '';
            ?>
            <?php //echo CHtml::dropDownList('CaseInfo[case_year]', $selected_case_year, $moduleArray, array('class' => 'col-sm-2','prompt'=>'--Sila Pilih--')); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <div class="clearfix form-actions no-margin">
        <a href="index.php?r=caseInfo/admin" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;
        <button class="btn btn-success" type="button" onclick="window.location.reload()"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</button>&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit"><?php echo $model->isNewRecord ? '<i class="ace-icon fa fa-plus bigger-110"></i>&nbsp;Add' : '<i class="ace-icon fa fa-pencil bigger-110"></i>&nbsp;Update'; ?></button>
    </div>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>

    //url
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
        $('#url').val(fileUrl);
        $('#doc_url').val(fileUrl);
    }
    function SetFileField2(fileUrl) {
        $('#url_my').val(fileUrl);
        $('#doc_url_my').val(fileUrl);
    }
    
    //criminal_url
    function BrowseServerCriminal() {
        var finder = new CKFinder();
        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';
        finder.selectActionFunction = SetFileField3;
        finder.popup();
    }
    function BrowseServerCriminal2() {
        var finder = new CKFinder();
        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';
        finder.selectActionFunction = SetFileField4;
        finder.popup();
    }
    function SetFileField3(fileUrl) {
        $('#criminal_url').val(fileUrl);
        $('#doc_criminal_url').val(fileUrl);
    }
    function SetFileField4(fileUrl) {
        $('#criminal_url_my').val(fileUrl);
        $('#doc_criminal_url_my').val(fileUrl);
    }
    
    //civil_url
    function BrowseServerCivil() {
        var finder = new CKFinder();
        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';
        finder.selectActionFunction = SetFileField5;
        finder.popup();
    }
    function BrowseServerCivil2() {
        var finder = new CKFinder();
        finder.basePath = '<?php echo Yii::app()->baseUrl ?>/ckeditor/ckfinder/';
        finder.selectActionFunction = SetFileField6;
        finder.popup();
    }
    function SetFileField5(fileUrl) {
        $('#civil_url').val(fileUrl);
        $('#doc_civil_url').val(fileUrl);
    }
    function SetFileField6(fileUrl) {
        $('#civil_url_my').val(fileUrl);
        $('#doc_civil_url_my').val(fileUrl);
    }
    
    $("#case").change(function() {
        var t = $("#case :selected").select().text();
    
        if(t == 'Criminal Cases'){
            alert(1);
        } else if(t == 'Civil Cases'){
            alert(2);
        } else {
            $('#criminal_en').hide();
            $('#criminal_my').hide();
        }
    });
</script>
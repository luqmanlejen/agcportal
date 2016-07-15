<link src="<?php echo Yii::app()->baseUrl; ?>/css/styles.css"></link>
<!--<script src="scripts/jquery.autocomplete.js"></script>-->
<!--<script src="<?php // echo Yii::app()->baseUrl; ?>/scripts/jquery-1.8.2.min.js"></script>-->
<script src="<?php echo Yii::app()->baseUrl; ?>/scripts/jquery.autocomplete.js" type="text/javascript"></script>
<?php
$dept = '';
$unit = '';
$bahagian = '';
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
    
    
    
    
<!--    <div>
                <div class="col-md-8">
                    <input type="text" name="staff_name" id="autocomplete2" class="form-control" placeholder="Enter Staff name" />
                </div>
                <br><br>
                <div>
                    <div id="selection2" class="required"></div>

                    <br>Nama    : <span id="s1" class="required"></span>
                    <br>Email   : <span id="s3" class="required"></span>
                    <br>NRIC    : <span id="s2" class="required"></span>
                    <br>Tel. No : <span id="s4" class="required"></span>
                    
                    
                </div>
            </div>-->
    
    
    
    
    <!--nama staff-->
    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NAMA', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <input type="text" name="staff_name" id="autocomplete2" class="col-sm-7" placeholder="Enter Staff name" />
            <?php // echo $form->textField($model2, 'STF_NAMA', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model2, 'STF_NAMA'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--email staff-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NOKP_BARU', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <span id="s2" class="required"></span>
            <?php // echo $form->textField($model2, 'STF_NOKP_BARU', array('maxlength' => 255, 'class' => 'col-sm-7', 'id'=>'email')); ?>
            <?php echo $form->error($model2, 'STF_NOKP_BARU'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <!--email staff-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_EMAIL', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <span id="s3" class="required"></span>
            <?php // echo $form->textField($model2, 'STF_EMAIL', array('maxlength' => 255, 'class' => 'col-sm-7', 'id'=>'email')); ?>
            <?php echo $form->error($model2, 'STF_EMAIL'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--no. tel staff-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_NO_TEL_PEJABAT', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <span id="s4" class="required"></span>
            <?php // echo $form->textField($model2, 'STF_NO_TEL_PEJABAT', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model2, 'STF_NO_TEL_PEJABAT'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--division-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model5, 'Division', array('class' => 'control-label')); ?></div>
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
    
    <!--unit-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model4, 'UNIT', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropdownlist($model4, 'UNIT_ID', $model4->getdeptsub($model5->BAHAGIAN_ID), array('class' => 'col-sm-7')); ?>
            <?php echo $form->error($model4, 'UNIT'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
<!--    <div class="form-group">
        <div class="col-sm-2"><?php // echo $form->labelEx($model2, 'STF_LEVEL', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->dropdownlist($model2, 'STF_LEVEL', HrPenempatan::model()->getlevel(), array('prompt' => '-- Please Choose --','class' => 'col-sm-7')); ?>
            <?php // echo $form->error($model2, 'STF_LEVEL'); ?>
            <br><br><p style="color:red;"><b>Note :</b> For selected staff level only.</p>
        </div>
    </div>    
    <div class="space-4"></div>-->
    
<!--    <div class="form-group">
        <div class="col-sm-2"><?php // echo $form->labelEx($model2, 'NO FAKS', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model2, 'STF_NO_FAKS', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php // echo $form->error($model2, 'STF_NO_FAKS'); ?>
        </div>
    </div>
    <div class="space-4"></div>-->
    
    <!--grade-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model2, 'STF_GRED_ID', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model6, 'GRED_ID', $model6->getgredlist(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7'))?>
            <?php // echo $form->textField($model6, 'GRED_ID', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->error($model6, 'GRED_ID'); ?>
        </div>
    </div>
    <div class="space-4"></div>
    
    <!--position-->
    <div class="form-group div_hide">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'Position', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php // echo $form->textField($model3, 'JTN_JWTN_NAMA', array('maxlength' => 255, 'class' => 'col-sm-7')); ?>
            <?php echo $form->dropDownList($model2, 'STF_JWTN_ID', $model3->getpositionlist(), array('prompt' => '-- Please Choose --', 'class' => 'col-sm-7'))?>
            <?php echo $form->error($model3, 'JTN_JWTN_NAMA'); ?>
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

<script type="text/javascript">

            $(document).ready(function () {                
                
                $(".div_hide").hide();
                
                $("#autocomplete2").autocomplete({
                    //lookup: countries,
                    serviceUrl: "auto.php", //tell the script where to send requests
                    type: 'POST',
                    width: 450, //set width
                    
                    //callback just to show it's working
                    onSelect: function (suggestion) {
                        //var option_split = option.split(",");
                        
                        var d1 = suggestion.value;
                        var d2 = suggestion.data;
                        var d3 = suggestion.data2;
                        var d4 = suggestion.data3;
                        
                        $(".div_hide").show();
                        
                        $('#s1').html(d1);
                        $('#s2').html(d2);
                        $('#s3').html(d3);
                        $('#s4').html(d4);
                        //$('#selection2').html('You selected: ' + suggestion.value + ', ' + suggestion.data + ', ' + suggestion.data2);
                        
                    },
                    showNoSuggestionNotice: true,
                    noSuggestionNotice: 'Sorry, no matching results',
                });

           
            });
//            webshims.polyfill('forms');
        </script>
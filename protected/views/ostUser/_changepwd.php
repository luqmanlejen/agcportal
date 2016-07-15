<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/webshim/js-webshim/minified/polyfiller.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/remote-list.min.js"></script>

<style>
    mark, .mark {padding:0 !important;background-color: #F2DEDE !important;color: #A94442;}
</style>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'ost-user-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

    <div class="alert alert-danger"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Field with * are required</div>

    <?php echo $form->hiddenField($model, 'hrstafperibadi_id'); ?>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'name', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php
            echo Yii::app()->session['name'];
            ?>

        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2"><?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?></div>
        <div class="col-sm-10">
            <?php echo Yii::app()->session['email']; ?>
           
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2">Old Password*</div>
        <div class="col-sm-10">
            <?php //echo $form->passwordField($model, 'pwd', array('maxlength' => 255, 'class' => 'col-sm-3'));  ?>
            <input maxlength="255" class="col-sm-3" name="OstUser[pwd]" id="OstUser_pwd" type="password">
            <?php
            if (!$model->isNewRecord) {
                echo '<br><br>Note : Enter the new password only if you want to update the password. Otherwise, leave the password field blank.';
            }
            ?>
            <?php echo $form->error($model, 'pwd'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2">New Password*</div>
        <div class="col-sm-10">
            <?php //echo $form->passwordField($model, 'pwd', array('maxlength' => 255, 'class' => 'col-sm-3'));  ?>
            <input maxlength="255" class="col-sm-3" name="OstUser[pwd]" id="OstUser_pwd" type="password">
            <?php
            if (!$model->isNewRecord) {
                echo '<br><br>Note : Enter the new password only if you want to update the password. Otherwise, leave the password field blank.';
            }
            ?>
            <?php echo $form->error($model, 'pwd'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <div class="col-sm-2">New Password (Verify)*</div>
        <div class="col-sm-10">
            <?php //echo $form->passwordField($model, 'pwd', array('maxlength' => 255, 'class' => 'col-sm-3'));  ?>
            <input maxlength="255" class="col-sm-3" name="OstUser[pwd]" id="OstUser_pwd" type="password">
            <?php
            if (!$model->isNewRecord) {
                echo '<br><br>Note : Enter the new password only if you want to update the password. Otherwise, leave the password field blank.';
            }
            ?>
            <?php echo $form->error($model, 'pwd'); ?>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="clearfix form-actions no-margin">
        
        <button class="btn btn-success" type="button" onclick="window.location.reload()"><i class="ace-icon fa fa-undo bigger-110"></i>&nbsp;Reset</button>&nbsp;&nbsp;
        <button class="btn btn-primary" type="submit"><i class="ace-icon fa  fa-pencil-square-o"></i>&nbsp;Update</button>
    </div>

    <script>
        (function () {
            var stateMatches = {
                'true': true,
                'false': false,
                'auto': 'auto'
            };
            var enhanceState = (location.search.match(/enhancelist\=([true|auto|false]+)/) || ['', 'auto'])[1];
            $(function () {
                $('.polyfill-type select').val(enhanceState).on('change', function () {
                    location.search = 'enhancelist=' + $(this).val();
                });
            });
            webshims.setOptions('forms', {
                customDatalist: stateMatches[enhanceState]
            });
        })();
        webshims.polyfill('forms');

        $(function () {
            $('#OstUser_name').remoteList({
                minLength: 0,
                maxLength: 0,
                source: "../agcportal/crest.php",
                renderItem: function (value, label, data) {
                    return value;
                },
                select: function () {
                    var option = $(this).remoteList('selectedOption').label;
                    var option_split = option.split("<-->");
                    var hrstafperibadi_id = option_split[0];
                    var ic_no = option_split[1];
                    var email = option_split[2];

                    //alert(option);

                    $('#OstUser_hrstafperibadi_id').val(hrstafperibadi_id);
                    $('#OstUser_ic_no').val(ic_no);
                    $('#OstUser_email').val(email);
                }
            });


        });
    </script>


    <script>
        $(function () {
            $('#ost-user-form').submit(function () {
                var atLeastOneIsChecked = $('#divroles :checkbox:checked').length > 0;
                var status = 1;
                if (atLeastOneIsChecked === false) {
                    status = 0;
                    $('#errorMessageRoles').show();
                }

                if (status === 0)
                    return false;
            });
        });
    </script>

    <?php $this->endWidget(); ?>

</div><!-- form -->
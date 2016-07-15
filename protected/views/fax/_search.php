<div class="row">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>

    &nbsp;&nbsp;
    <div class="col-sm-6">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'FAX_DIVISION'); ?></div></div>
        <div class="col-sm-9">
            <?php
                echo $form->dropdownlist($model, 'FAX_DIVISION', LkpBahagian::model()->getdeptlist2(), array('prompt' => '-- Choose Department --', 'class' => 'col-sm-12', 'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('fax/changedept'),
                        'success' => 'function(data){
                                $("#Fax_FAX_SEC_UNIT").html(data);
                            }'
                    ,)));
            ?>
        </div>
    </div>
    
<!--    <div class="col-sm-5">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php // echo $form->label($model, 'FAX_SEC_UNIT'); ?></div></div>
        <div class="col-sm-9">
            <?php // echo $form->dropdownlist($model, 'FAX_SEC_UNIT', LkpUnit::model()->getdeptsub($model->FAX_DIVISION), array('class' => 'col-sm-12')); ?>
        </div>
    </div>-->
    
    <div class="col-sm-12">&nbsp;</div>
    
    <div class="col-sm-6">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-warning width-25" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
            <a href="index.php?r=fax/admin" class="btn btn-sm btn-success width-25"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
            <a href="index.php?r=fax/create" class="btn btn-sm btn-primary width-25"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>
        </div>
    </div>
        
    <?php $this->endWidget(); ?>

</div>
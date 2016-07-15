<div class="row">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>

    &nbsp;&nbsp;
    <div class="col-sm-6">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'PEN_BHGN_ID'); ?></div></div>
        <div class="col-sm-9">
            <?php
                echo $form->dropdownlist($model, 'PEN_BHGN_ID', LkpBahagian::model()->getdeptlist2(), array('class' => 'col-sm-12', 'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('hrPenempatan/changedept2'),
                        'success' => 'function(data){
                                $("#HrPenempatan_PEN_UNIT_ID").html(data);
                            }'
                    ,)));
            ?>
        </div>
    </div>
    
    <div class="col-sm-5">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'PEN_UNIT_ID'); ?></div></div>
        <div class="col-sm-9">
            <?php echo $form->dropdownlist($model, 'PEN_UNIT_ID', LkpUnit::model()->getdeptsub($model->PEN_BHGN_ID), array('class' => 'col-sm-12')); ?>
        </div>
    </div>
    
    <div class="col-sm-12">&nbsp;</div>
    &nbsp;&nbsp;
    <div class="col-sm-6">
        <div class="col-sm-3"><?php echo $form->label($model2, 'STF_NAMA'); ?></div>
        <div class="col-sm-9"><?php echo $form->textField($model, 'PEN_STF_ID', array('size' => 60, 'class' => 'col-sm-12')); ?></div>
    </div>
    
    <?php // echo $form->label($model2, 'STF_NAMA'); ?>
    <?php // echo $form->textField($model2, 'STF_NAMA', array('size' => 60, 'class' => 'form-control')); ?>
    
    <button class="btn btn-sm btn-warning width-10" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
    <a href="index.php?r=hrPenempatan/admin" class="btn btn-sm btn-success width-10"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
    <!--<a href="index.php?r=hrPenempatan/create" class="btn btn-sm btn-primary width-10"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>-->
    <a href="index.php?r=hrPenempatan/list" class="btn btn-sm btn-primary width-10"><i class="ace-icon fa fa-plus"></i>&nbsp;Staff List</a>
    
    <?php $this->endWidget(); ?>

</div>
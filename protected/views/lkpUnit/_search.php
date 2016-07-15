<div class="row">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>

    &nbsp;&nbsp;
    <div class="col-sm-6">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'BAHAGIAN_ID'); ?></div></div>
        <div class="col-sm-9">
            <?php
                echo $form->dropdownlist($model, 'BAHAGIAN_ID', LkpBahagian::model()->getdeptlist2(), array('prompt' => '-- Choose Department --', 'class' => 'col-sm-12', 'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('lkpUnit/changedept'),
                        'success' => 'function(data){
                                $("#LkpUnit_UNIT_ID").html(data);
                            }'
                    ,)));
            ?>
        </div>
    </div>
    
    <div class="col-sm-5">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'UNIT_ID'); ?></div></div>
        <div class="col-sm-9">
            <?php echo $form->dropdownlist($model, 'UNIT_ID', LkpUnit::model()->getdeptsub($model->BAHAGIAN_ID), array('class' => 'col-sm-12')); ?>
        </div>
    </div>
    
    <div class="col-sm-12">&nbsp;</div>
    
    <div class="col-sm-6">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-warning width-25" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
            <a href="index.php?r=lkpUnit/admin" class="btn btn-sm btn-success width-25"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
            <a href="index.php?r=lkpUnit/create" class="btn btn-sm btn-primary width-25"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>
        </div>
    </div>
        
    <?php $this->endWidget(); ?>

</div>
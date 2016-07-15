<div class="row">
    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>

    <div class="col-sm-6">
        <div class="col-sm-3"><div style="padding-top:7px;"><?php echo $form->label($model, 'question'); ?></div></div>
        <div class="col-sm-9"><?php echo $form->textField($model, 'question', array('class' => 'col-sm-11')); ?></div>
    </div>
    <div class="col-sm-6">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-warning width-25" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
            <a href="index.php?r=ostFaq/admin" class="btn btn-sm btn-success width-25"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
            <a href="index.php?r=ostFaq/create" class="btn btn-sm btn-primary width-25"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>
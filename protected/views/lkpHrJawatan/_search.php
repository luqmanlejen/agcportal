<div class="row">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>

    &nbsp;&nbsp;
    <?php echo $form->label($model, 'JTN_JWTN_NAMA'); ?>
    <?php echo $form->textField($model, 'JTN_JWTN_NAMA', array('size' => 60, 'class' => 'form-control')); ?>
    
    <?php // echo $form->label($model2, 'STF_NAMA'); ?>
    <?php // echo $form->textField($model2, 'STF_NAMA', array('size' => 60, 'class' => 'form-control')); ?>
    
    
    <button class="btn btn-sm btn-warning width-10" type="submit"><i class="ace-icon fa fa-search"></i>&nbsp;Search</button>
    <a href="index.php?r=LkpHrJawatan/admin" class="btn btn-sm btn-success width-10"><i class="ace-icon fa fa-undo"></i>&nbsp;Reset</a>
    <a href="index.php?r=LkpHrJawatan/create" class="btn btn-sm btn-primary width-10"><i class="ace-icon fa fa-plus"></i>&nbsp;Add</a>
    

    <?php $this->endWidget(); ?>

</div>
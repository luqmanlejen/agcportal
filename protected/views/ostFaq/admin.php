<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ost-faq-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
            <ul class="breadcrumb">
                <li><i class="ace-icon fa fa-home home-icon"></i> <a href="index.php?r=dashboard/index">Dashboard</a></li>
                <li>Manage F.A.Q</li>
                <li class="active">F.A.Q</li>
            </ul>
        </div>
        <div class="page-content">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>F.A.Q</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="dataTables_wrapper form-inline no-footer" id="dynamic-table_wrapper">
                        <?php $this->renderPartial('_search', array('model' => $model,)); ?>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'ost-faq-grid',
                            'dataProvider' => $model->search(),
                            'itemsCssClass' => 'table table-striped table-bordered table-hover',
                            'pagerCssClass' => 'dataTables_paginate',
                            'pager' => array('class' => 'PagerSA', 'header' => ''),
                            'summaryText' => '',
                            'emptyText' => 'Tiada data dijumpai',
                            'columns' => array(
                                array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->offset+$row+1)', 'htmlOptions' => array('width' => '1', 'align' => 'center')),
                                'question',
//                                'status',                                
                                array('name' => 'status', 'value' => '$data->getDisplayStatus($data->status)', 'htmlOptions' => array('width' => '150')),
                                array('name' => 'updated_dt', 'value' => '$data->updated_dt', 'htmlOptions' => array('width' => '150')),
                                array('name' => 'updated_by', 'value' => '$data->updated_by', 'htmlOptions' => array('width' => '150')),                                
                                array('header' => 'Tindakan', 'class' => 'CButtonColumn',
                                    'deleteConfirmation' => "js:'Anda pasti untuk hapuskan data ini?'",
                                    'template' => '{update}&nbsp;&nbsp;{delete}',
                                    'htmlOptions' => array('width' => '150', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'update' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Kemaskini', 'class' => 'btn btn-xs btn-info'),
                                            'label' => '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("ostFaq/update&id=".$data->id)',
                                            'imageUrl' => false,
                                        ),
                                        'delete' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Hapus', 'class' => 'btn btn-xs btn-danger'),
                                            'label' => '<i class="ace-icon fa fa-trash-o bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("ostFaq/delete&id=".$data->id)',
                                            'imageUrl' => false,
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        activemenu('669', '670');
    });
</script>
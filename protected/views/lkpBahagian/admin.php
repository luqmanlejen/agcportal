<?php Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lkp-bahagian-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<style>
    .btn-action{margin-right:5px;}
</style>

<div class="main-content">
    <div class="main-content-inner">

        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
            <ul class="breadcrumb">
                <li><i class="ace-icon fa fa-home home-icon"></i>&nbsp;<a href="index.php?r=site/index">Dashboard</a></li>
                <li>Manage Directory</li>
                <li class="active">Manage Division</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Manage Division</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="dataTables_wrapper form-inline no-footer" id="dynamic-table_wrapper">
                        <?php $this->renderPartial('_search', array('model' => $model)); ?>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'lkp-bahagian-grid',
                            'dataProvider' => $model->search(),
                            'itemsCssClass' => 'table table-striped table-bordered table-hover',
                            'pagerCssClass' => 'dataTables_paginate',
                            'pager' => array('class' => 'PagerSA', 'header' => ''),
                            'summaryText' => '',
                            'emptyText' => 'No results found',
                            'columns' => array(
                                array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->offset+$row+1)', 'htmlOptions' => array('width' => '1', 'align' => 'center')),
                                'BAHAGIAN',
                                'BAHAGIAN_EN',
                                array('name' => 'hide', 'value' => '$data->displayStatus($data->BAHAGIAN_ID)'),
                                array('header' => 'Action', 'class' => 'CButtonColumn',
                                    'template' => '{update}&nbsp;&nbsp;{delete}',
                                    'htmlOptions' => array('width' => '150', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'update' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Update', 'class' => 'btn btn-xs btn-info btn-action'),
                                            'label' => '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("LkpBahagian/update&id=$data->BAHAGIAN_ID")',
                                            'imageUrl' => false,
                                        ),
                                        'delete' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'class' => 'btn btn-xs btn-danger btn-action',),
                                            'label' => '<i class="ace-icon fa fa-trash-o bigger-120"></i>',
                                            'imageUrl' => false,
                                            'url' => 'Yii::app()->createUrl("LkpBahagian/delete&id=$data->BAHAGIAN_ID")',
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

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.ui.touch-punch.js"></script>

<script>
    $(function() {
        activemenu('509', '587');
    });
</script>
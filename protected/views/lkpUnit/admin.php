<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lkp-unit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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
                <li class="active">Manage Unit</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Manage Unit</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="dataTables_wrapper form-inline no-footer" id="dynamic-table_wrapper">
                        <?php $this->renderPartial('_search', array('model' => $model)); ?>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'lkp-unit-grid',
                            'dataProvider' => $model->search(),
                            'itemsCssClass' => 'table table-striped table-bordered table-hover',
                            'pagerCssClass' => 'dataTables_paginate',
                            'pager' => array('class' => 'PagerSA', 'header' => ''),
                            'summaryText' => '',
                            'emptyText' => 'No results found',
                            'columns' => array(
                                array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->offset+$row+1)', 'htmlOptions' => array('width' => '1', 'align' => 'center')),
                                'UNIT',                               
                                array('name' => 'BAHAGIAN_ID', 'value' => '$data->getbahagian($data->BAHAGIAN_ID)'),
                                array('name' => 'UNIT_UPDATED_DT', 'value' => '$data->UNIT_UPDATED_DT', 'htmlOptions' => array('width' => '100', 'align' => 'center')),
                                array('name' => 'UNIT_UPDATED_BY', 'value' => '$data->reladmin->name'),
                                array('header' => 'Sort', 'class' => 'CButtonColumn',
                                    'template' => '{increase}&nbsp;&nbsp;{decrease}',
                                    'htmlOptions' => array('width' => '100', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'increase' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Up', 'class' => 'btn btn-xs btn-purple btn-action'),
                                            'label' => '<i class="ace-icon fa fa-chevron-up bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("lkpUnit/countUp&id=$data->UNIT_ID")',
                                            'imageUrl' => false,
                                        ),
                                        'decrease' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Down', 'class' => 'btn btn-xs btn-purple btn-action',),
                                            'label' => '<i class="ace-icon fa fa-chevron-down  bigger-120"></i>',
                                            'imageUrl' => false,
                                            'url' => 'Yii::app()->createUrl("lkpUnit/countDown&id=$data->UNIT_ID")',
                                        ),
                                    ),
                                ),
//                                'Language',                                
                                array('header' => 'Action', 'class' => 'CButtonColumn',
                                    'template' => '{update}&nbsp;&nbsp;{delete}',
                                    'htmlOptions' => array('width' => '100', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'update' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Update', 'class' => 'btn btn-xs btn-info btn-action'),
                                            'label' => '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("lkpUnit/update&id=$data->UNIT_ID")',
                                            'imageUrl' => false,
                                        ),
                                        'delete' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'class' => 'btn btn-xs btn-danger btn-action',),
                                            'label' => '<i class="ace-icon fa fa-trash-o bigger-120"></i>',
                                            'imageUrl' => false,
                                            'url' => 'Yii::app()->createUrl("lkpUnit/delete&id=$data->UNIT_ID")',
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
        activemenu('509', '584');
    });
</script>
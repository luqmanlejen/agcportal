

<!--<h1>Manage Hr Penempatans</h1>-->

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div> search-form -->



<?php Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hr-penempatan-grid').yiiGridView('update', {
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
                <li>Portal Administration</li>
                <li class="active">Manage Directory</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Manage Directory</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="dataTables_wrapper form-inline no-footer" id="dynamic-table_wrapper">
                        <?php $this->renderPartial('_search', array('model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4)); ?>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'hr-penempatan-grid',
                            'dataProvider' => $model->search(),
                            'itemsCssClass' => 'table table-striped table-bordered table-hover',
                            'pagerCssClass' => 'dataTables_paginate',
                            'pager' => array('class' => 'PagerSA', 'header' => ''),
                            'summaryText' => '',
                            'emptyText' => 'No results found',
                            'columns' => array(
                                array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->offset+$row+1)', 'htmlOptions' => array('width' => '1', 'align' => 'center')),
                                
                                //array('name' => 'Name', 'value'=>'$data->peribadi_rel->STF_NAMA'),
                                array('name' => 'Name', 'value'=>'$data->getName($data->PEN_ID)'),
                                //array('name' => 'STF_JTN_ID', 'value'=>'$data->peribadi_rel->STF_JWTN_ID'),
                                
                                //array('name' => 'PEN_BHGN_ID', 'value'=>'$data->bahagian_rel->BAHAGIAN'),
                                array('name' => 'PEN_BHGN_ID', 'value'=>'$data->getBahagian($data->PEN_BHGN_ID)'),
                                array('name' => 'PEN_UNIT_ID', 'value'=>'$data->getUnit($data->PEN_UNIT_ID)'),
                                //array('name' => 'PEN_UNIT_ID', 'value' => '$data->unit_rel instanceof LkpUnit?$data->unit_rel->UNIT:"don\'t defined"'),                                
                                array('name' => 'Tel No', 'value'=>'$data->peribadi_rel->STF_NO_TEL_PEJABAT'),
                                array('name' => 'updated_by', 'value'=>'$data->getNama($data->updated_by)'),
                                //array('value' => '$data->jawatan_rel instanceof LkpHrJawatan?$data->jawatan_rel->JTN_JWTN_NAMA:"don\'t defined"'),
                                'PEN_SORT',
                                array('header' => 'Sort', 'class' => 'CButtonColumn',
                                    'template' => '{increase}&nbsp;&nbsp;{decrease}',
                                    'htmlOptions' => array('width' => '100', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'increase' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Up', 'class' => 'btn btn-xs btn-purple btn-action'),
                                            'label' => '<i class="ace-icon fa fa-chevron-up bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("hrPenempatan/countUp2&id=$data->PEN_ID&bhgn=$data->PEN_BHGN_ID&unit=$data->PEN_UNIT_ID")',
                                            'imageUrl' => false,
                                        ),
                                        'decrease' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Down', 'class' => 'btn btn-xs btn-purple btn-action',),
                                            'label' => '<i class="ace-icon fa fa-chevron-down  bigger-120"></i>',
                                            'imageUrl' => false,
                                            'url' => 'Yii::app()->createUrl("hrPenempatan/countDown2&id=$data->PEN_ID&bhgn=$data->PEN_BHGN_ID&unit=$data->PEN_UNIT_ID")',
                                        ),
                                    ),
                                ),
                                
                                array('header' => 'Action', 'class' => 'CButtonColumn',
                                    'template' => '{update}&nbsp;&nbsp;{delete}',
                                    'htmlOptions' => array('width' => '150', 'align' => 'center'),
                                    'buttons' =>
                                    array(
                                        'update' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Update', 'class' => 'btn btn-xs btn-info btn-action'),
                                            'label' => '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                                            'url' => 'Yii::app()->createUrl("HrPenempatan/update&id=$data->PEN_ID&bhgn=$data->PEN_BHGN_ID&unit=$data->PEN_UNIT_ID&stf_id=$data->PEN_STF_ID")',
                                            'imageUrl' => false,
                                        ),
                                        'delete' => array(
                                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'class' => 'btn btn-xs btn-danger btn-action',),
                                            'label' => '<i class="ace-icon fa fa-trash-o bigger-120"></i>',
                                            'imageUrl' => false,
                                            'url' => 'Yii::app()->createUrl("HrPenempatan/delete&id=$data->PEN_ID&bhgn=$data->PEN_BHGN_ID&unit=$data->PEN_UNIT_ID&stf_id=$data->PEN_STF_ID")',
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
        activemenu('509', '582');
    });
</script>
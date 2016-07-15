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
                <li>Manage Directory</li>
                <li class="active">Add Staff</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content no-padding-bottom">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Add Staff</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->renderPartial('list_name_details_form', array('data' => $data, 'model' => $model, 'model2' => $model2, 'model3'=>$model3, 'model4'=>$model4, 'model5'=>$model5, 'model6'=>$model6)); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function() {
        activemenu('509', '582');
    });
</script>
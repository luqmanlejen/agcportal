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
                <li>Manage Division</li>
                <li class="active">Add Division</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content no-padding-bottom">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Add Division</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function() {
        activemenu('509', '587');
    });
</script>
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
                <li class="active">F.A.Q List</li>
            </ul>
        </div>
        <div class="page-content">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->renderPartial('_view'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        activemenu('669', '671');
    });
</script>
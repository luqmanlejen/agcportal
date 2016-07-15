<?php include 'header.php'?>
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
                <li>Case Info</li>
                <li>Manage Case Info</li>
                <li class="active">Update Case Info</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content no-padding-bottom">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Update Case Info</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2)); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
//    $(function() {
//        activemenu('567', '');
//    });


//    function popupdelete(id) {
//        alert(id);
//    }
</script>
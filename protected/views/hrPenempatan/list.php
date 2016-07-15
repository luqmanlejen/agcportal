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
                <li class="active">Manage Staff</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content no-padding-bottom">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Manage Staff</h1></div>
            <div class="row">
                <div class="alert alert-info"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Enter staff name</div>
                <div class="col-xs-12">

                    <form method="post" action="index.php?r=HrPenempatan/listName">
                        
                        <div class="form-group">
                            <div class="col-sm-2">Staff Name</div>
                            <div class="col-sm-10">
                                <div class="col-sm-5">
                                    <input type="text" REQUIRED name="email_id_staff" id="keyword" class="col-sm-12"/><br/>
                                    <input type="hidden" REQUIRED name="code" value="PLSGETDATA"/>
                                </div>
                                <div class="col-sm-5">
                                    <input type="submit" value="Search" class="btn btn-sm btn-primary width-25">
                                    <input type="reset" value="Reset" class="btn btn-sm btn-success width-25">
                                    <a href="index.php?r=hrPenempatan/admin" class="btn btn-sm btn-purple width-25"><i class="ace-icon fa fa-arrow-left"></i>&nbsp;Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        activemenu('509', '582');
    });
</script>
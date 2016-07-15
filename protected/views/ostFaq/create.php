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
                <li>F.A.Q</li>                
                <li class="active">Add F.A.Q</li>
            </ul>
        </div>
        <div class="page-content">            
            <div class="page-header"><h1>Add F.A.Q</h1></div>
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        activemenu('', '26');
    });
</script>
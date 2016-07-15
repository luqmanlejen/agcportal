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
                <li>Manage Staff</li>
                <li class="active">Staff List</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content no-padding-bottom">
            <?php include 'themes/admin/views/layouts/setting.php'; ?>
            <div class="page-header"><h1>Staff List</h1></div>
            <div class="alert alert-info"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Click staff name to view staff details</div>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    //script ini untuk disimpan dalam server yang request
                    $postdata = http_build_query($_POST);
                    
                    //http request
                    $context = stream_context_create(
                            array(
                                'http' => array(
                                    'timeout' => 10,
                                    'method' => 'POST',
                                    'content' => $postdata
                                )
                            )
                    );

                    // URL untuk dapatkan data
                    $url = "https://ilms.agc.gov.my/enotariawamlist/json_testing/json_get_data_run2.php";
                    $raw_data = @file_get_contents($url, false, $context);

                    //decode json to array 
                    $arr_data = json_decode($raw_data, TRUE);
                    extract($arr_data); //convert array to variable
                    $count_list = count($arr_data[0]);

                    $data = array();
                    
                    $output =   '<table id="example" class="table table-bordered table-hovered">
                                    <thead>
                                        <th>No</th>
                                        <th>Staff Name</th>
                                        <th>Staff ID</th>
                                        <th>Staff Email</th>
                                        <th width="90">Action</th>
                                    </thead>
                                    <tbody>
                                ';
                    for ($i = 0; $i < $count_list; $i++) {
                        $data = $arr_data[0][$i];
                        $arr = http_build_query($data);
                        $output .= '
                                    <tr>
                                        <td>'.($i+1).'</td>
                                        <td><a href="index.php?r=HrPenempatan/listNameDetails&' . $arr . '">' . $arr_data[0][$i]["STF_NAMA"] . '</a></td>
                                        <td>' . $arr_data[0][$i]["STF_ID"] . '</td>
                                        <td>' . $arr_data[0][$i]["STF_EMAIL"] . '</td>
                                        <td align="center"><a href="index.php?r=HrPenempatan/listNameDetails&' . $arr . '" class="btn btn-xs btn-info btn-action"><i class="ace-icon fa fa-pencil bigger-120"></i></a></td>
                                    </tr>
                                    ';
                    }
                    $output .= '</tbody></table>';
                    echo $output;
                    ?>
                    
                    <br>
                    <div class="clearfix form-actions no-margin">
                        <a href="index.php?r=hrPenempatan/list" class="btn btn-purple"><i class="ace-icon fa fa-arrow-left bigger-110s"></i>&nbsp;Back</a>&nbsp;&nbsp;        
                    </div>    
                    
                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        activemenu('509', '582');
    });
    
    $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers",
        } );
    } );
</script>
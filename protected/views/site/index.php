<script src="./themes/admin/js/highcharts.js"></script>

<script src="./themes/admin/js/exporting.js"></script>

<!--<div class="main-content">-->
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
            <li class="active"><i class="ace-icon fa fa-home home-icon"></i>&nbsp;<a href="index.php?r=site/index">Dashboard</a></li>
        </ul><!-- /.breadcrumb -->
    </div>
    <div class="page-content">
        <?php include 'themes/admin/views/layouts/setting.php'; ?>
        <div class="page-header"><h1>Dashboard</h1></div>

        <div class="row">
            
            <div class="widget-box transparent">
                <div class="widget-header widget-header-flat">
                    <h4 class="widget-title blue"><i class="ace-icon fa fa-bar-chart"></i>CMS User Login Statistics</h4>
                    <div class="widget-toolbar"><a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a></div>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-4">
                        <?php include 'cms_user_login.php'; ?> 
                    </div> 
                </div> 
            </div>

            <div class="hr hr32 hr-dotted"></div>
            
            <!--start list of pending articles-->
            <div class="col-sm-6">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title purple"><i class="ace-icon fa fa-star"></i>Articles Approval Status</h4>
                        <div class="widget-toolbar"> <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a></div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table class="table table-bordered table-striped">
                                <thead class="thin-border-bottom">
                                    <tr>
                                        <th>Articles Title</th>
                                        <th>Created By</th>
                                        <th width="120">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $articles = OstArticlesStatus::model()->findAll();
                                        
                                        foreach ($articles as $article){
                                            $user = OstUser::model()->findByPk(array('id'=>$article['user_id']));
                                            $title =  OstArticles::model()->findByAttributes(array('id'=>$article['articles_id']));
                                            $status =  OstArticlesStatus::model()->findByAttributes(array('id'=>$article['id']));
                                            $menu = OstMenu::model()->findByPk(array('id'=>$title['menu_id']));
                                            $parent_menu = OstMenu::model()->findByPk(array('id'=>$menu['parent_menu']));
                                            //$article_title = $article['articles_id'];
                                            
                                            if($article['approval_sts'] == 'pending' && $menu['title'] != '' && $title['lang'] == 'en'){
                                                echo    '<tr>
                                                            <td>'. $parent_menu['title'].' &RightArrow; '.$menu['title'].' &RightArrow; <a href="index.php?r=ostArticles/update&id='.$article['articles_id'].'">'.$title['title'] .'</a></td>
                                                            <td>'. $user['name'] .'</td>
                                                            <td align="center">
                                                                <span class="label label-warning">'.$status['approval_sts'].'</span>
                                                            </td>
                                                        </tr>';
                                            }
                                    ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <!--end list of pending articles-->

            <div class="col-sm-6">
                <div class="widget-box transparent" id="recent-box">
                    <div class="widget-header">
                        <h4 class="widget-title green"><i class="ace-icon fa fa-bar-chart"></i>Portal Statistics</h4>
                        <div class="widget-toolbar no-border">
                            <ul class="nav nav-tabs" id="recent-tab">
                                <li class="active"><a data-toggle="tab" href="#task-tab">Visitors</a></li>
                                <li><a data-toggle="tab" href="#member-tab">LOM</a></li>
                                <li><a data-toggle="tab" href="#comment-tab">Publications</a></li>
                                <li><a data-toggle="tab" href="#article-tab">Articles</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="tab-content padding-8">
                                
                                <!--start tab for online visitor-->
                                <div id="task-tab" class="tab-pane active">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><?php echo 'Visitor Today'; ?></td>
                                            <td><?php echo OstVisitor::model()->GetToday(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Visitor Yesterday'; ?></td>
                                            <td><?php echo OstVisitor::model()->GetYesterday(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Visitor This Week'; ?></td>
                                            <td><?php echo OstVisitor::model()->GetThisWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Visitor Last Week' ?></td>
                                            <td><?php echo OstVisitor::model()->GetLastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Visitor This Month' ?></td>
                                            <td><?php echo OstVisitor::model()->GetThisMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Visitor Last Month' ?></td>
                                            <td><?php echo OstVisitor::model()->GetLastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Total Number of Visitor' ?></td>
                                            <td><?php echo OstVisitor::model()->GetAll(); ?></td>
                                        </tr>
                                    </table>  
                                </div>
                                <!--end tab for online visitor-->
                                
                                <!--start tab for top 10 hits lom-->
                                <div id="member-tab" class="tab-pane">
                                    <table class="table table-bordered table-striped">
                                    <?php
                                    $top10lom = OstLom::model()->findAll(array('order' => 'hits DESC', 'limit' => 10));
                                    if (sizeof($top10lom) > 0) {
                                        $counttoparticle = 0;
                                        echo    '<tr>
                                                    <th>No.</th>
                                                    <th>Title</th>
                                                    <th>Hits</th>
                                                </tr>';
                                        foreach ($top10lom as $lomrow) {
                                            $counttoparticle++;
                                            echo '<tr>
                                                    <td class="center">' . $counttoparticle . '</td>
                                                    <td>' . $lomrow->lom_title . '</td>
                                                    <td>' . number_format($lomrow->hits) . '</td>
                                                  </tr>';
                                        }
                                    }
                                    ?>
                                    </table>
                                </div>
                                <!--end tab for top 10 hits lom-->
                                
                                <!--start tab for top 10 publication-->
                                <div id="comment-tab" class="tab-pane">
                                    <table class="table table-bordered table-striped">
                                    <?php
                                    $top10publication = OstPublication::model()->findAll(array('order' => 'hits DESC', 'limit' => 10));
                                    if (sizeof($top10publication) > 0) {
                                        $counttoparticle = 0;
                                        echo    '<tr>
                                                    <th>No.</th>
                                                    <th>Publication Title</th>
                                                    <th>Hits</th>
                                                </tr>';
                                        foreach ($top10publication as $publicationrow) {
                                            $counttoparticle++;
                                            echo '<tr>
                                                    <td class="center">' . $counttoparticle . '</td>
                                                    <td>' . $publicationrow->title . '</td>
                                                    <td>' . $publicationrow->hits . '</td>
                                                  </tr>';
                                        }
                                    }
                                    ?>
                                    </table>
                                </div>
                                <!--end tab for top 10 publication-->
                                
                                <!--start tab for 10 latest updated articles-->
                                <div id="article-tab" class="tab-pane">
                                    <table class="table table-bordered table-striped">
                                    <?php
                                    $top10articles = OstArticles::model()->findAll(array('order' => 'updated_dt DESC', 'limit' => 10));
                                    if (sizeof($top10articles) > 0) {
                                        $counttoparticle = 0;
                                        echo    '<tr>
                                                    <th>No.</th>
                                                    <th>Article Title</th>
                                                    <th>Updated Date</th>
                                                    <th>Updated By</th>
                                                </tr>';
                                        
                                        foreach ($top10articles as $articlerow) {
                                            $menuparent = OstMenu::model()->findByPk($articlerow->menu_id);
                                            $counttoparticle++;
                                            echo '<tr>
                                                    <td class="center">' . $counttoparticle . '</td>
                                                    <td width=300>' . $articlerow->title . '</td>
                                                    <td>' . $articlerow->updated_dt . '</td>
                                                    <td>' . $articlerow->reladmin->name . '</td>
                                                  </tr>';
                                        }
                                    }
                                    ?>
                                    </table>
                                </div>
                                <!--end tab for lastest updated articles-->
                                
                            </div>
                        </div>
                    </div>
                </div> 


                <div class="hr hr32 hr-dotted"></div>
                
                <!--start top 10 list audit trails-->
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title orange"><i class="ace-icon fa fa-list"></i>Audit Trail</h4>
                        <div class="widget-toolbar"><a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a></div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="timeline-container timeline-style2">
                                <div class="timeline-items">
                                <?php
                                    $rows = OstAuditTrail::model()->findAll(array('order' => 'action_datetime DESC', 'limit' => 10));
                                    //var_dump(sizeof($rows));
                                    $count = 0;
                                    foreach ($rows as $row) {
                                        $user_id = $row['user_id'];
                                        $date_time = date("d/m/Y", strtotime($row['action_datetime']));
                                        $action = $row['action_type'];
                                        $menu_id = $row['menu_id'];
                                        $rows2 = OstUser::model()->findByPk($user_id);
                                        $user_name = $rows2['name'];
                                        ?>
                                            <div class="timeline-item clearfix">
                                                <div class="timeline-info">
                                                    <span class="timeline-date"><?php echo $date_time; ?></span>
                                                    <i class="timeline-indicator btn btn-grey no-hover"></i>
                                                </div>
                                                <div class="widget-box transparent">
                                                    <div class="widget-body">
                                                        <div class="widget-main no-padding">
                                                        <?php
                                                            $row3 = OstMenu::model()->findByPk(array('id' => $menu_id));
                                                            $parent_menu = $row3['parent_menu'];
                                                            $parent = OstMenu::model()->findByPk(array('id' => $parent_menu));
                                                            if ($action == 'login' || $action == 'logout') {
                                                                echo $user_name . ": " . $parent['title'] . ": " . $row3['title'];
                                                            } else {
                                                                echo $user_name . ": " . $parent['title'] . ": " . $action . " " . $row3['title'];
                                                            }
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
                <!--end top 10 list audit trails-->
                
            </div>

        </div>

    </div>

</div>
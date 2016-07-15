<div class="row">
    <div class="col-sm-12">
        <h3 class="row header smaller lighter blue">
            <span class="col-xs-6"> F.A.Q List</span><!-- /.col -->
        </h3>

        <!-- #section:elements.accordion -->
        <div id="accordion" class="accordion-style1 panel-group">
            <?php 
            $faqs = OstFaq::model()->findAll(array('condition'=>'status=1', 'order'=>'sort ASC'));
            $output = '';
            $count = 0;
            foreach($faqs as $faq){
                $collapse = 'collapsed';
                $in = '';
                if($count == 0){
                    $in = 'in';
                }
                $output .=  '
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle '.$collapse.'" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$faq->id.'">
                                            <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                            &nbsp;'.$faq->question.'
                                        </a>
                                    </h4>
                                </div>

                                <div class="panel-collapse collapse '.$in.'" id="collapse'.$faq->id.'">
                                    <div class="panel-body">
                                        '.$faq->answer.'
                                    </div>
                                </div>
                            </div>
                            ';
                $count++;
            }
            echo $output;
            ?>
        </div>

        <!-- /section:elements.accordion -->
    </div><!-- /.col -->
</div><!-- /.row -->
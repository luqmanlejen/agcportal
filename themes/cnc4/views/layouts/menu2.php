<div class="nav-search-outer"> 
    <!-- nav start -->

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav text-uppercase main-nav ">
                            <!--<li class="active"><a href="index.php?r=cnc2/index">home</a></li>-->
                            <!--<li> <a href="javascript:void(0)">Criminal Matters</a></li>-->

                            <?php
                            $output = '';

                            $menus = OstMenuCnc::model()->findAll(array("condition" => "lang='en' AND parent_menu=0 ORDER BY sort ASC"));

                            foreach ($menus as $menu) { 
                                
                                if($menu->sort == 1 && $menu->parent_menu == 0){
                                    $output .=  '<li><a href="index.php?r=cnc/index&menu_id='.  PortalElement::encrypt_decrypt('encrypt', $menu->id).'">' . $menu->title . '</a> </li>';
                                } else {
                                    $submenus = OstMenuCnc::model()->findAll(array("condition" => "lang='en' AND parent_menu=" . $menu->id));
                                    $output .= '<li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">' . $menu->title . '<span class="ion-ios7-arrow-down nav-icn"></span></a>
                                                <ul class="dropdown-menu text-capitalize" role="menu">
                                                    <li>';
                                    foreach ($submenus as $submenu) {
                                        $output .= '<li><a href="index.php?r=cnc2/list&menu_id='.PortalElement::encrypt_decrypt('encrypt', $submenu->id).'"><span class="ion-ios7-arrow-right nav-sub-icn"></span>' . $submenu->title . '</a> </li>';
                                    }
                                $output .='</li></ul></li>';
                                }
                            }
                               
                            echo $output;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- nav end --> 
        <!-- search start -->

        <div class="search-container ">
            <div class="container">
                <form action="#" method="" role="search">
                    <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">
                </form>
            </div>
        </div>
        <!-- search end --> 
    </nav>
    <!--nav end--> 
</div>
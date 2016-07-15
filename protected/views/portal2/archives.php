<?php
$oCommon = new PortalElement;
$currenturl = Yii::app()->request->url;

$trans_arkib_year = 'Year';
$trans_arkib_cat = 'Category';
$trans_arkib_key = 'Keyword';

$trans_arkib_search = 'Search';
$trans_arkib_reset = 'Reset';
$trans_arkib_result =  'Result';

if(Yii::app()->session['lang'] == 'my'){
    $trans_arkib_year = 'Tahun';
    $trans_arkib_cat = 'Kategori';
    $trans_arkib_key = 'Kata Kunci';

    $trans_arkib_search = 'Cari';
    $trans_arkib_reset = 'Set Semula';
    $trans_arkib_result =  'Hasil Carian';
}

$displaylist = 0;

$arc_menu = '';
if (isset($_POST['value']) && $_POST['value'] != '') {
    $displaylist = 1;
    $arc_menu = $_POST['value'];
} else if (isset($_GET['value'])) {
    $displaylist = 1;
    $arc_menu = $oCommon->encrypt_decrypt('decrypt', $_GET['value']);
}

$arc_year = '';
if (isset($_POST['arc_year']) && $_POST['arc_year'] != '') {
    $displaylist = 1;
    $arc_year = $_POST['arc_year'];
} else if (isset($_GET['arc_year'])) {
    $displaylist = 1;
    $arc_year = $oCommon->encrypt_decrypt('decrypt', $_GET['arc_year']);
}

$arc_key = '';
if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
    $displaylist = 1;
    $arc_key = $_POST['keyword'];
} else if (isset($_GET['keyword'])) {
    $displaylist = 1;
    $arc_key = $oCommon->encrypt_decrypt('decrypt', $_GET['keyword']);
}

function GetArkibList($displaylist, $arc_key, $arc_year, $currenturl, $arc_menu) {
    
    $oCommon = new PortalElement;
    
    $url = '';
    $output = '';
    $sqlext = '';
    $query1 = '';
    $case = '';
    
    if($displaylist == 1) {
        $sqlext = '';
        //check year
        if ($arc_year != '') {
            $url.= '&arc_year=' . $arc_year;
            $sqlext .= "AND YEAR(updated_dt)='$arc_year'";
        }
        
        //check menu
        if($arc_menu != '') {
            $menu_type = OstArchives::model()->findByPk($arc_menu);
            $menu = OstMenu::model()->findByAttributes(array('title'=>$menu_type->value, 'lang'=>'en', 'menu_type'=>'cms'));
            
            if($menu->title == 'Online Services' || $menu->title == 'Video Gallery' || $menu->title == 'Audio Gallery' || $menu->title == 'Public Slider' || $menu->title == 'Business Slider' || $menu->title == 'Background'){
                if($menu_type->value == 'Online Services'){
                    $media_type = 'online';
                }
                if($menu_type->value == 'Video Gallery'){
                    $media_type = 'video';
                }
                if($menu_type->value == 'Audio Gallery'){
                    $media_type = 'audio';
                }
                if($menu_type->value == 'Public Slider'){
                    $media_type = 'slider';
                }
                if($menu_type->value == 'Business Slider'){
                    $media_type = 'slider2';
                }
                if($menu_type->value == 'Background'){
                    $media_type = 'background';
                }
                $case = 1;
                $sqlext .= " AND media_type = '$media_type'";
            
            }else if($menu->title == 'Photo Gallery'){
                $case = 2;
            }else if($menu->title == 'Speeches' || $menu->title == 'Annual Report' || $menu->title == 'Activities Reports' || $menu->title == 'Press Release'){
                if($menu_type->value == 'Speeches'){
                    $doc_type = 'speeches';
                }else if($menu_type->value == 'Annual Report'){
                    $doc_type = 'annual';
                }else if($menu_type->value == 'Activities Reports'){
                    $doc_type = 'activities';
                }else if($menu_type->value == 'Press Release'){
                    $doc_type = 'press';
                }
                $case = 3;
                $sqlext .= " AND doc_type = '$doc_type'";   
            }else if($menu->title == 'Manage Articles'){
                $case = 4;
            }
        }
                //echo $arc_menu; exit;
        //check keyword
        if ($arc_key != '') {
            
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'en') {
                $sqlext .= " AND title LIKE '%$arc_key%'";
            }
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'my') {
                $sqlext .= " AND title LIKE '%$arc_key%'";
            }
            
        }
        
        
        //$menu_type = OstArchives::model()->findByPk(28);
        //$menu = OstMenu::model()->findByAttributes(array('title'=>$menu_type->value, 'lang'=>'en', 'menu_type'=>'cms'));
        
        //if($menu->title == 'Online Services' || $menu->title == 'Video Gallery' || $menu->title == 'Audio Gallery' || $menu->title == 'Public Slider' || $menu->title == 'Business Slider' || $menu->title == 'Background'){
        if($case == 1){
            $query1 = "SELECT * FROM ost_media WHERE status='arc' AND lang='en' $sqlext ";

        //}else if($menu->title == 'Photo Gallery'){
        }
        if($case == 2){
            
            $query1 = "SELECT * FROM ost_photo_album WHERE status='arc' AND lang='en' $sqlext ";
            
        //}else if($menu->title == 'Speeches' || $menu->title == 'Annual Report' || $menu->title == 'Activities Reports' || $menu->title == 'Press Release'){
        }
        if($case == 3){

            $query1 = "SELECT * FROM ost_publication WHERE status='arc' AND lang='en' $sqlext ";

        //}else if($menu->title == 'Manage Articles'){
        }
        if($case == 4){

            $query1 = "SELECT * FROM ost_articles WHERE approval_sts='archive' AND lang='en' $sqlext ";
            
        }
        //$query1 = "SELECT * FROM ost_photo_album WHERE status='arc' $sqlext ";
        
    }
    
    if($query1 == ''){
        $menu_type = OstArchives::model()->findByPk($oCommon->encrypt_decrypt('decrypt', $_GET['arc_menu']));
        
        if($menu_type->value === 'Photo Gallery'){
            $query1 = "SELECT * FROM ost_photo_album WHERE status='arc'";
            echo $query1;
            $case = 2;
            $result1 = Yii::app()->db->createCommand($query1)->queryAll();
        }
        if($menu_type->value === 'Manage Articles'){
            $query1 = "SELECT * FROM ost_articles WHERE approval_sts='archive'";
            echo $query1;
            $case = 4;
            $result1 = Yii::app()->db->createCommand($query1)->queryAll();
        }
    }
    
    
    $result1 = Yii::app()->db->createCommand($query1)->queryAll();

    $total_pages = sizeof($result1);
    
    $currenturl = explode('&page=', Yii::app()->request->url);

    if ($displaylist == 1) {
        $encrypted_arc_menu = $oCommon->encrypt_decrypt('encrypt', $arc_menu);
        $encrypted_arc_year = $oCommon->encrypt_decrypt('encrypt', $arc_year);
        $encrypted_arc_key = $oCommon->encrypt_decrypt('encrypt', $arc_key);
        
        $targetpage = $currenturl[0] . '&arc_menu=' . $encrypted_arc_menu . '&arc_year=' . $encrypted_arc_year . '&arc_key=' . $encrypted_arc_key;
    }
    else
        $targetpage = $currenturl[0];
    
    $limit = 20;

    $page = 0;
    
    if (isset($_GET['page']))
        $page = $_GET['page'];

    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0
    
    $query2 = $query1 . " LIMIT $start, $limit";
    
    $menu_type = OstArchives::model()->findByPk($arc_menu);
//    print_r($menu_type);exit;
//    $menu = OstMenu::model()->findByAttributes(array('title'=>$menu_type->value, 'lang'=>'en', 'menu_type'=>'cms'));
    
    //if($menu->title == 'Online Services' || $menu->title == 'Video Gallery' || $menu->title == 'Audio Gallery' || $menu->title == 'Public Slider' || $menu->title == 'Business Slider' || $menu->title == 'Background'){
    //echo $case; exit;
    if($case == 1){
        $menu2 = OstMedia::model()->findAllBySql($query2);
        $output .=  '<table><thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Archive Year</th>
                            </thead>';
        if(sizeof($menu2) > 0) {
            $count=1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y',strtotime($datetime));
                $output .=  '<tr>
                                <td>'. $count++ .'</td>
                                <td><a href="'. $row->url . '" target="_blank">'.PortalTranslation::TranslateArchiveTitle($menu->title , $row->id ,$row->title).'</a></td>                
                                <td>'.$date.'</td>
                                </tr>';
            } 
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    //}else if($menu->title == 'Speeches' || $menu->title == 'Annual Report' || $menu->title == 'Activities Reports' || $menu->title == 'Press Release'){
        }else if($case == 3){
        $menu2 = OstPublication::model()->findAllBySql($query2);
        $output .=  '<table><thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Archive Year</th>
                            </thead>';
        if(sizeof($menu2) > 0) {
            $count=1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y',strtotime($datetime));
                $output .=  '<tr>
                                <td>'. $count++ .'</td>
                                <td><a href="'. $row->doc_url . '" target="_blank">'.PortalTranslation::TranslateArchiveTitle($menu->title , $row->id ,$row->title).'</a></td>
                                <td>'.$date.'</td>
                                </tr>';        
            } 
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    //}else if($menu->title == 'Photo Gallery') {
        }else if($case == 2){
        $menu2 = OstPhotoAlbum::model()->findAllBySql($query2);
        $output .=  '<table><thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Archive Year</th>
                            </thead>';
        if(sizeof($menu2) > 0) {
            $count=1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y',strtotime($datetime));                
                $album_id = $oCommon->encrypt_decrypt('encrypt', $row->id);
                $output .=  '<tr>
                                <td>'. $count++ .'</td>
                                <td><a href="index.php?r=portal2/photogalleryview&menu_id=bWh4WXo0MkYrOXpycHNJT3I3R0pBQT09&album_id='.$album_id.'" target="_blank">'.$row->title.'</a></td>
                                <td>'.$date.'</td>
                                </tr>';        
            } 
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    //}else if($menu->title == 'Manage Articles') {
        }else if($case == 4){
        $menu2 = OstArticles::model()->findAllBySql($query2);
        $output .=  '<table><thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Archive Year</th>
                            </thead>';
        if(sizeof($menu2) > 0) {
            $count=1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y',strtotime($datetime));
                
                $menu_id = $oCommon->encrypt_decrypt('encrypt', $row->menu_id);
                $artikel_id = $oCommon->encrypt_decrypt('encrypt', $row->id);
                //echo $menu->title;
                //print_r($row);
                //exit;
                $output .=  '<tr>
                                <td>'. $count++ .'</td>
                                <td><a href="index.php?r=portal2/article&menu_id='.$menu_id.'&artikel_id='.$artikel_id.'" target="_blank">'.PortalTranslation::TranslateArchiveTitle($menu->title , $row->id ,$row->title).'</a></td>
                                <td>'.$date.'</td>
                                </tr>';        
            } 
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    }
    $output .= '</table>';
    $output .= $oCommon->pagination($limit, $total_pages, $page, $targetpage);
    return $output;
}
?>


<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 
    
    <form class="rnd5" action="<?= $currenturl; ?>" method="post">

        <div class="form-input clear push20">

            <div class="one_half first push20">

                <div class="one_sixth first line40"><?php echo $trans_arkib_year; ?></div>

                <div class="five_sixth">
                    
                    <?php
                    if(isset($_POST['arc_year'])){
                        //echo CHtml::dropDownList('arc_year', $arc_year, OstRefList::model()->listRef3($_POST['arc_year']), array('class' => 'pad10 rnd5')); 
                        echo CHtml::dropDownList('arc_year', $arc_year, OstRefList::model()->listRef3(9), array('class' => 'pad10 rnd5')); 
                    } else {
                        echo CHtml::dropDownList('arc_year', $arc_year, OstRefList::model()->listRef3(9), array('class' => 'pad10 rnd5')); 
                    }
                    ?>
                    
                </div>

            </div>

            <div class="push20 clear" id="rowcat">

                <div class="line40" style="float:left;width:8.5%;"><?php echo $trans_arkib_cat; ?></div>

                <div style="float:left;width:91.5%;">

                    <?php // echo CHtml::dropDownList('cat_id', $menu_id, OstMenu::model()->getParentArcList2(), array('class' => 'pad10 rnd5', 'prompt' => '--Please Choose--')) ?>
                    <?php 
                        $type_list = CHtml::listData(OstArchives::model()->findAll(), 'id', 'value');
                        if(isset($_POST['value'])){
                            //echo CHtml::dropDownList('value', $arc_menu, OstRefList::model()->listRef3($_POST['value']), array('class' => 'pad10 rnd5'));
                            echo CHtml::dropDownList('value', $arc_menu, $type_list, array('class' => 'pad10 rnd5'));
                        } else {
                            echo CHtml::dropDownList('value', $arc_menu, $type_list, array('class' => 'pad10 rnd5'));
                        }
                    ?>

                </div>

            </div>

            <div class="clear"></div>
            
            <div class="push20 clear" id="rowcat">

                <div class="line40" style="float:left;width:8.5%;"><?php echo $trans_arkib_key; ?></div>

                <div style="float:left;width:91.5%;">
                    
                    <input name="keyword" type='text' class='pad10 rnd5' value="<?php echo $arc_key; ?>">

                </div>

            </div>

            <div class="clear"></div>
            
            <input type="submit" id="submit" name="submit" value="<?php echo $trans_arkib_search; ?>" class="button small black" />

            <input value="<?php echo $trans_arkib_reset; ?>" class="button small black" type="reset" onclick="window.location = 'index.php?r=portal2/archives&menu_id=SUR6NkVnUm5qYlczeDRTRHRnY3daQT09'">

        </div>

    </form>
    
    <?php
    if ($displaylist == 1) {
        echo '<h1 class="push10">' . $trans_arkib_result . '</h1>' . GetArkibList($displaylist, $arc_key, $arc_year, $currenturl, $arc_menu);
    }
    ?>

</div>
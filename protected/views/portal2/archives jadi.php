<?php
$sort = '';

if (isset($_GET['sortA'])) {
    if ($_GET['sortA'] == 'ASC') {
        $sortA = $_GET['sortA'];
    } else {
        $sortA = 'DESC';
    }
} else {
    if (isset($_GET['sort']) && $_GET['sort'] == 'DESC') {
        $sort = $_GET['sort'];
    } else {
        $sort = 'ASC';
    }
}

$element = new PortalElement;

$trans_arkib_year = 'Year';
$trans_arkib_cat = 'Category';
$trans_arkib_key = 'Keyword';

$title = 'Title';

$act = 'Act / Citation No.';

$rev = 'Revised Year';

$hits = 'Hits';

$category = 'Category';

$keyword = 'Keyword';

$search_btn = 'Search';

$reset_btn = 'Reset';

$parent_cat = '';

if (Yii::app()->session['lang'] == 'my') {

    $title = 'Tajuk';

    $act = 'Akta / No. Rujukan';

    $rev = 'Tahun Disemak';

    $hits = 'Hit';

    $category = 'Kategori';

    $keyword = 'Kata Kunci';

    $search_btn = 'Cari';

    $reset_btn = 'Set Semula';
}

$parent_cat = 0;
$postkeyword = '';
$postvalue = '';
$search = 0;
$arc_year = '';

if (isset($_POST['value']) && $_POST['value'] != '') {
    $postvalue = $_POST['value'];
    $search = 1;
} else if (isset($_GET['value'])) {
    $postvalue = $element->encrypt_decrypt('decrypt', $_GET['value']);
    $search = 1;
}

if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
    $postkeyword = $_POST['keyword'];
    $search = 1;
} else if (isset($_GET['keyword'])) {
    $postkeyword = $element->encrypt_decrypt('decrypt', $_GET['keyword']);
    $search = 1;
}

if (isset($_POST['arc_year']) && $_POST['arc_year'] != '') {
    $arc_year = $_POST['arc_year'];
    $search = 1;
} else if (isset($_GET['arc_year'])) {
    $arc_year = $element->encrypt_decrypt('decrypt', $_GET['arc_year']);
    $search = 1;
}

function getlistlom($search, $arc_year, $postvalue, $postkeyword) {

    if (isset($_GET['sort'])) {
        if ($_GET['sort'] == 'ASC') {

            $sort = $_GET['sort'];
        } else {
            $sort = 'DESC';
        }
    } else {
        //if($_GET['sort'] == 'DESC') {
        if (isset($_GET['sortA']) && $_GET['sortA'] == 'DESC') {
            $sortA = $_GET['sortA'];
        } else {
            $sortA = 'ASC';
        }
    }

    $element = new PortalElement;
    $output = '';
    $sqlext_imp = '';
    $query1 = '';
    $sqlext = '';
    $case = '';

    if ($search == 1) {
        $sqlext = '';

        //print_r($postkeyword);
        if ($postkeyword != '') {
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'en') {
                $sqlext .= ' AND lom_title LIKE "%' . $postkeyword . '%"';
            }
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'my') {
                $sqlext .= ' AND lom_title LIKE "%' . $postkeyword . '%"';
            }
        }

        $query1 = '';
        if ($postvalue == 'media_img') {
            $case = 1;
            $query1 = "SELECT * FROM ost_photo_album WHERE status='arc' $sqlext ";
        }
        if ($postvalue == 'por_artcl') {
            $case = 2;
            $query1 = "SELECT * FROM ost_articles WHERE approval_sts='archive' $sqlext ";
        }
        if ($postvalue == 'media_aud' || $postvalue == 'media_bg' || $postvalue == 'media_bsns' || $postvalue == 'media_serv' || $postvalue == 'media_psli' || $postvalue == 'media_vid') {
            if ($postvalue == 'media_aud')
                $media_type = 'audio';
            if ($postvalue == 'media_bg')
                $media_type = 'background';
            if ($postvalue == 'media_bsns')
                $media_type = 'slider2';
            if ($postvalue == 'media_serv')
                $media_type = 'online';
            if ($postvalue == 'media_psli')
                $media_type = 'slider';
            if ($postvalue == 'media_vid')
                $media_type = 'video';
            $case = 3;
            $query1 = "SELECT * FROM ost_media WHERE status='arc' AND media_type='$media_type' $sqlext ";
        }
        if ($postvalue == 'pub_speech' || $postvalue == 'pub_annual' || $postvalue == 'pub_actvt' || $postvalue == 'pub_press' || $postvalue == 'pub_artcl') {
            if ($postvalue == 'pub_speech')
                $doc_type = 'speeches';
            if ($postvalue == 'pub_annual')
                $doc_type = 'annual';
            if ($postvalue == 'pub_actvt')
                $doc_type = 'activities';
            if ($postvalue == 'pub_press')
                $doc_type = 'press';
            $case = 4;
            $query1 = "SELECT * FROM ost_publication WHERE status='arc' AND doc_type='$doc_type' $sqlext ";
        }

        //$query1 = 'SELECT title FROM ost_photo_album UNION SELECT title FROM ost_articles';//"SELECT * FROM ost_photo_album WHERE status='arc' $sqlext ";


        if (isset($_GET['arc_menu'])) {
            echo $_GET['arc_menu'];
        }
//        if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'my') {
//            $query1 = "SELECT * FROM ost_lom WHERE lom_lang='my' " . $sqlext . "  GROUP BY lom_no ORDER BY LENGTH(lom_no),lom_no ASC";
//        }

        $result1 = Yii::app()->db->createCommand($query1)->queryAll();
        $total_pages = sizeof($result1);
        $currenturl = explode('&page=', Yii::app()->request->url);
        if ($search == 1) {
            $encrypted_value = $element->encrypt_decrypt('encrypt', $postvalue);
            $targetpage = $currenturl[0] . '&value=' . $encrypted_value;
        } else
            $targetpage = $currenturl[0];
        $limit = 1;
        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page) {
            $start = ($page - 1) * $limit;
        } else {
            $start = 0;
        }
        
        
    }

    //pagination
    
    $query2 = $query1 . " LIMIT $start, $limit";
    

    //pagination with data
    $output .= '<table><thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Archive Year</th>
                            </thead>';

    if ($postvalue == 'media_img') {
        $menu2 = OstPhotoAlbum::model()->findAllBySql($query2);
        if (sizeof($menu2) > 0) {
            $count = 1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y', strtotime($datetime));
                $album_id = $element->encrypt_decrypt('encrypt', $row->id);
                $output .= '<tr>
                                    <td>' . $count++ . '</td>
                                    <td>' . $row->title . '</td>
                                    <td>' . $date . '</td>
                                    </tr>';
            }
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    }
    if ($postvalue == 'por_artcl') {
        $menu2 = OstArticles::model()->findAllBySql($query2);
        if (sizeof($menu2) > 0) {
            $count = 1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y', strtotime($datetime));

                $menu_id = $element->encrypt_decrypt('encrypt', $row->menu_id);
                $artikel_id = $element->encrypt_decrypt('encrypt', $row->id);

                $output .= '<tr>
                                <td>' . $count++ . '</td>
                                <td>' . $row->title . '</td>
                                <td>' . $date . '</td>
                                </tr>';
            }
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    }
    if ($postvalue == 'media_aud' || $postvalue == 'media_bg' || $postvalue == 'media_bsns' || $postvalue == 'media_serv' || $postvalue == 'media_psli' || $postvalue == 'media_vid') {
        $menu2 = OstMedia::model()->findAllBySql($query2);
        if (sizeof($menu2) > 0) {
            $count = 1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y', strtotime($datetime));
                $output .= '<tr>
                                <td>' . $count++ . '</td>
                                <td>' . $row->title . '</td>
                                <td>' . $date . '</td>
                                </tr>';
            }
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    }
    if ($postvalue == 'pub_speech' || $postvalue == 'pub_annual' || $postvalue == 'pub_actvt' || $postvalue == 'pub_press' || $postvalue == 'pub_artcl') {
        $menu2 = OstPublication::model()->findAllBySql($query2);
        if (sizeof($menu2) > 0) {
            $count = 1;
            foreach ($menu2 as $row) {
                $datetime = $row->updated_dt;
                $date = date('Y', strtotime($datetime));
                $output .= '<tr>
                                <td>' . $count++ . '</td>
                                <td>' . $row->title . '</td>
                                <td>' . $date . '</td>
                                </tr>';
            }
        } else {
            $output .= '<tr><td colspan=3 align=center>No results found</td></tr>';
        }
    }

    $output .= '<tr><td colspan=4>' . $element->pagination($limit, $total_pages, $page, $targetpage) . '</td></tr>';

    $output .= '</table>';
    return $output;
}
?>

<style>

    .linklom{color:inherit;}

    .linklom:hover{color: #F90 !important; }

    .button{font-weight: normal;text-transform: none;cursor:pointer;}

    #tablelom a {text-decoration: none;}

    #tablelom a:hover {text-decoration: underline;}

    #tablelom .even{background:#e6e6e6;}

</style>

<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<?php $url = 'index.php?r=portal2/archives&menu_id=' . $_GET['menu_id']; ?>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div>     

    <form class="rnd5" method="post" action="<?= $url ?>" id="lomlist">

        <div class="form-input clear push20">
            
            <div class="one_half first push20">
                
                <div class="one_sixth first line40"><?php echo $trans_arkib_year; ?></div>

                <div class="five_sixth">
                    <?php echo CHtml::dropDownList('arc_year', $arc_year, OstRefList::model()->listRef3(9), array('prompt' => '-- Please Choose --', 'class' => 'pad10 rnd5')); ?>
                </div>
            
            </div>
            
            <div class="push20 clear" id="rowcat">

                <div class="line40" style="float:left;width:8.5%;"><?php echo $trans_arkib_cat; ?></div>

                <div style="float:left;width:91.5%;">
                    <?php echo CHtml::dropDownList('value', $postvalue, OstRefList::model()->listRef3(10), array('prompt' => '-- Please Choose --', 'class' => 'pad10 rnd5')); ?>
                </div>
                
            </div>
            
            <div class="clear"></div>
            
            <div class="push20 clear" id="rowcat">

                <div class="line40" style="float:left;width:8.5%;"><?php echo $trans_arkib_key; ?></div>

                <div style="float:left;width:91.5%;">

                    <input name="keyword" type='text' class='pad10 rnd5' style='width:330px;' value="<?php echo $postkeyword; ?>">
                
                </div>
                    
            </div>
            
            <div class="clear"></div>

            <div class='one_quarter first'>&nbsp;</div>

            <div class='three_quarter push10'>

                <input value="<?php echo $search_btn; ?>" class="button small grey" type="submit" onclick="displayall(1)">&nbsp;

                <input value="<?php echo $reset_btn; ?>" class="button small orange" type="reset" onclick="javascript:location.href = 'index.php?r=portal2/archives&menu_id=SUR6NkVnUm5qYlczeDRTRHRnY3daQT09'">

            </div>

    </form>

    <div class='clear'></div>

    <table border='0' id="tablelom">

    <!--        <thead>

                <tr>

                    <th width='130'>
        <?php
        if (isset($_GET['sortA'])) {
            if ($_GET['sortA'] == 'ASC') {
                echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=DESC">' . $act . '</a>';
            } else {
                echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=ASC">' . $act . '</a>';
            }
        } else {
            echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=DESC">' . $act . '</a>';
        }

        echo '</th><th>';

        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'DESC') {
                echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=ASC">' . $title . '</a>';
            } else {
                echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=DESC">' . $title . '</a>';
            }
        } else {
            echo '<a href="index.php?r=portal2/lom&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=ASC">' . $title . '</a>';
        }
        ?>
                    </th>

                </tr>

            </thead>-->

        <tbody>

<?php echo getlistlom($search, $arc_year, $postvalue, $postkeyword); ?>

        </tbody>

    </table>

</div>

<div class="clear"></div>
<?php    
$sort='';
$lom_no_count = 0;
Yii::app()->session->destroy();
Yii::app()->session['lang'] = 'en';
//echo Yii::app()->session['lang'];

if(isset($_GET['sortA'])) {
    if($_GET['sortA'] == 'ASC') {
        $sortA = $_GET['sortA'];
    } else {
        $sortA = 'DESC';
    }
} else {
    if(isset($_GET['sort']) && $_GET['sort'] == 'DESC') {
        $sort = $_GET['sort'];
    } else {
        $sort = 'ASC';
    }
}

$element = new PortalElement;

$title = 'Title';

$act = 'Act / Citation No.';

$rev = 'Revised Year';

$hits = 'Hits';

$category = 'Category';

$keyword = 'Keyword';

$rev_only = 'Show Revised Only';

$y = 'Yes';

$n = 'No';

$search_btn = 'Search';

$reset_btn = 'Reset';

$parent_cat = '';

$term = '
            <p align="center">The Laws of Malaysia series (LOM) is a compilation and reprint of laws published in volume form pursiant to section 14<span style="font-size: 6pt;" class="style1">A</span> of the Revision of Laws Act 1968 [<em>Act 1</em>]. It is the only official and authentic publication of the laws of Malaysia. The LOM series incorporates all principal laws of Malaysia enacted after 1969 and pre-1969 laws which have been revised by the Commissioner of Law Revision.</p>
            <p align="center">* The online versions of the updated reprints of the Laws of Malaysia are as marked with an asterisk. These online versions are not the reprinted version made pursuant to Section 14 of the Revision of Laws Act 1968 [<em>Act 1</em>]</p>
            <p align="center">Both printed and online versions reprint of the Laws of Malaysia Series were updated up to the date mentioned on the front page of each Laws.</p>
        ';

if (Yii::app()->session['lang'] == 'my') {

    $title = 'Tajuk';

    $act = 'Akta / No. Rujukan';

    $rev = 'Tahun Disemak';

    $hits = 'Hit';

    $category = 'Kategori';

    $keyword = 'Kata Kunci';

    $rev_only = 'Papar Yang Telah Disemak';

    $y = 'Ya';

    $n = 'Tidak';

    $search_btn = 'Cari';

    $reset_btn = 'Set Semula';

    $term = '
                <p align="center">Siri Undang-Undang Malaysia (LOM) ialah kompilasi dan cetakan semula undang-undang secara berjilid mengikut seksyen 14<span style="font-size: 6pt;" class="style1">A</span> Akta Penyemakan Undang-Undang 1968 [<em>Akta 1</em>]. Ia merupakan satu-satunya penerbitan rasmi dan sah undang-undang Malaysia. Siri LOM menggabungkan semua undang-undang utama Malaysia yang diperbuat selepas 1969 dan juga undang-undang pra-1969 yang telah disemak oleh Pesuruhjaya Penyemak Undang-Undang.</p>
                <p align="center">* Versi atas talian cetakan semula Undang-Undang Malaysia yang kemas kini adalah seperti yang bertanda asterisk. Versi atas talian ini bukan versi cetakan semula yang disediakan di bawah Seksyen 14 Akta Penyemakan Undang-Undang 1968 [<em>Akta 1</em>].</p>
                <p align="center">Kedua-dua versi cetakan semula naskhah bercetak dan atas talian Siri Undang-Undang Malaysia telah dikemas kini hingga ke tarikh yang dinyatakan di muka surat hadapan setiap Undang-Undang</p>
            ';
}
$parent_cat = 0;
$postkeyword = '';
$postrev = '';
$postcat = '';
$postcat_sub = '';
$search = 0;

if (isset($_POST['parent_cat']) && $_POST['parent_cat'] != '') {
    $postcat = $_POST['parent_cat'];
    $search = 1;
} else if (isset($_GET['parent_cat'])) {
    $postcat = $element->encrypt_decrypt('decrypt', $_GET['parent_cat']);
    $search = 1;
}

if (isset($_POST['parent_cat2']) && $_POST['parent_cat2'] != '') {
    $postcat_sub = $_POST['parent_cat2'];
    $search = 1;
} else if (isset($_GET['parent_cat2'])) {
    $postcat_sub = $element->encrypt_decrypt('decrypt', $_GET['parent_cat2']);
    $search = 1;
}

if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
    $postkeyword = $_POST['keyword'];
    $search = 1;
} else if (isset($_GET['keyword'])) {
    $postkeyword = $element->encrypt_decrypt('decrypt', $_GET['keyword']);
    $search = 1;
}

if (isset($_POST['lom_rev']) && $_POST['lom_rev'] != '') {
    $postrev = $_POST['lom_rev'];
    $search = 1;
} else if (isset($_GET['lom_rev'])) {
    $postrev = $element->encrypt_decrypt('decrypt', $_GET['lom_rev']);
    $search = 1;
}

function getlistlom($search, $postcat, $postcat_sub, $postkeyword, $postrev) {
    
    if(isset($_GET['sort'])) {
        if($_GET['sort'] == 'ASC') {
            
            $sort = $_GET['sort'];
        } else {
            $sort = 'DESC';
        }
    } else {
        //if($_GET['sort'] == 'DESC') {
        if(isset($_GET['sortA']) && $_GET['sortA'] == 'DESC') {
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

        if ($postrev != 0)
            $sqlext .= " AND lom_rev =" . $postrev;

        if ($postcat != 0)
            $sqlext .= " AND lom_cat = " . $postcat;

        if ($postcat_sub != 0)
            $sqlext .= " AND lom_no = " . $postcat_sub;
            
//        $query1 = "SELECT * FROM ost_lom WHERE lom_lang='en' " . $sqlext . "  GROUP BY lom_no ORDER BY LENGTH(lom_no),lom_no ASC, lom_title DESC";
        $query1 = "SELECT * FROM ost_lom WHERE lom_lang='en' " . $sqlext . "  GROUP BY lom_no ORDER BY lom_title DESC";
        
        if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'my') {
            $query1 = "SELECT * FROM ost_lom WHERE lom_lang='my' " . $sqlext . "  GROUP BY lom_no ORDER BY LENGTH(lom_no),lom_no ASC";
        }
    }
    else {
        //$query1 = "SELECT * FROM ost_lom WHERE lom_lang='en' GROUP BY lom_no ORDER BY lom_no + 0 ASC";
        
        
        if(isset($sort) && $sort != ''){              //echo $sort; exit;
            $query1 = "SELECT * FROM ost_lom WHERE lom_lang='en' GROUP BY lom_no ORDER BY lom_title $sort";
        }
        
        if(isset($sortA) && $sortA != ''){            //echo $sortA; exit;
            $query1 = "SELECT * FROM ost_lom WHERE lom_lang='en' GROUP BY lom_no ORDER BY lom_no + 0 $sortA";
        }
        
    }   

    $result1 = Yii::app()->db->createCommand($query1)->queryAll();

    $total_pages = sizeof($result1);

    $currenturl = explode('&page=', Yii::app()->request->url);

    if ($search == 1) {
        $encrypted_postcat = $element->encrypt_decrypt('encrypt', $postcat);
        $encrypted_postcat_sub = $element->encrypt_decrypt('encrypt', $postcat_sub);
        $encrypted_postkeyword = $element->encrypt_decrypt('encrypt', $postkeyword);
        $encrypted_postrev = $element->encrypt_decrypt('encrypt', $postrev);
        $targetpage = $currenturl[0] . '&lom_cat=' . $encrypted_postcat . '&lom_no=' . $encrypted_postcat_sub . '&keyword=' . $encrypted_postkeyword . '&lom_rev=' . $encrypted_postrev;
    }
    else
        $targetpage = $currenturl[0];

    $limit = 50;
    $page = 0;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if ($page) {
        $start = ($page - 1) * $limit;
    } else {
        $start = 0;
    }

    $query2 = $query1 . " LIMIT $start, $limit";

    $model = OstLom::model()->findAllBySql($query2);

    
    if(sizeof($model) > 0){
        $count = 0;
        
        foreach ($model as $row) {
            
            $count++;
            $class = 'odd';

            if ($count % 2 == 0)
                $class = 'even';
            
            $model2 = OstLom::model()->findAll(array('condition' => "online = 1"));
            $model3 = OstLom::model()->findAll(array('condition' => "reprint = 1"));
            $model6 = OstLom::model()->findAll(array('condition' => "lom_rev = 1"));
            
            if ($row->lom_cat == 1) {
                //empty
            }
            
            else {                
                
                //show first row of lom
                $lom_no_count = 0;
                if(Yii::app()->session['lang'] == 'en'){
                        
                        if($row->lom_lang == 'en' && $row->online != 1 && $row->reprint != 1 && $row->lom_rev != 1){
                            $output .= '<tr class="' . $class . '">
                                        <td>' . $row->lom_no . '</td>
                                        <td>';
                            if($row->lom_doc != ''){
                                $output .= '<a href="index.php?r=portal2/lom2&id='. $row->id .'" class="linklom" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($row->id, $row->lom_title) . '</a>';
                            } else {
                                $output .= '' . PortalTranslation::TranslateLomTitle($row->id, $row->lom_title) . '';
                            }
                            $output .= '</td></tr>';
                            $lom_no_count = 1;
                        }

                } else {
                    $model4 = OstLom::model()->findAll(array('condition' => 'lom_parent_lang='.$row->id));
                    foreach($model4 as $row4){
                        if ($row->online != 1 && $row->reprint != 1 && $row->lom_rev != 1) {
                            $output .= '<tr class="' . $class . '">
                                <td>' . $row->lom_no . '</td>
                                <td>';
                            if($row4->lom_doc != ''){
                                $output .= '<a href="index.php?r=portal2/lom2&id='. $row4->id .'" class="linklom" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($row->id, $row->lom_title) . '</a>';
                            } else {
                                $output .= '' . PortalTranslation::TranslateLomTitle($row->id, $row->lom_title) . '';
                            }
                            $output .= '</td></tr>';
                        }
                    }
                }
                
                //show revised version
                if (sizeof($model6) > 0) {
                    foreach ($model6 as $row6) {
                        
                        if ($row6->lom_no == $row->lom_no && $row6->lom_rev == 1) {
                            
                                if (Yii::app()->session['lang'] == 'en') {
                                    $output .= '<tr class="' . $class . '">';
                                    if($lom_no_count == 1){
                                       $output .= '<td>' . '' . '</td><td>';                                    
                                    } else {
                                        $output .= '<td>' . $row6->lom_no . '</td><td>';
                                        $lom_no_count = 1;
                                    }
                                    if($row6->lom_doc != ''){
                                        $output .= '<a href="index.php?r=portal2/lom2&id='. $row6->id.'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($row6->id, $row6->lom_title) . '</a>';
                                    } else {
                                        $output .= '' . PortalTranslation::TranslateLomTitle($row6->id, $row6->lom_title) . '';
                                    }
                                    $output .= '</td></tr>';
                                }
                            
                                
                                if (Yii::app()->session['lang'] == 'my') {
                                    $lom_rev_my = OstLom::model()->findByAttributes(array('lom_parent_lang' => $row6->id));
                                    $output .= '<tr class="' . $class . '">';
                                    if($lom_no_count == 1){
                                        $output .= '<td>' . '' . '</td><td>';
                                    } else {
                                        $output .= '<td>' . $lom_rev_my->lom_no . '</td><td>';
                                    }
                                    if($lom_rev_my->lom_doc != ''){
                                        $output .= '<a href="index.php?r=portal2/lom2&id='. $lom_rev_my->id.'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($lom_rev_my->id, $lom_rev_my->lom_title) . '</a>';
                                    } else {
                                        $output .= '' . PortalTranslation::TranslateLomTitle($lom_rev_my->id, $lom_rev_my->lom_title) . '';
                                    }
                                    $output .= '</td></tr>';
                                }
                        }
                    }
                }
                
                //show reprint version
                if (sizeof($model3) > 0) {
                    foreach ($model3 as $row3) {
                        
                        if ($row3->lom_no == $row->lom_no && $row3->reprint == 1) {
                            
                            if (Yii::app()->session['lang'] == 'en') {
                                if($row3->lom_doc != ''){
                                    $output .= '<tr class="' . $class . '">
                                            <td>' . '' . '</td>
                                            <td><a href="index.php?r=portal2/lom2&id='. $row3->id.'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($row3->id, $row3->lom_title) . '</a></td>                                    
                                        </tr>';
                                }
                            }
                            
                            $reprint_my = OstLom::model()->findByAttributes(array('lom_parent_lang' => $row3->id));
                            if (Yii::app()->session['lang'] == 'my') {
                                if($reprint_my->lom_doc != ''){
                                    $output .= '<tr class="' . $class . '">
                                            <td>' . '' . '</td>
                                            <td><a href="index.php?r=portal2/lom2&id='. PortalTranslation::TranslateLomPdf($reprint_my->id) .'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($reprint_my->id, $reprint_my->lom_title) . '</a></td>                                    
                                        </tr>';
                                }
                            }
                           
                        }
                    }
                }
                
                //show online version               
                if (sizeof($model2) > 0) {
                    foreach ($model2 as $row2) {
                        
                        if ($row2->lom_no == $row->lom_no && $row2->online == 1) {
                            
                            if (Yii::app()->session['lang'] == 'en') {
                                if($row2->lom_doc != ''){
                                    $output .= '<tr class="' . $class . '">
                                                <td>' . '' . '</td><td>';
                                
                                    $output .= '<a href="index.php?r=portal2/lom2&id='. $row2->id.'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($row2->id, $row2->lom_title) . '</a>';
                                } 
                            }

                            if (Yii::app()->session['lang'] == 'my') {
                                $online_version_my = OstLom::model()->findByAttributes(array('lom_parent_lang' => $row2->id));

                                if($online_version_my->lom_doc != ''){
                                    $output .= '<tr class="' . $class . '">
                                        <td>' . '' . '</td><td>';
                                    $output .= '<a href="index.php?r=portal2/lom2&id='. $online_version_my->id.'" target="_blank" class="linklom">' . PortalTranslation::TranslateLomTitle($online_version_my->id, $online_version_my->lom_title) . '</a>';
                                    $output .= '</td></tr>';
                                } 
                            }
                        }
                    }
                }
                                
            }
            
        }
    }

    $output .= '<tr><td colspan=4>' . $element->pagination($limit, $total_pages, $page, $targetpage) . '</td></tr>';

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

<!--<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php // echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php // echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>-->

<?php $url = 'index.php?r=portal3/lom_en&menu_id=' . $_GET['menu_id']; ?>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php // echo PortalElement::GetBreadcrumbs(); ?></div> 

    <?php include 'lom_search_en.php'; ?>

    <div class='clear'></div>

    <div class='push10'><?php echo $term; ?></div>
    
    <table border='0' id="tablelom">

        <thead>

            <tr>
                
                <th width='130'>
                    <?php 
                        if(isset($_GET['sortA'])) {
                            if($_GET['sortA'] == 'ASC'){
                                echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=DESC" style="color:white">'.$act.'</a>';
                            } else {
                                echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=ASC" style="color:white">'.$act.'</a>';
                            }
                        } else {
                            echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sortA=DESC" style="color:white">'.$act.'</a>';
                        }
                        
                        echo '</th><th>';
                        
                        if(isset($_GET['sort'])) {
                            if($_GET['sort'] == 'DESC'){
                                echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=ASC" style="color:white">'.$title.'</a>';
                            } else {
                                echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=DESC" style="color:white">'.$title.'</a>';
                            }
                        } else {
                            echo '<a href="index.php?r=portal3/lom_en&menu_id=VXlsMDlEclhJVXlGcUd6c0JreVhEUT09&sort=ASC" style="color:white">'.$title.'</a>';
                        }
                    ?>
                </th>
            
            </tr>

        </thead>

        <tbody>

            <?php echo getlistlom($search, $postcat, $postcat_sub, $postkeyword, $postrev); ?>

        </tbody>

    </table>

</div>

<div class="clear"></div>

<script>
function addCount(id){
        $.ajax({
            type: "post",
            url: "index.php?r=portal2/lom2",
            data: "id=" + id,
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
</script>
<?php
$element = new PortalElement;

$bahagian = '';

$bhgn = 'Department';
$unit_n = 'Unit/Section';
$search_btn = 'Search';
$reset_btn = 'Reset';
$keyword = 'Keyword';

$key = 'Keyword';

$name = 'Name';
$email = 'Email';
$post = 'Position';
$no = 'Office Phone No.';
$faks = 'Fax No.';

$choose1 = '-- Choose Department --';

if (Yii::app()->session['lang'] == 'my') {
    $bhgn = 'Bahagian';
    $unit_n = 'Unit/Seksyen';
    $search_btn = 'Cari';
    $reset_btn = 'Set Semula';
    $keyword = 'Kata Kunci';

    $key = 'Kata Kunci';

    $name = 'Nama';
    $email = 'Emel';
    $post = 'Jawatan';
    $no = 'No Tel Pejabat';
    $faks = 'No Faks';

    $choose1 = "-- Pilih Bahagian -- ";
}

$search = 0;
$postkeyword = '';
$postdept = '';
$postunit = '';
$dept = '';
$unit = '';

if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
    $postkeyword = $_POST['keyword'];
    $search = 1;
} else if (isset($_GET['keyword'])) {
    $postkeyword = $element->encrypt_decrypt('decrypt', $_GET['keyword']);
    $search = 1;
}

if (isset($_POST['BAHAGIAN_ID']) && $_POST['BAHAGIAN_ID'] != '') {
    $dept = $_POST['BAHAGIAN_ID'];
    $search = 1;
} else if (isset($_GET['BAHAGIAN_ID'])) {
    $dept = $element->encrypt_decrypt('decrypt', $_GET['BAHAGIAN_ID']);
    $search = 1;
}

if (isset($_POST['UNIT_ID']) && $_POST['UNIT_ID'] != '') {
    $unit = $_POST['UNIT_ID'];
    $search = 1;
} else if (isset($_GET['UNIT_ID'])) {
    $unit = $element->encrypt_decrypt('decrypt', $_GET['UNIT_ID']);
    $search = 1;
}

function getstafflist($search, $dept, $unit, $postkeyword) {
    $dept_h = 0;
    $unit_h = 0;
    $unit_name = '';
    $unit_name_all = '';

    $div = 'Division';
    $sec = 'Unit/Section';

    $name = 'Name';
    $email = 'Email';
    $post = 'Position';
    $no = 'Office Phone No.';
    $unit_n = 'Unit/Section';
    $faks = 'Fax No.';
    $position  = 'Position';
            
    $norecord = 'No results found.';

    if (Yii::app()->session['lang'] == 'my') {
        $bhgn = 'Bahagian';
        $unit_n = 'Unit/Seksyen';
        $search_btn = 'Cari';
        $reset_btn = 'Set Semula';
        $keyword = 'Kata Kunci';

        $key = 'Kata Kunci';

        $name = 'Nama';
        $email = 'Emel';
        $post = 'Jawatan';
        $no = 'No Tel Pejabat';
        $faks = 'No Faks';

        $norecord = 'Tiada maklumat dijumpai.';
        
        $position = 'Jawatan';
    }
    $element = new PortalElement;
    $output = '';
    $sqlext_imp = '';
    $query1 = '';
    $sqlext = '';

    if ($search == 1) {
        $sqlext = '';

        if ($postkeyword != '') {
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'en') {
                $sqlext .= ' AND HR_STAF_PERIBADI.STF_NAMA LIKE "%' . $postkeyword . '%"';
            }
            if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] === 'my') {
                $sqlext .= ' AND HR_STAF_PERIBADI.STF_NAMA LIKE "%' . $postkeyword . '%"';
            }
        }

        if ($dept != 0) {
            $sqlext .= " AND LKP_BAHAGIAN.BAHAGIAN_ID =" . $dept;
            $dept_h = 1;
        }

        if ($unit != 0) {
            $sqlext .= " AND LKP_UNIT.UNIT_ID = " . $unit;
            $unit_h = 1;
        }

        $query1 = " SELECT
                        *
                    FROM
                        HR_PENEMPATAN
                        Inner Join HR_STAF_PERIBADI ON HR_STAF_PERIBADI.STF_ID = HR_PENEMPATAN.PEN_STF_ID
                        Inner Join LKP_UNIT ON HR_PENEMPATAN.PEN_UNIT_ID = LKP_UNIT.UNIT_ID
                        Inner Join LKP_BAHAGIAN ON HR_PENEMPATAN.PEN_BHGN_ID = LKP_BAHAGIAN.BAHAGIAN_ID
                    WHERE
                        HR_PENEMPATAN.PEN_STATUS_ID = 1 $sqlext
                    GROUP BY
                        HR_PENEMPATAN.PEN_UNIT_ID
                    ORDER BY
                        LKP_UNIT.UNIT_SORT ASC    
                    ";
    } 
    else
        $query1 = " SELECT
                        *
                    FROM
                        HR_PENEMPATAN
                    WHERE
                        HR_PENEMPATAN.PEN_STATUS_ID =  '1'
                    ";


    $result1 = Yii::app()->db->createCommand($query1)->queryAll();

    $total_pages = sizeof($result1);

    $currenturl = explode('&page=', Yii::app()->request->url);

    if ($search == 1) {
        $encrypted_postdept = $element->encrypt_decrypt('encrypt', $dept);
        $encrypted_postunit = $element->encrypt_decrypt('encrypt', $unit);
        $encrypted_postkeyword = $element->encrypt_decrypt('encrypt', $postkeyword);
        $targetpage = $currenturl[0] . '&BAHAGIAN_ID=' . $encrypted_postdept . '&UNIT_ID=' . $encrypted_postunit . '&keyword=' . $encrypted_postkeyword;
    } else
        $targetpage = $currenturl[0];

    $limit = 30;
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

    $model = HrPenempatan::model()->findAllBySql($query2);
    $model2 = LkpBahagian::model()->findAllBySql($query1);
    $model3 = LkpUnit::model()->findAllBySql($query1);
    $model4 = Fax::model()->findAllBySql($query1);
    
    //show division
    if ($dept_h == 1) {
        if (sizeof($model4) > 0) {
            
            foreach ($model4 as $row4) {
                
                $col_bhgn = '';
                if(sizeof($row4->FAX_DIVISION)>0){
                    $col_bhgn = '<tr >
                                    <td  colspan=3 align=center style="border-bottom: 1px solid #CCCCCC">' . $row4->FAX_DIVISION . '</td>
                                </tr>';
                }
                $output = ' <table border="0">
                                <tr style="background:#666666; color: white">
                                    <td colspan=3 align=center>' . $div . '</td>
                                </tr>
                                '.$col_bhgn.'
                                <tr style="border-bottom: 1px solid #CCCCCC" align=center>
                                    <td width=84%> '. $position .' </td>
                                    <td>'. $faks .'</td>
                                </tr>
                            ';
            }
            $fax_list = Fax::model()->findAll(array('condition'=>"FAX_DIVISION=$dept AND FAX_FLAG_DELETE=0"));
            
            foreach ($fax_list as $f) {
                if (Yii::app()->session['lang'] == 'en') {
                    $output .= '<tr>
                            <td>'.$f->FAX_SEC_UNIT.'</td>
                            <td align=center>'.$f->FAX_NO.'</td>
                            </tr>';
                }
                if (Yii::app()->session['lang'] == 'my') {
                    $output .= '<tr>
                            <td>'.$f->FAX_SEC_UNIT2.'</td>
                            <td align=center>'.$f->FAX_NO.'</td>
                            </tr>';
                }
            }
            $output .= '</tr></table><br><br>';
        }
    }

    //show unit
    if ($unit_h == 1) {
        if (sizeof($model3) > 0) {
            foreach ($model3 as $row3) {
                $unit_name = $row3->UNIT;
            }
        }
    }
    
    if (sizeof($model3) > 0) {
        foreach ($model3 as $row3) {
            $unit_name_all = $row3->UNIT;
        }
    }
    //listing all
    if ($search != 0) {
        if (sizeof($model) > 0) {

            $count = 0;

            foreach ($model as $row) {

                $query4 = " SELECT
                                *
                            FROM
                                HR_PENEMPATAN
                                Inner Join LKP_UNIT ON HR_PENEMPATAN.PEN_UNIT_ID = LKP_UNIT.UNIT_ID
                                Inner Join LKP_BAHAGIAN ON HR_PENEMPATAN.PEN_BHGN_ID = LKP_BAHAGIAN.BAHAGIAN_ID
                                Inner Join HR_STAF_PERIBADI ON HR_STAF_PERIBADI.STF_ID = HR_PENEMPATAN.PEN_STF_ID
                            WHERE
                                HR_PENEMPATAN.PEN_STATUS_ID =  '1' $sqlext AND
                                HR_PENEMPATAN.PEN_UNIT_ID = $row->PEN_UNIT_ID
                            ORDER BY
                                HR_PENEMPATAN.PEN_SORT ASC
                        ";
                $model4 = HrPenempatan::model()->findAllBySql($query4);

                $count++;
                $class = 'odd';

                if ($count % 2 == 0)
                    $class = 'even';

                if(Yii::app()->session['lang'] === 'en'){
                $output .= '<table>
                            '.$row->unit_rel->UNIT.'
                            <thead>
							<tr>
                            <th width=35%>' . $name . '</th>
                            <th width=10%>' . $email . ' <br>@agc.gov.my</th>
                            <th width=30%>' . $post . '</th>
                            <th width=15%>' . $no . '</th></thead>
                            <tr class="' . $class . '">                  
                            </tr>';
                }
                
                if(Yii::app()->session['lang'] === 'my'){
                    $output .= '<table>
                            '.$row->unit_rel->UNIT_MY.'
                            <thead>
							<tr>
                            <th width=35%>' . $name . '</th>
                            <th width=10%>' . $email . ' <br>@agc.gov.my</th>
                            <th width=30%>' . $post . '</th>
                            <th width=15%>' . $no . '</th></thead>
                            <tr class="' . $class . '">                  
                            </tr>';
                }

                if (sizeof($model4) > 0) {
                    foreach ($model4 as $row4) {
                        if(!empty($row4->jawatan_rel->JTN_JWTN_NAMA)){
                            if(Yii::app()->session['lang'] === 'my'){
                                $jawatan = $row4->jawatan_rel->JTN_JWTN_NAMA;
                            }else{
                                $jawatan = $row4->jawatan_rel->JTN_JWTN_NAMA_EN;
                            }
                        }else{
                            $jawatan = '';
                        }
                        if ($row4->PEN_UNIT_ID == $row->PEN_UNIT_ID) {
                            $output .= '    <tr class="' . $class . '">
                
                                <td>' . $row4->peribadi_rel->STF_NAMA . '</td>
                                <td align=center>' . $row4->peribadi_rel->STF_USERNAME . '</td>
                                <td> ' . 
                                    $jawatan
                                    . ' </td>       
                                <td align=center>' . $row4->peribadi_rel->STF_NO_TEL_PEJABAT . '</td>
                            </tr>';
                        }
                    }
                    $output .= '    </table><br><br>';
                }
            }
        } else {
            $output .= '     <table><thead>' . $unit_name . '<tr>
                            <th>' . $name . '</th>
                            <th>' . $email . ' <br>@agc.gov.my</th>
                            <th>' . $post . '</th>
                            <th>' . $no . '</th>
                        </tr></thead>
                        <tr><td colspan=5 align=center>' . $norecord . '</td></tr>
                        ';
        }
        $output .= '<tr><td colspan=5>' . $element->pagination($limit, $total_pages, $page, $targetpage) . '</td></tr>';
    }
    
    return $output;
}

$parent_cat = '';
?>

<style>

    .button{font-weight:normal;text-transform:none;}

    .pad5{padding:6px;margin:0 5px;width:210px;}

    .tabledirectory tr:nth-child(even){background:#e6e6e6;}

    .tabledirectory td{text-align: center;}

    .tabledirectory td:first-child{text-align: left;}

</style>

<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<?php $url = 'index.php?r=portal2/directory&menu_id=' . $_GET['menu_id']; ?>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::getMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 

    <div class="push20 searchdirectory">

        <form method="post" action="<?= $url ?>" id="directorylist">

            <div class='one_quarter first'>
<?php echo $bhgn; ?>
            </div>
            <div class='third_quarter push10'>
<?php
echo CHtml::dropDownList('BAHAGIAN_ID', $dept, LkpBahagian::model()->getdeptlist2(), array('class' => 'pad10', 'ajax' => array(
        'type' => 'POST',
        'url' => CController::createUrl('portal2/changedept'),
        'success' => 'function(data){
                        $("#UNIT_ID").html(data);
                    }
                    '
)));
?>
            </div>

            <div class='one_quarter first'>
                <?php echo $unit_n; ?>
            </div>
            <div class='third_quarter push10'>
<?php
if (isset($_POST['BAHAGIAN_ID'])) {
    echo CHtml::dropDownList('UNIT_ID', $unit, LkpUnit::model()->getdeptsub($_POST['BAHAGIAN_ID']), array('class' => 'pad10'));
} else {
    echo CHtml::dropDownList('UNIT_ID', $unit, LkpUnit::model()->getdeptsub($bahagian), array('class' => 'pad10'));
}
?>
            </div>

            <div class='one_quarter first'><?php echo $keyword; ?></div>

            <div class='third_quarter push10'>
                <input name="keyword" type='text' class='pad5' value="<?php echo $postkeyword; ?>">
            </div>


    </div>

    <input value="<?php echo $search_btn; ?>" class="button small grey push20" type="submit">

    <input value="<?php echo $reset_btn; ?>" class="button small orange" type="reset" onclick="javascript:location.href = 'index.php?r=portal2/directory&menu_id=amZIelErcVQzcFozdUgwNjY5K3phQT09'">

    </form>

    <table border='0' class="tabledirectory">
        <thead>
<!--            <tr>
                <th><?php // echo $name  ?></th>
                <th><?php // echo $email  ?> (@agc.gov.my)</th>
                <th><?php // echo $post  ?></th>
                <th><?php // echo $no  ?></th>
                <th><?php // echo $faks  ?></th>
            </tr>-->
        </thead>
        <tbody>
<?php echo getstafflist($search, $dept, $unit, $postkeyword); ?>
        </tbody>
    </table>

</div>

<script src="scripts/leftmenu.js"></script>
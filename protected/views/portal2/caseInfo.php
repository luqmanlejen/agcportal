<?php
$select = '';
$search_btn = 'Search';
$postyear = '';
$search = 0;
$month = 'Month';
$criminal = 'Criminal';
$civil = 'Civil';
$download = 'Download';

if (Yii::app()->session['lang'] == 'my') {
    $search_btn = 'Carian';
    $month = 'Bulan';
    $criminal = 'Jenayah';
    $civil = 'Awam';
    $download = 'Muat Turun';
}

if (isset($_POST['year']) && $_POST['year'] != '') {
    $postyear = $_POST['year'];
    $search = 1;
} else if (isset($_GET['year'])) {
    $postyear = $element->encrypt_decrypt('decrypt', $_GET['year']);
    $search = 1;
}

function GetCasesList($postyear, $search) {
    $no = 1;
    $output = "";
    $element = new PortalElement;
    $menu_id = $element->encrypt_decrypt('decrypt', $_GET['menu_id']);

    $year = OstRefList::model()->findByAttributes(array('cat_id' => 9));
    $model = CaseInfo::model()->findAll(array("condition" => "case_type='" . $_GET['case_type'] . "' AND case_year=$year->id AND lang='en' ORDER BY case_month ASC"));
    if ($search == 1) {
        $model = CaseInfo::model()->findAll(array("condition" => "case_type='" . $_GET['case_type'] . "' AND case_year=$postyear AND lang='en' ORDER BY case_month ASC"));
    }
    foreach ($model as $row) {
        $month = OstRefList::model()->findByAttributes(array('cat_id' => 11, 'id' => $row->case_month));
        if (sizeof($model) > 0) {
            if ($_GET['case_type'] == 'trial') {
                $output .= " <tbody>
                                <tr>
                                    <td>$no</td>
                                    <td>$month->label</td>
                                    <td align=center><a href='$row->criminal_url' target='_blank'><img src='uploads/images/icon/pdf.png'></a></td>
                                    <td align=center><a href='$row->civil_url' target='_blank'><img src='uploads/images/icon/pdf.png'></a></td>
                                </tr>
                            </tbody>
                            ";
            } else {
                $output .= " <tbody>
                                <tr>
                                    <td>$no</td>
                                    <td>$month->label</td>
                                    <td align=center><a href='$row->url' target='_blank'><img src='uploads/images/icon/pdf.png'></a></td>
                                </tr>
                            </tbody>
                            ";
            }
        } else {
            $output .= " <tbody>
                        <tr align=center>
                            <td colspan=4> No results found</td>
                        </tr>
                    </tbody>
                    ";
        }
        $no++;
    }
    if (sizeof($model) == 0) {
        $output .= " <tbody>
                        <tr align=center>
                            <td colspan=4> No results found</td>
                        </tr>
                    </tbody>";
    }

    echo $output;
}
?>
<style>
    table,tr,td{
        border: 1px solid #CCCCCC;
    }
</style>

<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>
    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 

    <div style="float:right; width: 30%">
        <?php $url = 'index.php?r=portal2/caseInfo&case_type=' . $_GET['case_type'] . '&menu_id=' . $_GET['menu_id']; ?>
        <form method="post" action="<?= $url; ?>" id="" >
            <div class='three_quarter push10' style="float:right;">
                <?php
                if (isset($_POST['year'])) {
                    echo CHtml::dropDownList('year', $_POST['year'], CaseInfo::model()->getyearlist(), array('class' => 'pad10'));
                } else {
                    echo CHtml::dropDownList('year', $select, CaseInfo::model()->getyearlist(), array('class' => 'pad10'));
                }
                ?>
                <input value="<?php echo $search_btn; ?>" class="button small orange" type="submit" onclick="displayall(1)">&nbsp;
            </div>
        </form>
    </div>
    <table border=1>
        <thead>
            <tr>
                <th width='50'>#</th>
                <th><?php echo $month; ?></th>

                <?php if ($_GET['case_type'] == 'trial') { ?>
                    <th width='100'><?php echo $criminal ?></th><th width='100'><?php echo $civil ?></th>
                <?php } else { ?>
                    <th width='100'><?php echo $download ?></th>
<?php } ?>
            </tr>
        </thead>
<?php echo GetCasesList($postyear, $search); ?>
    </table>
</div>

<script src="scripts/leftmenu.js"></script>
<style>
    
    .linkpublication{color:inherit;}
    
    .linkpublication:hover{color: #F90 !important; }
    
</style>

<?php

$select = '';
$search_btn = 'Search';
$postyear = '';
$search = 0;

if (Yii::app()->session['lang'] == 'my') {
    $search_btn = 'Carian';
}

if (isset($_POST['year']) && $_POST['year'] != '') {
    $postyear = $_POST['year'];
    $search = 1;
} else if (isset($_GET['year'])) {
    $postyear = $element->encrypt_decrypt('decrypt', $_GET['year']);
    $search = 1;
}


function GetPublication($postyear){
    if($postyear == ''){
        $postyear = date('Y');
    }
    $model = OstPublication::model()->findAll(array("condition" => "doc_type='" . $_GET['type'] . "' AND parent_id=0 AND lang='en' AND doc_dt LIKE '%$postyear%' ORDER BY doc_dt DESC"));
    $output = '';
    if (sizeof($model) > 0) {

        $count = 0;

        foreach ($model as $row) {

            $count++;
            $hits = $row->hits + 1;
            $output .= '<tr>
                    <td align="center">' . $count . '</td>
                    <td><a href="' . $row->doc_url . '" target="_blank" class="linkpublication">' . $row->title . '<div style="visibility: hidden; margin-top: -20px;">'.OstPublication::model()->updateByPk($row->id, array("hits" => $hits)).'<div></a></td>
                    <td align="center">' . date("d/m/Y", strtotime($row->doc_dt)) . '</td>
                </tr>';
        }
    }else{
        $output .= '<tr><td align="center" colspan="3">No record found</td></tr>';
    }
    echo $output;
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

    <div style="float:right; width: 40%">
        <?php $url = 'index.php?r=portal2/publication&type='.$_GET['type'].'&menu_id=Sk5wS1BYVXpyZUFSYytPTHFQUHZ6dz09'; ?>
        <form method="post" action="<?= $url; ?>" id="" >
            <div class='push10' style="float:right">
                <?php
                if (isset($_POST['year'])) {
                    echo CHtml::dropDownList('year', $_POST['year'], OstRefList::model()->listRef3(9), array('class' => 'pad10'));
                } else {
                    echo CHtml::dropDownList('year', $select, OstRefList::model()->listRef3(9), array('class' => 'pad10'));
                }
                ?>
                <input value="<?php echo $search_btn; ?>" class="button small orange" type="submit" onclick="displayall(1)">&nbsp;
            </div>
        </form>
    </div>
    
    <table border='1'>

        <thead>

            <tr>

                <th width='50'>#</th>

                <th>Title</th>

                <th width='100'>Date</th>

            </tr>

        </thead>

        <tbody>

            <?php echo GetPublication($postyear); ?>

        </tbody>

    </table>

</div>

<script src="scripts/leftmenu.js"></script>
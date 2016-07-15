<?php
$table_label1 = 'Title';

$table_label2 = 'Date';

if (Yii::app()->session['lang'] == 'my') {

    $table_label1 = 'Tajuk';

    $table_label2 = 'Tarikh';
}
?>

<style>

    .table_article_list td {vertical-align: middle;}

    .even{background:#e6e6e6;}

    .grid-view { padding: 0px; }
    
    .table_article_list td a {color : inherit;text-decoration: none;}
    
    .table_article_list td a:hover {color: #0782C1;text-decoration: underline;}

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

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'ost-articles-grid',
        'dataProvider' => $model->search_from_portal(),
        'itemsCssClass' => 'table_article_list',
        'pagerCssClass' => 'dataTables_paginate',
        'pager' => array('class' => 'PagerSA', 'header' => ''),
        'summaryText' => '',
        'emptyText' => 'No results found',
        'columns' => array(
            array('header' => 'No', 'value' => '($this->grid->dataProvider->pagination->offset+$row+1)', 'htmlOptions' => array('width' => '1', 'align' => 'center')),
            array('header' => $table_label1, 'value' => '$data->getarticle_from_portal()'),
            array('header' => $table_label2, 'value' => 'date("d/m/Y", strtotime($data->created_dt))', 'htmlOptions' => array('width' => '100', 'align' => 'center')),
        ),
    ));
    ?>

</div>

<script src="scripts/leftmenu.js"></script>
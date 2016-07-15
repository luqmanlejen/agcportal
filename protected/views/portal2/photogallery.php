<?php

$select = '';
$search_btn = 'Search';
$postyear = '';
$search = 0;
$month = 'Month';

if (Yii::app()->session['lang'] == 'my') {
    $search_btn = 'Carian';
    $msg = "Harap maaf, tiada galeri foto untuk tahun ";
}

if (isset($_POST['year']) && $_POST['year'] != '') {
    $postyear = $_POST['year'];
    $search = 1;
} else if (isset($_GET['year'])) {
    $postyear = $element->encrypt_decrypt('decrypt', $_GET['year']);
    $search = 1;
}


$element = new PortalElement;

function GetPhotoAlbumList($postyear) {
    $msg = "We are sorry, no photo gallery for year ";
    if($postyear == ''){
        $postyear = date('Y');
    }
    $output = '';

    $element = new PortalElement;
    
    $menu_id = $element->encrypt_decrypt('decrypt', $_GET['menu_id']);

    $query1 = "SELECT * FROM ost_photo_album WHERE lang='en' AND event_dt LIKE '%$postyear%' ORDER BY event_dt DESC";

    $result1 = Yii::app()->db->createCommand($query1)->queryAll();

    $total_pages = sizeof($result1);

    $currenturl = explode('&page=', Yii::app()->request->url);

    $targetpage = $currenturl[0];

    $limit = 12;

    $page = 0;

    if (isset($_GET['page']))
        $page = $_GET['page'];

    if ($page)
        $start = ($page - 1) * $limit;
    else
        $start = 0;

    $query2 = $query1 . " LIMIT $start, $limit";

    $model = OstPhotoAlbum::model()->findAllBySql($query2);

    if (sizeof($model) > 0) {

        $count = 0;

        foreach ($model as $row) {

            $class = '';

            if ($count % 4 == 0)
                $class = 'first';
            
            $img = 'images/demo/1200x400.gif';
            
            $model2 = OstPhotoList::model()->findAllBySql("SELECT url, id FROM ost_photo_list WHERE album_id=" . $row->id . " ORDER BY sort ASC LIMIT 1");
            
            if (sizeof($model2) > 0) {

                foreach ($model2 as $row2) {
                    
                    
                    $img = PortalTranslation::TranslateDocAttach($row2->id, $row2->url, 'url');
                    
                }
//            }
//            $imgs = '';
//            $model2 = OstPhotoList::model()->findByAttributes(array('album_id' => $row->id));
//            if (sizeof($model2) > 0 && $model2->url != '')
//                $imgs = $model2->url;
            
            $album_id = $element->encrypt_decrypt('encrypt', $row->id);

            $output.= '<div class="one_quarter ' . $class . '">
                        <article class="push30">
                            <div class="boxholder push10"><img src="' . $img . '" alt=""></div>
                            <a href="index.php?r=portal2/photogalleryview&menu_id=' . $_GET['menu_id'] . '&album_id=' . $album_id . '" class="hover">' . PortalTranslation::TranslateGalleryTitle($row->id, $row->title) . '</a>
                            '. date('Y', strtotime($row->created_dt)) .'
                        </article>
                    </div>';

            $count++;
            } 
        }
    } else {
        echo $msg." ".$postyear.".";
    }

    $output.= $element->pagination($limit, $total_pages, $page, $targetpage);

    return $output;
}
?>

<style>
    
    .linkpublication{color:inherit;}
    
    .linkpublication:hover{color: #F90 !important; }
    
    .hover{color:inherit;text-decoration:none;}
    
    .hover:hover{color: #0782C1;text-decoration:underline;}
    
</style>

<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::getMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::getMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 
    
    <div style="float:right; width: 40%">
        <?php $url = 'index.php?r=portal2/photogallery&menu_id=bWh4WXo0MkYrOXpycHNJT3I3R0pBQT09'; ?>
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
    
    <div class="clear"><?php echo GetPhotoAlbumList($postyear); ?></div>

</div>

<script src="scripts/leftmenu.js"></script>
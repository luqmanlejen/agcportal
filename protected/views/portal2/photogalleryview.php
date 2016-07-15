<?php
$element = new PortalElement;

function GetAlbumTitle() {

    $element = new PortalElement;

    $album_id = $element->encrypt_decrypt('decrypt', $_GET['album_id']);

    $model = OstPhotoAlbum::model()->findByPK($album_id);

    if (sizeof($model) > 0)
        return PortalTranslation::TranslateGalleryTitle($album_id, $model->title);
}

function GetAlbumDescr() {

    $element = new PortalElement;

    $album_id = $element->encrypt_decrypt('decrypt', $_GET['album_id']);

    $model = OstPhotoAlbum::model()->findByPK($album_id);

    if (sizeof($model) > 0)
        return '<div class="push20">' . PortalTranslation::TranslateGalleryContent($album_id, $model->descr) . '</div>';
}

function GetPhotoList() {

    $output = '';

    $element = new PortalElement;

    $album_id = $element->encrypt_decrypt('decrypt', $_GET['album_id']);
    
    $model = OstPhotoList::model()->findAll(array("condition" => "album_id=" . $album_id, "order" => " sort ASC"));

    if (sizeof($model) > 0) {

        $count = 0;

        foreach ($model as $row) {

            $class = '';

            if ($count % 4 == 0)
                $class = 'first';

            $count++;

            //$album_id = $row->album_id;
            
            $model2 = OstPhotoList::model()->findByPK($row->id);
            
            if (sizeof($model2) > 0) {
                
                $photo_img = PortalTranslation::TranslateDocAttach($model2->id, $model2->url, 'url');
                
                $output.= '<div class="one_quarter ' . $class . '">
                                <div class="boxholder push20">
                                    <a href="' . $photo_img . '" title="' . GetAlbumTitle() . '">
                                        <img src="' . $photo_img . '">
                                    </a>
                                </div>
                           </div>';
            }
        }
    }

    return $output;
}
?>

<link rel="stylesheet" href="css/magnific-popup.css"> 

<script src="scripts/jquery.magnific-popup.min.js"></script>

<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::getMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo GetAlbumTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo $element->getBreadcrumbs(); echo "&nbsp;&nbsp;&raquo;&nbsp;&nbsp;".GetAlbumTitle();?></div> 

    <?php echo GetAlbumDescr(); ?>

    <div class="clear popup-gallery"><?php echo GetPhotoList(); ?></div>

</div>

<script src="scripts/leftmenu.js"></script>

<script>

    jQuery.noConflict()(function($) {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }
        });
    });


</script>

<div class="clear"></div>
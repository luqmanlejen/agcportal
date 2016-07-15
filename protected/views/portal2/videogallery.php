<?php
$oCommon = new PortalElement;

function GetVideoList() {

    $output = '';

    $oCommon = new PortalElement;

    $menu_id = $oCommon->encrypt_decrypt('decrypt', $_GET['menu_id']);

    $model = OstMedia::model()->findAll(array("condition" => "media_type='video'", "order" => "id DESC"));

    if (sizeof($model) > 0) {

        foreach ($model as $row) {

            $count = 0;

            //$model2 = GalMedia::model()->findAll(array("condition" => "gal_id=" . $row->id . " AND media_cat='m3'", "order" => "id DESC"));
            //if (sizeof($model2) > 0) {
            //foreach ($model2 as $row2) {

            $class = '';

            if ($count % 4 == 0)
                $class = 'first';

            $img = $row->img;; //'images/demo/192x192.gif';

            $id = $row->id;

            $model3 = OstMedia::model()->findByPK($id);

            if (sizeof($model3) > 0) {

                //$img = PortalTranslation::TranslateDocAttach($id, $model3->title, 'title');

                $output.= '<div class="one_quarter ' . $class . '">
                                    <article class="push30">
                                        <div class="boxholder push10"><img src="' . $img . '"></div>
                                        <h2 class="nospace font-medium">
                                            <center>
                                                <a class="hover popup-with-form" href="#video' . $count . '">
                                                    ' . PortalTranslation::TranslateDocAttach($id, $model3->title, 'url') . '
                                                </a>
                                            </center>
                                        </h2>
                                    </article>
                                </div><div id="video' . $count . '" class="white-popup-block mfp-hide"><iframe src="player.php?video=' . $row->url . '"></iframe></div>';

                $count++;
                //}
                //    }
            }
        }
    }

    return $output;
}
?>

<link rel="stylesheet" href="css/magnific-popup.css"> 

<script src="scripts/jquery.magnific-popup.min.js"></script> 

<style>

    a.hover:hover{ text-decoration: underline; }

    .white-popup-block {
        background: none repeat scroll 0% 0% #FFF;
        padding: 20px;
        text-align: left;
        max-width: 640px;
        margin: 40px auto;
        position: relative;
        height : 480px;
    }

    .white-popup-block iframe{ border : 0; width : 640px; height : 485px; }

    .mfp-close { background : yellow !important; position : absolute !important; top : -20px !important; right : -20px !important; border-radius: 50%; }

</style>

<div id="sidebar_1" class="sidebar one_quarter first">

    <aside>

        <h2><?php echo $oCommon->getMasterTitle(); ?></h2>

        <nav><?php echo $oCommon->getLeftMenu(); ?></nav>

    </aside>

</div>

<div class="three_quarter">



    <h1 class="nospace" style="position:relative;">

<?php echo $oCommon->getMenuTitle(); ?>



    </h1>

<?php echo $oCommon->getBreadcrumbs(); ?>

    <div class="clear"><? echo GetVideoList(); ?></div>

</div>

<script>

    jQuery.noConflict()(function ($) {
        $('.popup-with-form').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#name',
            tClose: '',
            callbacks: {
                beforeOpen: function () {
                    if ($(window).width() < 700) {
                        this.st.focus = false;
                    } else {
                        this.st.focus = '#name';
                    }
                }
            }
        });

    });


</script>

<div class="clear"></div>
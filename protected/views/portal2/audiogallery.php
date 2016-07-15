<?php
$oCommon = new PortalElement;

function GetAudioList() {

    $output = '';

    $oCommon = new PortalElement;

    $menu_id = $oCommon->encrypt_decrypt('decrypt', $_GET['menu_id']);

    $model = OstMedia::model()->findAll(array("condition" => " media_type='audio'", "order" => "id DESC"));

    if (sizeof($model) > 0) {

        foreach ($model as $row) {

            $trans_audio_label = 'Download';

            if (Yii::app()->session['lang'] == 'my') {

                $trans_audio_label = 'Muat Turun';
            }

            $count = 0;

            //$model2 = OstMedia::model()->findAll(array("condition" => " media_type='audio'", "order" => "id DESC"));
            //if (sizeof($model2) > 0) {
            //foreach ($model2 as $row2) {

            $class = '';

            if ($count % 2 == 0)
                $class = 'first';

            $img = $row->img; //'images/audio.png';

            $id = $row->id;

            $model3 = OstMedia::model()->findByPK($id);
            //echo (sizeof($model2));

            if (sizeof($model3) > 0) {

                $output.= '<div class="one_half ' . $class . ' push30">
                                        <article class="push10 clear">
                                            <div class="one_third first"><div class="boxholder push10"><img src="' . $img . '" alt=""></div></div>
                                            <div class="two_third">
                                                <h2 class="push10 font-medium">' . PortalTranslation::TranslateDocAttach($id, $model3->title, 'title') . '</h2>
                                                <a href="' . PortalTranslation::TranslateDocAttach($id, $model3->url, 'url') . '" target="_blank" class="hover">
                                                    <b>' . $trans_audio_label . ' <span class="icon-download-alt"></span></b>
                                                </a> 
                                            </div>
                                        </article>
                                        <audio controls style="width: 100%;">
                                            <source src="' . PortalTranslation::TranslateDocAttach($id, $model3->url, 'url') . '" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>';

                $count++;
            }
        }
    }

    return $output;
}
?>

<style>

    a.hover:hover{ text-decoration: underline; }

</style>

<div id="sidebar_1" class="sidebar one_quarter first">

    <aside>

        <h2><?php echo $oCommon->getMasterTitle(); ?></h2>

        <nav><?php echo $oCommon->getLeftMenu(); ?></nav>

    </aside>

</div>

<div class="three_quarter">



    <h1 class="nospace"><?php echo PortalElement::getMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 

    <div class="clear"><? echo GetAudioList(); ?></div>

</div>

<div class="clear"></div>
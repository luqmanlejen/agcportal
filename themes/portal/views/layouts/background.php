<style>

    #background .item img{
        display: block;
        width: 100%;
        height: auto;
		    }

    #background{
        position:fixed;
        width:100%;
        height:100%;
        z-index: -1;
    }

</style>

<div id="background" class="owl-carousel owl-theme">

    <?php
    $background_arr = PortalElement::GetMediaList('background');

    if (sizeof($background_arr) > 0) {

        foreach ($background_arr as $bgarr) {

            echo '<div class="item"><img src="' . $bgarr['img'] . '" alt="' . $bgarr['title'] . '"></div>';
        }
    }
    ?>

</div>

<script>

    jQuery.noConflict()(function($) {

        $("#background").owlCarousel({
            navigation: false,
            singleItem: true,
            transitionStyle: "fade",
            pagination: false,
            autoPlay: 30000
        });


    });

</script>
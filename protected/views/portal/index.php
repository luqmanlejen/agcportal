<?php
if (Yii::app()->session['lang'] == 'my')
    include 'protected/messages/my.php';
else
    include 'protected/messages/en.php';
?>

<style>
    #mainslide{
        position:relative;
        margin-bottom:80px;
    }
    #mainslide .owl-controls .owl-buttons div {background:none;opacity: 1;margin:0;padding:0;}
    #mainslide .owl-controls .owl-buttons .owl-next{position:absolute;top:50%;right:30px;}
    #mainslide .owl-controls .owl-buttons .owl-prev{position:absolute;top:50%;left:30px;}
    .itemsmall{max-width:1200px;margin:0 auto;min-height:431px;}
    .itemtitle{
        display: block;
        color: rgba(255, 255, 255, 0.95);
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
        text-transform: uppercase;
        letter-spacing: 0.15em;
        font-weight: 400;
        font-size: 2.4em;
    }
    .itemsearch{
        border:0;
        line-height:40px;
        padding:0 10px;
        width:380px;
        //background-image:url('images/search.png');
        background-repeat: no-repeat;
        background-position: 360px center;
        float:right;
    }

    .weather{
        float:right;
        height:40px;
        color:white;
        margin-right:30px;
        text-align: right;
    }

    .storm{
        height:40px;
        float:right;
        margin-left:10px;
    }

    .itemsmaller{opacity:0.8;color:black;}
    .itemsmaller:hover{opacity: 1.0;}
</style>

<div id='mainslide' class="owl-carousel owl-theme">

    <div class="item"><div class="itemsmall"><?php include 'public.php' ?></div></div>

    <div class="item"><div class="itemsmall"><?php include 'business.php' ?></div></div>

    <div class="item"><div class="itemsmall"><?php include 'agcstaff.php' ?></div></div>

</div>

<script>

    jQuery.noConflict()(function($) {

        $("#mainslide").owlCarousel({
            navigation: false,
            slideSpeed: 1000,
            singleItem: true,
            pagination: false,
            touchDrag: false,
            mouseDrag: false,
            navigationText: ["<img src='images/left_arrow2.png'>", "<img src='images/right_arrow2.png'>"],
        });

        var owl = $("#mainslide").data('owlCarousel');

        $('#linkpublic').click(function() {
            owl.goTo(0);
        });

        $('#linkbusiness').click(function() {
            owl.goTo(1);

            //start carousel at page business
            $("#business_tender").owlCarousel({
                autoPlay: true,
                navigation: true,
                slideSpeed: 1000,
                items: 2,
                pagination: false,
                navigationText: ["<img src='images/arrow/left_black.png'>", "<img src='images/arrow/right_black.png'>"],
            });

        });

        $('#linkstaff').click(function() {
            owl.goTo(2);

            //start carousel at page AGC Staff
            $("#staff_directives_list").owlCarousel({
                autoPlay: true,
                navigation: true,
                slideSpeed: 1000,
                items: 2,
                pagination: false,
                navigationText: ["<img src='images/arrow/left_white.png'>", "<img src='images/arrow/right_white.png'>"],
            });

            $("#staff_circular_list").owlCarousel({
                autoPlay: true,
                navigation: true,
                slideSpeed: 1000,
                items: 1,
                pagination: false,
                navigationText: ["<img src='images/arrow/left_white.png'>", "<img src='images/arrow/right_white.png'>"],
            });

        });

    });

</script>

<?php include 'pushmenu.php'; ?>
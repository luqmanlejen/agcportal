<!DOCTYPE html>
<html class="not-ie" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="description" />
        <meta name="keywords" content="keywords"/>
        <meta name="author" content="BRKOR" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <title>Attorney General's Chambers</title>

        <!-- google web font-->
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>-->

        <!-- style sheets-->
        <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css" type="text/css"/>
        <!--<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.mCustomScrollbar.css" type="text/css" />-->
        <!--<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style2.css" type="text/css"/>-->
        <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/default.css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/component.css" />
                <!--<script src="js/modernizr.custom.js"></script>-->
        
        <!-- main jquery libraries / others are at the bottom-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js" type="text/javascript" ></script>
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.custom.js" type="text/javascript"></script>
        <!--<script src="js/twitterFetcher_v10_min.js" type="text/javascript"></script>-->

        <!--owl-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/owl.carousel.min.js" type="text/javascript"></script>
    </head>
    <body class="horizontal-layout">
        <img src="images/background/1.jpg" alt="Background image" style="position: absolute;height: 100%;width: 100%; opacity: 0.4"/>
        <nav id="navigation-menu" style="max-width: 100%;overflow-x: hidden;">
            <!-- Header -->
            <header>
                <?php include 'header.php'; ?>
            </header>
            <!-- end Header -->
        </nav>
        
        <div class="container2">
        <?php echo $content; ?>
        </div>
        
        <div style="background-color: white; color:black; font-weight: 700;bottom:10;">
        <div class="container">
            <div class="col-md-3 col-xs-12">
                Privacy | Policy | Security | Disclaimer | Sitemap
            </div>
            <div class="col-md-6 col-xs-12">
                <div style="float: right; margin-right: 20px;">Best viewed using Mozilla Firefox or Google Chrome with 1024x768 screen resolution</div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="hidden-xs" style="float: right;">Copyright@2016 Attorney General's Chambers</div>
                <div class="hidden-md hidden-lg">Copyright@2016 Attorney General's Chambers</div>
            </div>
        </div>
        </div>
        
<!--        <div id="content">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <section id="section-1">
                <div class="content">
                    <h2>Section 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <hr /><a href="#" rel="next">Next section &rarr;</a>
                </div>
            </section>
            <section id="section-2">
                <div class="content">
                    <h2>Section 2</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <hr /><a href="#top">&larr; Back to start</a> <a href="#" rel="next">Next section &rarr;</a>
                </div>
            </section>
            <section id="section-3">
                <div class="content">
                    <h2>Section 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <hr /><a href="#top">&larr; Back to start</a> <a href="#" rel="next">Next section &rarr;</a>
                </div>
            </section>
        </div>-->
        
        


        <!-- Java Script -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>

        <!-- Scrollbar -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Scripts -->  
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>

        <!-- Twitter Feed -->
<!--        <script>
            twitterFetcher.fetch('385822467438022656', 'tweet-feed', 5, true);
        </script>-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.newsTicker.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/horizontal-scroll.js" type="text/javascript"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dlmenu.js"></script>
        <script>
            $(function () {
                $('#dl-menu').dlmenu({
                    animationClasses: {classin: 'dl-animate-in-3', classout: 'dl-animate-out-3'}
                });

                $('#carouselHacked').carousel();




                /* Page Scroll to id fn call */
                $("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
                    layout: "horizontal",
                    highlightSelector: "#navigation-menu a"
                });

                /* demo functions */
                $("a[rel='next']").click(function (e) {
                    e.preventDefault();
                    var to = $(this).parent().parent("section").next().attr("id");
                    $.mPageScroll2id("scrollTo", to);
                });

                


                $(".scroller").click(function (event) {
                    var current = $('.container2').scrollLeft();
                    var left = $(this.hash).position().left;

                    event.preventDefault();

                    $('.container2').animate({
                        scrollLeft: current + left
                    }, 200);
                });
            });
        </script>

    </body>

</html>
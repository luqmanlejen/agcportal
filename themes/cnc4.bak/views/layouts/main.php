<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html > <!--<![endif]-->

    <head>

        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="An Unlimited WordPress News & Magazine Theme with WooCommerce Support">
        <meta name="keywords" content="magazine template, news template">
        <meta name="author" content="themejunkie">

        <!-- Title -->
        <title>Chamber News Channels (CNC)</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>	
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css"/>	
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/colors/default.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css"/>

        <!-- Favicon -->
        <!--<link type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png" rel="shortcut icon">-->

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/side/css/side-slider.css" rel="stylesheet" type="text/css" media="screen">
        
        <!-- JavaScripts -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.matchHeight.js"></script>		
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/hoverIntent.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js"></script>	
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.sidr.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/retina.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.sticky.js"></script>
        <script type='text/javascript' src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.custom.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/analytics.js"></script><!-- FOR DEMO ONLY --> 
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/side/js/jquery.side-slider.js"></script>
    </head>

    <body class="single layout-narrow">
       
        <!-- Page / Start -->	
        <div id="page" class="hfeed site clearfix">

            <!-- Masthead / Start -->
            <header id="masthead" class="site-header container clearfix" role="banner">

                <div id="logo">
                    <a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_CNC.png" alt="Logo Title" /></a>
                    <!-- <h1 class="site-title"><a href="index.html">SuperNews</a></h1> -->
                </div>

                <!--			<div class="header-ad">
                                                <a href="#"><img height='100' src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner_cnc.png" alt="Banner CNC"/></a>
                                        </div>-->

                <div class="clearfix"></div>

                <!-- Secondary Bar / Start -->
                <div id="secondary-bar" class="clearfix">

                    <a id="secondary-mobile-menu" href="#"><i class="fa fa-bars"></i> <span>Secondary Menu</span></a>

                    <!-- Secondary Navigation / Start -->
                    <nav id="secondary-nav">
                        <?php include 'menu2.php'; ?>
                    </nav>
                    <!-- Secondary Navigation / End -->

                    <div class="header-search">

                        <i class="fa fa-search"></i>
                        <i class="fa fa-times"></i>

                        <div class="search-form">
                            <form action="http://dev.theme-junkie.com/html/supernews/search.html" id="searchform" method="get">
                                <input name="s" type="text" />
                                <button type="submit">Search</button>
                            </form>
                        </div><!-- .search-form -->		  

                    </div><!-- .header-search -->	

                </div>	
                <!-- Secondary Bar / End -->

            </header>
            <!-- Masthead / End -->
            <?php include 'w3c.php'; ?>
            
            <!-- Site Main / Start -->
            <?php echo $content; ?>
            <!-- Site Main / End -->

            <!-- Footer / Start -->	
            <?php include 'footer.php'; ?>
            <!-- Footer / End -->	

        </div>
        <!-- Page / End -->

        

        
        <!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->
    </body>
</html>
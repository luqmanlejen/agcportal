<!DOCTYPE html>
<html>
    <head>
        <title>Chamber News Channels</title>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="BOX SHOP Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- start menu -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo").flexisel({
                    visibleItems: 1,
                    animationSpeed: 500,
                    autoPlay: false,
                    autoPlaySpeed: 5000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 1
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 1
                        }
                    }
                });

            });
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/icongrid/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/icongrid/css/component.css" />
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/icongrid/js/modernizr.custom.js"></script>
        <style>
            .background:before {
                opacity: 0.3;
                content: "";
                position: fixed;
                left: 0;
                right: 0;
                z-index: -1;

                display: block;
                background-image: url('images/background_content.jpg');
                width: 1400px;
                height: 1800px;

                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
            }

/*            .background {
                position: fixed;
                left: 0;
                right: 0;
                z-index: 0;
                margin-left: 20px;
                margin-right: 20px;
                }*/
        </style>
        
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/side/css/side-slider.css" rel="stylesheet" type="text/css" media="screen">
        
    </head>
    <body>
        <div class="background">
        <!-- header-section-starts -->
        <div class="header">
            <?php // include 'header_top.php'; ?>
            <?php include 'header_bottom.php'; ?>
        </div>
        <!-- header-section-ends -->
        
        <?php include 'w3c.php'; ?>
        
        <?php echo $content; ?>
           
        <?php include 'footer.php'; ?>


        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/megamenu.js"></script>
        <script>$(document).ready(function () {
                                $(".megamenu").megamenu();
                            });</script>
        <!-- start slider -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/responsiveslides.min.js"></script>
        <script>
                            $(function () {
                                $("#slider").responsiveSlides({
                                    auto: true,
                                    speed: 500,
                                    namespace: "callbacks",
                                    pager: false,
                                });
                            });
        </script>
        <!--end slider -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/flexslider.css" type="text/css" media="screen" />

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexisel.js"></script>
        </div>
        
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/side/js/jquery.side-slider.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#sideslider').sideSlider();

            });
        </script>
    </body>
</html>
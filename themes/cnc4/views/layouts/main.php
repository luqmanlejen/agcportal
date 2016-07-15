<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chamber News Channels</title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
        <!-- bootstrap styles-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
        <!--font awesome-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" />
        <!-- ionicons font -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ionicons.min.css" rel="stylesheet">
        <!-- animation styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css" />
        <!-- custom styles -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom-red.css" rel="stylesheet" id="style">
        <!-- owl carousel styles-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.transitions.css">
        <!-- magnific popup styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/magnific-popup.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <style>
            .news_brief{
                position: relative;
                left: 13%;
                right: 5%;
                bottom: 20px;
                z-index: 10;
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
                text-shadow: 0 1px 2px rgba(0,0,0,0.6);
                font-size: 12px;
                width: 80%;                    
            }

            #logoCNC{
                margin: 10px;
            }
            img.qr_code_thumbnail{
                width: 32px;
                height: 32px;
            }
            ul.enlarge{
                list-style-type:none; /*remove the bullet point*/
                float: right;
            }
            ul.enlarge li{
                display:inline-block; /*places the images in a line*/
                position: relative; /*allows precise positioning of the popup image when used with position:absolute - see support section */
                z-index: 0; /*resets the stack order of the list items - we'll increase in step 4. See support section for more info*/
                margin:0px 3px 0 -1px; /*space between the images*/
            }

            ul.enlarge span{
                position:absolute; /*see support section for more info on positioning*/
                left: -9999px; /*moves the span off the page, effectively hidding it from view*/
            }

            #enlarge_img{
                //give the thumbnails a frame
                background-color:#eae9d4; //frame colour
                padding: 2px; //frame size
                //padding-top: 10px;
                margin: 19% 0 0 -60%;
                //add a drop shadow to the frame
                -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
                -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
                box-shadow: 0 0 6px rgba(132, 132, 132, .75);
                //and give the corners a small curve
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 2px;
            }

            ul.enlarge li:hover{
                z-index: 50; /*places the popups infront of the thumbnails, which we gave a z-index of 0 in step 1*/ 
                cursor:pointer; /*changes the cursor to a hand*/
            }
            /***We bring the large image back onto the page by reducing left from -9999px (set in step 2) to figures below***/ 
            ul.enlarge li:hover span{ /*positions the <span> when the <li> (which contains the thumbnail) is hovered*/ 
                top: -30px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
                left: -20px; /*distance from the left of the thumbnail to the left of the popup image*/
            }
            /***To make it look neater we used :nth-child to set a different left distance for each image***/ 
            ul.enlarge li:hover:nth-child(2) span{
                left: -100px; 
            }
            ul.enlarge li:hover:nth-child(3) span{
                left: -200px; 
            }
        </style>
    </head>
    <body>
        <!-- preloader start -->
        <div id="preloader">
            <div id="status"></div>
        </div>
        <!-- preloader end --> 
        <!-- style switcher start -->
        <div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
            <div id="switcher">
                <ul class="colors-list">
                    <li><a href="#" class="red"></a></li>
                    <li><a href="#" class="green"></a></li>
                    <li><a href="#" class="purple"></a></li>
                    <li><a href="#" class="blue"></a></li>
                </ul>
            </div>
        </div>
        <!-- style switcher end --> 
        <!-- wrapper start -->
        <div class="wrapper"> 
            <!-- header toolbar start -->
            <?php include 'toolbar.php'; ?>
            <!-- header toolbar end --> 

            <!-- sticky header start -->
            <?php // include 'header.php'; ?>
            <!-- sticky header end --> 
            <!-- top sec start -->


            <!-- nav and search start -->
    <?php include "menu2.php";?>
    <!-- nav and search end--> 


           <?php echo $content; ?>




            <!-- Footer start -->
            <?php include 'footer.php'; ?>
            <!-- Footer end -->

        </div>
        <!-- wrapper end --> 

        <!-- jQuery --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script> 
        <!--jQuery easing--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script> 
        <!-- bootstrab js --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script> 
        <!--style switcher--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/style-switcher.js"></script> <!--wow animation--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/wow.min.js"></script> 
        <!-- time and date --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/moment.min.js"></script> 
        <!--news ticker--> 
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ticker.js"></script>--> 
        <!-- owl carousel --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/owl.carousel.js"></script> 
        <!-- magnific popup --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.magnific-popup.js"></script> 
        <!-- weather --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simpleWeather.min.js"></script> 
        <!-- calendar--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.pickmeup.js"></script> 
        <!-- go to top --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.scrollUp.js"></script> 
        <!-- scroll bar --> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.js"></script> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.plus.js"></script> 
        <!--masonry--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/masonry.pkgd.js"></script> 
        <!--media queries to js--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/enquire.js"></script> 
        <!--custom functions--> 
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom-fun.js"></script>

        <script type="text/javascript">
            $.simpleWeather({
                zipcode: '',
                woeid: '22664158',
                location: '',
                unit: 'f',
                success: function (weather) {
                    html = '<p style="color:white"><b>' + weather.city + ', ' + weather.region + '</b>';
                    //html += '<img style="float:left;" width="125px" src="'+weather.image+'">';
                    html += weather.temp + '&deg; ' + weather.units.temp + ', <span>' + weather.currently + '</span></p>';
                    //html += '<a href="'+weather.link+'">View Forecast &raquo;</a>';

                    $("#weather").html(html);
                },
                error: function (error) {
                    $("#weather").html('<p>' + error + '</p>');
                }
            });
        </script>
    </body>
</html>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Attorney General's Chambers</title>
        <meta name="description" content=" Attorney General's Chambers" />
        <meta name="keywords" content="AGC, Attorney, General, Chambers,  Attorney General's Chambers" />
        <meta name="author" content="Luqman OST" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/component.css" />

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js" type="text/javascript" ></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.custom.js" type="text/javascript"></script>

        <!--owl-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/owl.carousel.min.js" type="text/javascript"></script>
        <style>
            body {
                /* Location of the image */
                /*background-image: url(uploads/images/background/pic2.jpg);*/
                background: url(uploads/images/background/pic2.jpg);

                /* Image is centered vertically and horizontally at all times */
                background-position: center center;

                /* Image doesn't repeat */
                background-repeat: no-repeat;

                /* Makes the image fixed in the viewport so that it doesn't move when 
                   the content height is greater than the image height */
                background-attachment: fixed;

                /* This is what makes the background image rescale based on its container's size */
                background-size: cover;

                /* Pick a solid background color that will be displayed while the background image is loading */
                background-color:#464646;

                /* SHORTHAND CSS NOTATION
                 * background: url(background-photo.jpg) center center cover no-repeat fixed;
                 */
            }

            /* For mobile devices */
            @media only screen and (max-width: 767px) {
                body {
                    /* The file size of this background image is 93% smaller
                     * to improve page load speed on mobile internet connections */
                    /*background-image: url(images/background-photo-mobile-devices.jpg);*/
                    background-image: url(uploads/images/background/pic2.jpg);
                }
            }
        </style>
    </head>
    <body class="horizontal-layout">
            
        <div class="container-main">
            <!-- Push Wrapper -->
            <div class="mp-pusher" id="mp-pusher">

                <!-- mp-menu -->
                <nav id="mp-menu" class="mp-menu">
                    <div class="mp-level">
                        <h2 class="icon icon-world">Menu</h2>
                        <ul>
                            <?php
                            $menu_output = '';
                            $menu1 = OstMenuPortal::model()->findAll(array('condition' => "parent_menu=0 AND menu_type='header' AND hide_ind=0"));
                            if (sizeof($menu1) > 0) {
                                foreach ($menu1 as $row1) {
                                    $menu_output .= '<li class="icon icon-arrow-left">
                                                        <a class="icon icon-display" href="#">' . $row1->title . '</a>
                                                        ';

                                    $menu2 = OstMenuPortal::model()->findAll(array('condition' => "parent_menu=$row1->id AND menu_type='header' AND hide_ind=0"));
                                    if (sizeof($menu2) > 0) {
                                        $menu_output .= '<div class="mp-level">
                                                            <h2 class="icon icon-display">' . $row1->title . '</h2>
                                                                <ul>';
                                        foreach ($menu2 as $row2) {
                                            $menu_output .= '<li class="icon icon-arrow-left">
                                                                <a class="icon icon-phone" href="#">' . $row2->title . '</a>
                                                            </li><br>';
                                        }
                                        $menu_output .= '</ul></div>';
                                    }

                                    $menu_output .= '</li><br>';
                                }
                            }
                            echo $menu_output;
                            ?>
                            <!--                            <li class="icon icon-arrow-left">
                                                            <a class="icon icon-display" href="#">Devices</a>
                                                            <div class="mp-level">
                                                                <h2 class="icon icon-display">Devices</h2>
                                                                <ul>
                                                                    <li class="icon icon-arrow-left">
                                                                        <a class="icon icon-phone" href="#">Mobile Phones</a>
                                                                        <div class="mp-level">
                                                                            <h2>Mobile Phones</h2>
                                                                            <ul>
                                                                                <li><a href="#">Super Smart Phone</a></li>
                                                                                <li><a href="#">Thin Magic Mobile</a></li>
                                                                                <li><a href="#">Performance Crusher</a></li>
                                                                                <li><a href="#">Futuristic Experience</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="icon icon-arrow-left">
                                                                        <a class="icon icon-tv" href="#">Televisions</a>
                                                                        <div class="mp-level">
                                                                            <h2>Televisions</h2>
                                                                            <ul>
                                                                                <li><a href="#">Flat Superscreen</a></li>
                                                                                <li><a href="#">Gigantic LED</a></li>
                                                                                <li><a href="#">Power Eater</a></li>
                                                                                <li><a href="#">3D Experience</a></li>
                                                                                <li><a href="#">Classic Comfort</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="icon icon-arrow-left">
                                                                        <a class="icon icon-camera" href="#">Cameras</a>
                                                                        <div class="mp-level">
                                                                            <h2>Cameras</h2>
                                                                            <ul>
                                                                                <li><a href="#">Smart Shot</a></li>
                                                                                <li><a href="#">Power Shooter</a></li>
                                                                                <li><a href="#">Easy Photo Maker</a></li>
                                                                                <li><a href="#">Super Pixel</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>-->
                            <!--                            <li class="icon icon-arrow-left">
                                                            <a class="icon icon-news" href="#">Magazines</a>
                                                            <div class="mp-level">
                                                                <h2 class="icon icon-news">Magazines</h2>
                                                                <ul>
                                                                    <li><a href="#">National Geographic</a></li>
                                                                    <li><a href="#">Scientific American</a></li>
                                                                    <li><a href="#">The Spectator</a></li>
                                                                    <li><a href="#">The Rambler</a></li>
                                                                    <li><a href="#">Physics World</a></li>
                                                                    <li><a href="#">The New Scientist</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="icon icon-arrow-left">
                                                            <a class="icon icon-shop" href="#">Store</a>
                                                            <div class="mp-level">
                                                                <h2 class="icon icon-shop">Store</h2>
                                                                <ul>
                                                                    <li class="icon icon-arrow-left">
                                                                        <a class="icon icon-t-shirt" href="#">Clothes</a>
                                                                        <div class="mp-level">
                                                                            <h2 class="icon icon-t-shirt">Clothes</h2>
                                                                            <ul>
                                                                                <li class="icon icon-arrow-left">
                                                                                    <a class="icon icon-female" href="#">Women's Clothing</a>
                                                                                    <div class="mp-level">
                                                                                        <h2>Women's Clothing</h2>
                                                                                        <ul>
                                                                                            <li><a href="#">Tops</a></li>
                                                                                            <li><a href="#">Dresses</a></li>
                                                                                            <li><a href="#">Trousers</a></li>
                                                                                            <li><a href="#">Shoes</a></li>
                                                                                            <li><a href="#">Sale</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="icon icon-arrow-left">
                                                                                    <a class="icon icon-male" href="#">Men's Clothing</a>
                                                                                    <div class="mp-level">
                                                                                        <h2>Men's Clothing</h2>
                                                                                        <ul>
                                                                                            <li><a href="#">Shirts</a></li>
                                                                                            <li><a href="#">Trousers</a></li>
                                                                                            <li><a href="#">Shoes</a></li>
                                                                                            <li><a href="#">Sale</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <a class="icon icon-diamond" href="#">Jewelry</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="icon icon-music" href="#">Music</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="icon icon-food" href="#">Grocery</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li><a class="icon icon-photo" href="#">Collections</a></li>
                                                        <li><a class="icon icon-wallet" href="#">Credits</a></li>-->
                        </ul>
                    </div>
                </nav>
                <!-- /mp-menu -->

                <div class="scroller"><!-- this is for emulating position fixed of the nav -->
                    <div class="scroller-inner">
                        <!-- Top Navigation -->
                        <?php include 'header.php'; ?>

                        <div class="content clearfix">
                            <div class="container2">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <!--                        <div class="content clearfix">
                                                    <div class="block block-40 clearfix">
                                                        <p><a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a></p>
                                                        <nav class="codrops-demos">
                                                            <a class="current-demo" href="index.html">Demo 1: Overlapping levels</a>
                                                            <a href="index2.html">Demo 2: Covering levels</a>
                                                            <a href="index3.html">Demo 3: Overlapping levels with back links</a>
                                                        </nav>
                                                    </div>
                                                    <div class="block block-60">
                                                        <p><strong>Demo 1:</strong> Overlapping levels</p>
                                                        <p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
                                                        <p>The next level can optionally overlap or cover the previous one.</p>
                                                    </div>
                                                    <div class="info">
                                                        <p>If you enjoyed this you might also like:</p>
                                                        <p><a href="http://goo.gl/JLJ4v5">Responsive Multi-Level Menu</a></p>
                                                        <p><a href="http://goo.gl/qjbq9Y">Google Nexus Website Menu</a></p>
                                                    </div>
                                                </div>-->
                    </div><!-- /scroller-inner -->
                </div><!-- /scroller -->

            </div><!-- /pusher -->
        </div><!-- /container -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/classie.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/mlpushmenu.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.newsTicker.js" type="text/javascript"></script>
        <script>
            new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));

            $(".scroller-menu").click(function (event) {
                var current = $('.container2').scrollLeft();
                var left = $(this.hash).position().left;

                event.preventDefault();

                $('.container2').animate({
                    scrollLeft: current + left
                }, 200);
            });
        </script>
    </body>
</html>
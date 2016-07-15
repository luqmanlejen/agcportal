<?php
if (!isset(Yii::app()->session['lang']) || Yii::app()->session['lang'] == '')
    Yii::app()->session['lang'] = 'en';

if (Yii::app()->session['lang'] == 'my')
    include 'protected/messages/my.php';
else
    include 'protected/messages/en.php';
?>

<!DOCTYPE html>

<html>

    <head>

        <title>Welcome to AGC's Official Portal</title>

        <link rel="icon" type="image/jpeg" href="images/Peguam.jpg" sizes="10x10"/>

        <meta charset="iso-8859-1">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" rel="stylesheet" type="text/css" media="all">

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mediaqueries.css" rel="stylesheet" type="text/css" media="all">

        <!--[if lt IE 9]>
        <link href="../layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
        <script src="../layout/scripts/ie/css3-mediaqueries.min.js"></script>
        <script src="../layout/scripts/ie/html5shiv.min.js"></script>
        <![endif]-->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-latest.min.js"></script>
        
        <!--sticklr-->

        <link type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-sticklr-1.0.css" rel="stylesheet">

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-sticklr-1.0.pack.js"></script>

    </head>

    <body class="">

        <!-- header -->

        <?php //include 'header.php'; ?>

        <!-- content -->

        <div class="wrapper row3" id="contentwithbg">

            <div id="divbg1"></div>

            <div id="divbg2"></div>

            <div id="container">

                <?php echo $content; ?>

                <div class="clear"></div>

            </div>

        </div>

        <!-- Footer -->

        <?php // include 'footer.php'; ?>

        <!-- Scripts -->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>

        <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-latest.min.js"><\/script>\<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"><\/script>')</script>

        <script>

            jQuery(document).ready(function($) {

                $('img').removeAttr('width height');

            });

        </script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-mobilemenu.min.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>

    </body>

</html>
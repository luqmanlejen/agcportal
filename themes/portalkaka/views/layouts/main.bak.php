<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Jumbotron Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/metro.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/modernizr.custom.js"></script>
        <style>
            menu a {
                color: #AAAAAA;
                text-decoration: none;
                text-shadow: #999 0 0 1px;
            }

            menu a:hover {
                color: #FF7777;
            }

            section {
                width: 300%;
                margin-top: 0px;
                margin: 0;
                padding: 0;
            }

            #s1, #s2, #s3 {
                position: relative;
                width: 33%;
                margin: 0;
                margin-right: -5px;
                padding: 0;
                padding-top: 30px;
                display: inline-block;
            }

            .corps {
                width: 75%;
                margin: auto;
            }



            @font-face {
                font-family: 'icomoon';
                src:url('../fonts/icomoon.eot');
                src:url('../fonts/icomoon.eot?#iefix') format('embedded-opentype'),
                    url('../fonts/icomoon.woff') format('woff'),
                    url('../fonts/icomoon.ttf') format('truetype'),
                    url('../fonts/icomoon.svg#icomoon') format('svg');
                font-weight: normal;
                font-style: normal;
            }

            /* Common styles of menus */

            .dl-menuwrapper {
                width: 100%;
                max-width: 300px;
                float: left;
                position: relative;
                -webkit-perspective: 1000px;
                perspective: 1000px;
                -webkit-perspective-origin: 50% 200%;
                perspective-origin: 50% 200%;
            }

            .dl-menuwrapper:first-child {
                margin-right: 100px;
            }

            .dl-menuwrapper button {
                background: #ccc;
                border: none;
                width: 48px;
                height: 45px;
                text-indent: -900em;
                overflow: hidden;
                position: relative;
                cursor: pointer;
                outline: none;
            }

            .dl-menuwrapper button:hover,
            .dl-menuwrapper button.dl-active,
            .dl-menuwrapper ul {
                background: #aaa;
            }

            .dl-menuwrapper button:after {
                content: '';
                position: absolute;
                width: 68%;
                height: 5px;
                background: #fff;
                top: 10px;
                left: 16%;
                box-shadow: 
                    0 10px 0 #fff, 
                    0 20px 0 #fff;
            }

            .dl-menuwrapper ul {
                padding: 0;
                list-style: none;
                -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
            }

            .dl-menuwrapper li {
                position: relative;
            }

            .dl-menuwrapper li a {
                display: block;
                position: relative;
                padding: 15px 20px;
                font-size: 16px;
                line-height: 20px;
                font-weight: 300;
                color: #fff;
                outline: none;
            }

            .no-touch .dl-menuwrapper li a:hover {
                background: rgba(255,248,213,0.1);
            }

            .dl-menuwrapper li.dl-back > a {
                padding-left: 30px;
                background: rgba(0,0,0,0.1);
            }

            .dl-menuwrapper li.dl-back:after,
            .dl-menuwrapper li > a:not(:only-child):after {
                position: absolute;
                top: 0;
                line-height: 50px;
                font-family: 'icomoon';
                speak: none;
                -webkit-font-smoothing: antialiased;
                content: "\e000";
            }

            .dl-menuwrapper li.dl-back:after {
                left: 10px;
                color: rgba(212,204,198,0.3);
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }

            .dl-menuwrapper li > a:after {
                right: 10px;
                color: rgba(0,0,0,0.15);
            }

            .dl-menuwrapper .dl-menu {
                margin: 5px 0 0 0;
                position: absolute;
                width: 100%;
                opacity: 0;
                pointer-events: none;
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            .dl-menuwrapper .dl-menu.dl-menu-toggle {
                transition: all 0.3s ease;
            }

            .dl-menuwrapper .dl-menu.dl-menuopen {
                opacity: 1;
                pointer-events: auto;
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
            }

            /* Hide the inner submenus */
            .dl-menuwrapper li .dl-submenu {
                display: none;
            }

            /* 
            When a submenu is openend, we will hide all li siblings.
            For that we give a class to the parent menu called "dl-subview".
            We also hide the submenu link. 
            The opened submenu will get the class "dl-subviewopen".
            All this is done for any sub-level being entered.
            */
            .dl-menu.dl-subview li,
            .dl-menu.dl-subview li.dl-subviewopen > a,
            .dl-menu.dl-subview li.dl-subview > a {
                display: none;
            }

            .dl-menu.dl-subview li.dl-subview,
            .dl-menu.dl-subview li.dl-subview .dl-submenu,
            .dl-menu.dl-subview li.dl-subviewopen,
            .dl-menu.dl-subview li.dl-subviewopen > .dl-submenu,
            .dl-menu.dl-subview li.dl-subviewopen > .dl-submenu > li {
                display: block;
            }

            /* Dynamically added submenu outside of the menu context */
            .dl-menuwrapper > .dl-submenu {
                position: absolute;
                width: 100%;
                top: 50px;
                left: 0;
                margin: 0;
            }

            /* Animation classes for moving out and in */

            .dl-menu.dl-animate-out-1 {
                -webkit-animation: MenuAnimOut1 0.4s;
                animation: MenuAnimOut1 0.4s;
            }

            .dl-menu.dl-animate-out-2 {
                -webkit-animation: MenuAnimOut2 0.3s ease-in-out;
                animation: MenuAnimOut2 0.3s ease-in-out;
            }

            .dl-menu.dl-animate-out-3 {
                -webkit-animation: MenuAnimOut3 0.4s ease;
                animation: MenuAnimOut3 0.4s ease;
            }

            .dl-menu.dl-animate-out-4 {
                -webkit-animation: MenuAnimOut4 0.4s ease;
                animation: MenuAnimOut4 0.4s ease;
            }

            .dl-menu.dl-animate-out-5 {
                -webkit-animation: MenuAnimOut5 0.4s ease;
                animation: MenuAnimOut5 0.4s ease;
            }

            @-webkit-keyframes MenuAnimOut1 {
                0% { }
                50% {
                    -webkit-transform: translateZ(-250px) rotateY(30deg);
                }
                75% {
                    -webkit-transform: translateZ(-372.5px) rotateY(15deg);
                    opacity: .5;
                }
                100% {
                    -webkit-transform: translateZ(-500px) rotateY(0deg);
                    opacity: 0;
                }
            }

            @-webkit-keyframes MenuAnimOut2 {
                0% { }
                100% {
                    -webkit-transform: translateX(-100%);
                    opacity: 0;
                }
            }

            @-webkit-keyframes MenuAnimOut3 {
                0% { }
                100% {
                    -webkit-transform: translateZ(300px);
                    opacity: 0;
                }
            }

            @-webkit-keyframes MenuAnimOut4 {
                0% { }
                100% {
                    -webkit-transform: translateZ(-300px);
                    opacity: 0;
                }
            }

            @-webkit-keyframes MenuAnimOut5 {
                0% { }
                100% {
                    -webkit-transform: translateY(40%);
                    opacity: 0;
                }
            }

            @keyframes MenuAnimOut1 {
                0% { }
                50% {
                    -webkit-transform: translateZ(-250px) rotateY(30deg);
                    transform: translateZ(-250px) rotateY(30deg);
                }
                75% {
                    -webkit-transform: translateZ(-372.5px) rotateY(15deg);
                    transform: translateZ(-372.5px) rotateY(15deg);
                    opacity: .5;
                }
                100% {
                    -webkit-transform: translateZ(-500px) rotateY(0deg);
                    transform: translateZ(-500px) rotateY(0deg);
                    opacity: 0;
                }
            }

            @keyframes MenuAnimOut2 {
                0% { }
                100% {
                    -webkit-transform: translateX(-100%);
                    transform: translateX(-100%);
                    opacity: 0;
                }
            }

            @keyframes MenuAnimOut3 {
                0% { }
                100% {
                    -webkit-transform: translateZ(300px);
                    transform: translateZ(300px);
                    opacity: 0;
                }
            }

            @keyframes MenuAnimOut4 {
                0% { }
                100% {
                    -webkit-transform: translateZ(-300px);
                    transform: translateZ(-300px);
                    opacity: 0;
                }
            }

            @keyframes MenuAnimOut5 {
                0% { }
                100% {
                    -webkit-transform: translateY(40%);
                    transform: translateY(40%);
                    opacity: 0;
                }
            }

            .dl-menu.dl-animate-in-1 {
                -webkit-animation: MenuAnimIn1 0.3s;
                animation: MenuAnimIn1 0.3s;
            }

            .dl-menu.dl-animate-in-2 {
                -webkit-animation: MenuAnimIn2 0.3s ease-in-out;
                animation: MenuAnimIn2 0.3s ease-in-out;
            }

            .dl-menu.dl-animate-in-3 {
                -webkit-animation: MenuAnimIn3 0.4s ease;
                animation: MenuAnimIn3 0.4s ease;
            }

            .dl-menu.dl-animate-in-4 {
                -webkit-animation: MenuAnimIn4 0.4s ease;
                animation: MenuAnimIn4 0.4s ease;
            }

            .dl-menu.dl-animate-in-5 {
                -webkit-animation: MenuAnimIn5 0.4s ease;
                animation: MenuAnimIn5 0.4s ease;
            }

            @-webkit-keyframes MenuAnimIn1 {
                0% {
                    -webkit-transform: translateZ(-500px) rotateY(0deg);
                    opacity: 0;
                }
                20% {
                    -webkit-transform: translateZ(-250px) rotateY(30deg);
                    opacity: 0.5;
                }
                100% {
                    -webkit-transform: translateZ(0px) rotateY(0deg);
                    opacity: 1;
                }
            }

            @-webkit-keyframes MenuAnimIn2 {
                0% {
                    -webkit-transform: translateX(-100%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes MenuAnimIn3 {
                0% {
                    -webkit-transform: translateZ(300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes MenuAnimIn4 {
                0% {
                    -webkit-transform: translateZ(-300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes MenuAnimIn5 {
                0% {
                    -webkit-transform: translateY(40%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateY(0);
                    opacity: 1;
                }
            }

            @keyframes MenuAnimIn1 {
                0% {
                    -webkit-transform: translateZ(-500px) rotateY(0deg);
                    transform: translateZ(-500px) rotateY(0deg);
                    opacity: 0;
                }
                20% {
                    -webkit-transform: translateZ(-250px) rotateY(30deg);
                    transform: translateZ(-250px) rotateY(30deg);
                    opacity: 0.5;
                }
                100% {
                    -webkit-transform: translateZ(0px) rotateY(0deg);
                    transform: translateZ(0px) rotateY(0deg);
                    opacity: 1;
                }
            }

            @keyframes MenuAnimIn2 {
                0% {
                    -webkit-transform: translateX(-100%);
                    transform: translateX(-100%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    transform: translateX(0px);
                    opacity: 1;
                }
            }

            @keyframes MenuAnimIn3 {
                0% {
                    -webkit-transform: translateZ(300px);
                    transform: translateZ(300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @keyframes MenuAnimIn4 {
                0% {
                    -webkit-transform: translateZ(-300px);
                    transform: translateZ(-300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @keyframes MenuAnimIn5 {
                0% {
                    -webkit-transform: translateY(40%);
                    transform: translateY(40%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-in-1 {
                -webkit-animation: SubMenuAnimIn1 0.4s ease;
                animation: SubMenuAnimIn1 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-in-2 {
                -webkit-animation: SubMenuAnimIn2 0.3s ease-in-out;
                animation: SubMenuAnimIn2 0.3s ease-in-out;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-in-3 {
                -webkit-animation: SubMenuAnimIn3 0.4s ease;
                animation: SubMenuAnimIn3 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-in-4 {
                -webkit-animation: SubMenuAnimIn4 0.4s ease;
                animation: SubMenuAnimIn4 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-in-5 {
                -webkit-animation: SubMenuAnimIn5 0.4s ease;
                animation: SubMenuAnimIn5 0.4s ease;
            }

            @-webkit-keyframes SubMenuAnimIn1 {
                0% {
                    -webkit-transform: translateX(50%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes SubMenuAnimIn2 {
                0% {
                    -webkit-transform: translateX(100%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes SubMenuAnimIn3 {
                0% {
                    -webkit-transform: translateZ(-300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes SubMenuAnimIn4 {
                0% {
                    -webkit-transform: translateZ(300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @-webkit-keyframes SubMenuAnimIn5 {
                0% {
                    -webkit-transform: translateZ(-200px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0);
                    opacity: 1;
                }
            }

            @keyframes SubMenuAnimIn1 {
                0% {
                    -webkit-transform: translateX(50%);
                    transform: translateX(50%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    transform: translateX(0px);
                    opacity: 1;
                }
            }

            @keyframes SubMenuAnimIn2 {
                0% {
                    -webkit-transform: translateX(100%);
                    transform: translateX(100%);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateX(0px);
                    transform: translateX(0px);
                    opacity: 1;
                }
            }

            @keyframes SubMenuAnimIn3 {
                0% {
                    -webkit-transform: translateZ(-300px);
                    transform: translateZ(-300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @keyframes SubMenuAnimIn4 {
                0% {
                    -webkit-transform: translateZ(300px);
                    transform: translateZ(300px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
            }

            @keyframes SubMenuAnimIn5 {
                0% {
                    -webkit-transform: translateZ(-200px);
                    transform: translateZ(-200px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateZ(0);
                    transform: translateZ(0);
                    opacity: 1;
                }
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-out-1 {
                -webkit-animation: SubMenuAnimOut1 0.4s ease;
                animation: SubMenuAnimOut1 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-out-2 {
                -webkit-animation: SubMenuAnimOut2 0.3s ease-in-out;
                animation: SubMenuAnimOut2 0.3s ease-in-out;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-out-3 {
                -webkit-animation: SubMenuAnimOut3 0.4s ease;
                animation: SubMenuAnimOut3 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-out-4 {
                -webkit-animation: SubMenuAnimOut4 0.4s ease;
                animation: SubMenuAnimOut4 0.4s ease;
            }

            .dl-menuwrapper > .dl-submenu.dl-animate-out-5 {
                -webkit-animation: SubMenuAnimOut5 0.4s ease;
                animation: SubMenuAnimOut5 0.4s ease;
            }

            @-webkit-keyframes SubMenuAnimOut1 {
                0% {
                    -webkit-transform: translateX(0%);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(50%);
                    opacity: 0;
                }
            }

            @-webkit-keyframes SubMenuAnimOut2 {
                0% {
                    -webkit-transform: translateX(0%);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(100%);
                    opacity: 0;
                }
            }

            @-webkit-keyframes SubMenuAnimOut3 {
                0% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(-300px);
                    opacity: 0;
                }
            }

            @-webkit-keyframes SubMenuAnimOut4 {
                0% {
                    -webkit-transform: translateZ(0px);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(300px);
                    opacity: 0;
                }
            }

            @-webkit-keyframes SubMenuAnimOut5 {
                0% {
                    -webkit-transform: translateZ(0);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(-200px);
                    opacity: 0;
                }
            }

            @keyframes SubMenuAnimOut1 {
                0% {
                    -webkit-transform: translateX(0%);
                    transform: translateX(0%);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(50%);
                    transform: translateX(50%);
                    opacity: 0;
                }
            }

            @keyframes SubMenuAnimOut2 {
                0% {
                    -webkit-transform: translateX(0%);
                    transform: translateX(0%);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(100%);
                    transform: translateX(100%);
                    opacity: 0;
                }
            }

            @keyframes SubMenuAnimOut3 {
                0% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(-300px);
                    transform: translateZ(-300px);
                    opacity: 0;
                }
            }

            @keyframes SubMenuAnimOut4 {
                0% {
                    -webkit-transform: translateZ(0px);
                    transform: translateZ(0px);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(300px);
                    transform: translateZ(300px);
                    opacity: 0;
                }
            }

            @keyframes SubMenuAnimOut5 {
                0% {
                    -webkit-transform: translateZ(0);
                    transform: translateZ(0);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateZ(-200px);
                    transform: translateZ(-200px);
                    opacity: 0;
                }
            }

            /* No JS Fallback */
            .no-js .dl-menuwrapper .dl-menu {
                position: relative;
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }

            .no-js .dl-menuwrapper li .dl-submenu {
                display: block;
            }

            .no-js .dl-menuwrapper li.dl-back {
                display: none;
            }

            .no-js .dl-menuwrapper li > a:not(:only-child) {
                background: rgba(0,0,0,0.1);
            }

            .no-js .dl-menuwrapper li > a:not(:only-child):after {
                content: '';
            }

            /* Colors for demos */

            /* Demo 1 */
            .demo-1 .dl-menuwrapper button {
                background: #c62860;
            }

            .demo-1 .dl-menuwrapper button:hover,
            .demo-1 .dl-menuwrapper button.dl-active,
            .demo-1 .dl-menuwrapper ul {
                background: #9e1847;
            }

            /* Demo 2 */
            .demo-2 .dl-menuwrapper button {
                background: #e86814;
            }

            .demo-2 .dl-menuwrapper button:hover,
            .demo-2 .dl-menuwrapper button.dl-active,
            .demo-2 .dl-menuwrapper ul {
                background: #D35400;
            }

            /* Demo 3 */
            .demo-3 .dl-menuwrapper button {
                background: #08cbc4;
            }

            .demo-3 .dl-menuwrapper button:hover,
            .demo-3 .dl-menuwrapper button.dl-active,
            .demo-3 .dl-menuwrapper ul {
                background: #00b4ae;
            }

            /* Demo 4 */
            .demo-4 .dl-menuwrapper button {
                background: #90b912;
            }

            .demo-4 .dl-menuwrapper button:hover,
            .demo-4 .dl-menuwrapper button.dl-active,
            .demo-4 .dl-menuwrapper ul {
                background: #79a002;
            }

            /* Demo 5 */
            .demo-5 .dl-menuwrapper button {
                background: #744783;
            }

            .demo-5 .dl-menuwrapper button:hover,
            .demo-5 .dl-menuwrapper button.dl-active,
            .demo-5 .dl-menuwrapper ul {
                background: #643771;
            }

        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div style="float: right;margin-right: -15px;">
                    <menu>
                        <ul class="list-inline">
                            <li><a href="#s1"><img src="images/lang/BM.png" alt="BM"/></a></li>
                            <li><a href="#s1"><img src="images/public.png" alt="Public"/></a></li>
                            <li><a href="#s2"><img src="images/business.png" alt="Business"/></a></li>
                            <li><a href="#s3"><img src="images/staff.png" alt="AGC Staff"/></a></li>
                        </ul>
                    </menu>
                </div>
                <div style="clear:both;"></div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="images/logoAGC_eng.png" alt="Logo"/>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="container demo-1">				
                        <div class="main clearfix">
                            <div class="column">
                                <div id="dl-menu" class="dl-menuwrapper">
                                    <button class="dl-trigger">Open Menu</button>
                                    <ul class="dl-menu">
                                        <li>
                                            <a href="#">Fashion</a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="#">Men</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">Chinos &amp; Trousers</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                        <li><a href="#">T-Shirts</a></li>
                                                        <li><a href="#">Underwear</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Women</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">Knits</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Blouses</a></li>
                                                        <li><a href="#">T-Shirts</a></li>
                                                        <li><a href="#">Underwear</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Children</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Boys</a></li>
                                                        <li><a href="#">Girls</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Electronics</a>
                                            <ul class="dl-submenu">
                                                <li><a href="#">Camera &amp; Photo</a></li>
                                                <li><a href="#">TV &amp; Home Cinema</a></li>
                                                <li><a href="#">Phones</a></li>
                                                <li><a href="#">PC &amp; Video Games</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Furniture</a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="#">Living Room</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Sofas &amp; Loveseats</a></li>
                                                        <li><a href="#">Coffee &amp; Accent Tables</a></li>
                                                        <li><a href="#">Chairs &amp; Recliners</a></li>
                                                        <li><a href="#">Bookshelves</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Bedroom</a>
                                                    <ul class="dl-submenu">
                                                        <li>
                                                            <a href="#">Beds</a>
                                                            <ul class="dl-submenu">
                                                                <li><a href="#">Upholstered Beds</a></li>
                                                                <li><a href="#">Divans</a></li>
                                                                <li><a href="#">Metal Beds</a></li>
                                                                <li><a href="#">Storage Beds</a></li>
                                                                <li><a href="#">Wooden Beds</a></li>
                                                                <li><a href="#">Children's Beds</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Bedroom Sets</a></li>
                                                        <li><a href="#">Chests &amp; Dressers</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Home Office</a></li>
                                                <li><a href="#">Dining &amp; Bar</a></li>
                                                <li><a href="#">Patio</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Jewelry &amp; Watches</a>
                                            <ul class="dl-submenu">
                                                <li><a href="#">Fine Jewelry</a></li>
                                                <li><a href="#">Fashion Jewelry</a></li>
                                                <li><a href="#">Watches</a></li>
                                                <li>
                                                    <a href="#">Wedding Jewelry</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Engagement Rings</a></li>
                                                        <li><a href="#">Bridal Sets</a></li>
                                                        <li><a href="#">Women's Wedding Bands</a></li>
                                                        <li><a href="#">Men's Wedding Bands</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- /dl-menuwrapper -->
                            </div>
                        </div>
                    </div>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="1Akses" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </nav>        

        <?php echo $content; ?>

        <div class="container">
            <hr>

            <footer>
                <p>&copy; 2015 Company, Inc.</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/jquery.min.js"><\/script>')</script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/jquery.dlmenu.js"></script>
        <script>
            $(function () {
                $('menu a').bind('click', function (event) {
                    var $anchor = $(this);
                    $('body, html').stop().animate({
                        scrollLeft: $($anchor.attr('href')).offset().left
                    }, 1000);
                    event.preventDefault();
                });

                $('#dl-menu').dlmenu();
            });
        </script>
    </body>
</html>
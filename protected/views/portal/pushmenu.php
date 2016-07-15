<style>

    .cbp-spmenu {
        background:#466289; /* syuk 21062015 */
        position: fixed;
        color : white;
    }

    .cbp-spmenu-horizontal {
        width: 100%;
        height: 541px;
        left: 0;
        z-index: 1000;
        /*overflow: hidden;*/
    }

    .cbp-spmenu-bottom {bottom: -461px;}

    .cbp-spmenu-bottom.cbp-spmenu-open {bottom: 0px;}

    .cbp-spmenu,
    .cbp-spmenu-push {
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .copyright{
        max-width:1200px;
        margin:0 auto;
        height:30px;
        line-height:30px;
        font-size : 0.8em;
    }

    #showBottom{cursor: pointer;}

    .pushmenuheader{background:#466289;}

    .pushmenucontent{
        max-width:1200px;
        margin:0 auto;
        padding: 40px 0;
    }

    .pushmenucontent a {display:block;}

    #footer2 a {text-decoration: none;color:white;}
    #footer2 li {display : inline;padding-left:5px;margin-left:5px;border-left:1px solid white;}
    #footer2 li:first-child{border:0;}



    .qs {
        //background-color: #02bdda;
        border-radius: 16px;
        color: #e3fbff;
        cursor: default;
        display: inline-block;
        font-family: 'Helvetica',sans-serif;
        font-size: 18px;
        font-weight: bold;
        height: 30px;
        line-height: 30px;
        position: relative;
        text-align: center;
        width: 30px;
    }
    .qs .popover {
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 5px;
        bottom: 30px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
        color: #000;
        display: none;
        font-size: 14px;
        font-family: 'Helvetica',sans-serif;
        left: -145px;
        padding: 0px 10px;
        position: absolute;
        width: 300px;
        z-index: 4;
    }
    .qs .popover:before {
        border-top: 7px solid rgba(255, 255, 255, 0.5);
        border-right: 7px solid transparent;
        border-left: 7px solid transparent;
        bottom: -7px;
        content: '';
        display: block;
        left: 50%;
        margin-left: -7px;
        position: absolute;
    }
    .qs .popover {
        display: block;
        -webkit-animation: fade-in .3s linear 1, move-up .3s linear 1;
        -moz-animation: fade-in .3s linear 1, move-up .3s linear 1;
        -ms-animation: fade-in .3s linear 1, move-up .3s linear 1;
    }

    @-webkit-keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @-moz-keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @-ms-keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @-webkit-keyframes move-up {
        from {
            bottom: 30px;
        }
        to {
            bottom: 42px;
        }
    }
    @-moz-keyframes move-up {
        from {
            bottom: 30px;
        }
        to {
            bottom: 42px;
        }
    }
    @-ms-keyframes move-up {
        from {
            bottom: 30px;
        }
        to {
            bottom: 42px;
        }
    }

</style>

<?php 
$click = 'Click here for more information';
if (Yii::app()->session['lang'] == 'my'){
    $click = 'Klik di sini untuk maklumat lanjut';
}
?>
<nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-bottom" id="cbp-spmenu-s4">

    <?php include 'online.php'; ?>    

    <div class="pushmenuheader">
        <div class="copyright">
            <div class="one_third first">
                <a href="index.php?r=login/index" target="_blank" style="color:white;"><?php echo $bestviewed; ?></a>
            </div>
            <div class="one_third">
                <span class="qs" onclick='test()' style="margin: 0px 46%;">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/menu.png" id="showBottom" alt="menu push">
                    <span id="popover" class="popover above"> <?php echo $click; ?> </span>
                </span>
            </div>
            <div class="one_third" style="text-align:right;">
                <?php //include 'clock.php'; ?>
                <div class="weather">
                    <!--<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon/storm.png" class="storm">-->
                    <b>Putrajaya, Malaysia</b> 75.0&deg; F (32.9&deg; C)
                </div>
                <!--<a href="http://twitter.com/AGCPutrajaya" target="_blank"><img src="images/twitter.png" style="height:20px;"></a>-->
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="wrapper" style="height:430px;overflow:hidden;">
        <div id="footer" class="clear">
            <div class="one_sixth first">
                <h2 class="footer_title push10"><?php echo $floatbtmmenu1; ?></h2>
                <nav class="footer_nav"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(96); ?></ul></nav>
            </div>
            <div class="one_sixth">
                <h2 class="footer_title push10"><?php echo $floatbtmmenu2; ?></h2>
                <nav class="footer_nav"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(98); ?></ul></nav>
            </div>
            <div class="one_sixth">
                <h2 class="footer_title push10"><?php echo $floatbtmmenu3; ?></h2>
                <nav class="footer_nav"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(100); ?></ul></nav>
            </div>
            <div class="one_sixth">
                <h2 class="footer_title push10"><?php echo $floatbtmmenu4; ?></h2>
                <nav class="footer_nav">
                    <ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(102); ?></ul>
                </nav>
                <br>
                <br>
                <h2 class="footer_title push10"><?php echo $floatbtmmenu4b; ?></h2>
                <nav class="footer_nav">
                    <ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(104); ?></ul>
                </nav>
            </div>
            <div class="one_sixth">
                <h2 class="footer_title push10">Polls</h2>
                <nav class="footer_nav">
<!--                    <div class="one_sixth first"><input type="radio" name="poll"></div>
                    <div class="five_sixth">Excellent</div>
                    <div class="clear"></div>
                    
                    <div class="one_sixth first"><input type="radio" name="poll"></div>
                    <div class="five_sixth">Good</div>
                    <div class="clear"></div>
                    
                    <div class="one_sixth first"><input type="radio" name="poll"></div>
                    <div class="five_sixth">There's room for improvement</div>
                    <div class="clear"></div>
                    
                    <div class="one_sixth first"><input type="radio" name="poll"></div>
                    <div class="five_sixth">Less Satisfactory</div>
                    <div class="clear"></div><br>-->

                    <ul class="nospace"><?php echo PortalElement::GetPollMenu(); ?></ul>

                    <a href="#" class="button small grey">Vote</a>
                    <a href="#" class="button small orange">Result</a>
                </nav>
            </div>
            <div class="one_sixth">
                <h2 class="footer_title push10"><?php echo $floatbtmstatistic; ?></h2>
                <nav class="footer_nav push20 footer_visitor">
                    <ul class="nospace">
                        <li><?php echo $visittoday; ?> : <?php echo OstVisitor::model()->GetToday(); ?></li>
                        <li><?php echo $visityesterday; ?> : <?php echo OstVisitor::model()->GetYesterday(); ?></li>
                        <li><?php echo $visitthisweek; ?> : <?php echo OstVisitor::model()->GetThisWeek(); ?></li>
                        <li><?php echo $visitlastweek; ?> :  <?php echo OstVisitor::model()->GetLastWeek(); ?></li>
                        <li><?php echo $visitthismonth; ?> : <?php echo OstVisitor::model()->GetThisMonth(); ?></li>
                        <li><?php echo $visitlastmontth; ?> : <?php echo OstVisitor::model()->GetLastMonth(); ?></li>
                        <li><?php echo $visitall; ?> : <?php echo OstVisitor::model()->GetAll(); ?></li>
                    </ul>
                </nav>
                <h2 class="footer_title push10"><?php echo $floatbtmlastupdated; ?></h2>
                <nav class="footer_nav"><?php echo OstArticles::model()->get_last_updated(); ?></nav>
            </div>
        </div>
    </div>

    <div style="background: #000;height:30px;line-height:30px;font-size:0.8em;">
        <div style="max-width: 1200px;margin : 0 auto;">
            <div class="one_half first"><?php echo $copyright; ?></div>
            <div class="one_half" style="text-align:right;" id="footer2"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(465); ?></ul></div>
            <div class="clear"></div>
        </div>
    </div>
    <div style="background: #000;height:60px;line-height:30px;font-size:0.8em;">
        <div style="max-width: 1200px;margin : 0 auto;">
            <div class="one_half first"><?php echo $copyright; ?></div>
            <div class="one_half" style="text-align:right;" id="footer2"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(465); ?></ul></div>
            <div class="clear"></div>
        </div>
    </div>
    
   <div class="one_half" style="text-align:right;margin-top:100px;position:relative;top:10px;"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(465); ?></ul></div> 
</nav>


<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.custom.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/classie.js"></script>
<script>
                    var menuBottom = document.getElementById('cbp-spmenu-s4'),
                            showBottom = document.getElementById('showBottom'),
                            body = document.body;

                    showBottom.onclick = function () {
                        classie.toggle(this, 'active');
                        classie.toggle(menuBottom, 'cbp-spmenu-open');
                        jQuery('#popover').hide();
                    };
</script>
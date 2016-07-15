<style>
    #footer2 a {text-decoration: none;}
    #footer2 li {display : inline;padding-left:5px;margin-left:5px;border-left:1px solid white;}
    #footer2 li:first-child{border:0;}
</style>
<div class="wrapper bgblue">
    <div id="footer" class="clear">
        <div class="one_quarter first">
            <h2 class="footer_title"><?php echo $footertitle1; ?></h2>
            <nav class="footer_nav">
                <ul class="nospace">
                    <?php
                    $online_arr = PortalElement::GetMediaList('online');
                    if (sizeof($online_arr) > 0) {
                        foreach ($online_arr as $oarr) {
                            echo '<li><a href="' . $oarr['url'] . '" target="_blank">' . $oarr['title'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="one_quarter">
            <h2 class="footer_title"><?php echo $footertitle2; ?></h2>
            <ul id="ft_gallery" class="nospace spacing clear">
                <li class="one_third first"><a href="https://www.malaysia.gov.my/" target="_blank"><img alt="MyGovernment" title= MyGoverment src="images/agencies/mygov.png"></a></li>
                <li class="one_third"><a href="http://www.spkp.gov.my/" target="_blank"><img alt="SPKP" title= "SPKP" src="images/agencies/spkp.png"></a></li>
                <li class="one_third"><a href="http://www.epsa.gov.my/" target="_blank"><img alt="EPSA" title="EPSA" src="images/agencies/epsa.png"></a></li>

                <li class="one_third first"><a href="http://www.pemudah.gov.my/home" target="_blank"><img alt="PEMUDAH"  title="PERMUDAH" src="images/agencies/pemudah.png"></a></li>
                <li class="one_third"><a href="http://www.jkjr.gov.my/" target="_blank"><img alt="JKJR" title="JKJR" src="images/agencies/jkjr.png"></a></li>
                <li class="one_third"><a href="http://www.pemandu.gov.my/gtp/" target="_blank"><img alt="Government Transformation Programme" title="Government Transformation Programme"src="images/agencies/gtp.png"></a></li>

                <li class="one_third first"><a href="http://www.iim.org.my/" target="_blank"><img alt="IIM" title="Institut Integriti Malaysia" src="images/agencies/iim.png"></a></li>
                <li class="one_third"><a href="http://www.bph.gov.my/" target="_blank"><img alt="BPH" title="Bahagian Pengurusan Hartanah" src="images/agencies/bph.png"></a></li>
                <li class="one_third"><a href="http://www.myideas.my/" target="_blank"><img alt="MyIdeas" title="MyIDEAS" src="images/agencies/myideas.png"></a></li>

                <li class="one_third first"><a href="http://www.mscmalaysia.my/" target="_blank"><img alt="MSC" title="Multimedia Super Corridor" src="images/agencies/msc.png"></a></li>
                <li class="one_third"><a href="http://www.spr.gov.my/" target="_blank"><img alt="SPR" src="images/agencies/spr.png"></a></li>
                <li class="one_third"><a href="http://www.myeg.com.my/" target="_blank"><img alt="MyEG" src="images/agencies/myeg.png"></a></li>
            </ul>
        </div>
        <div class="one_quarter">
            <h2 class="footer_title">Twitter</h2>
            <a class="twitter-timeline"  href="https://twitter.com/visitklofficial" data-widget-id="608281544172539904">Tweets by @visitklofficial</a>
            <script>
                !function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");
            </script>
        </div>
        <div class="one_quarter">
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
<div class="wrapper row4">
    <div id="footer2">
        <div class="one_half first"><?php echo $bestviewed; ?><br><?php echo $copyright; ?></div>
        <div class="one_half" style="text-align:right;"><ul class="nospace"><?php echo PortalElement::GetHomeBottomMenu(465); ?></ul></div>
        <div class="clear"></div>
    </div>
</div>
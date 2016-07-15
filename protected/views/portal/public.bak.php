<style>

    #public_caseinfo_wrapper{
        height:100px;
        margin-right:20px;
        background-color:#466289;
        background-image:url('images/scale.png');
        background-repeat : no-repeat;
        background-position:185px 40px;
		border-radius: 3px;
		
    }

    #public_feedback_wrapper{
        height:100px;
        margin-right:20px;
        background:#2D5A78;
        background-image:url('images/feedback.png');
        background-repeat : no-repeat;
        background-position:185px 40px;
		border-radius: 3px; 
    }

    #public_cnc_wrapper{
        height:100px;
        background:#FFB739;
        background-image:url('images/news.png');
        background-repeat : no-repeat;
        background-position:205px 40px;
		border-radius: 3px;
    }

    #public_inner_box, .public_box_title, #public_event_title{
        padding : 10px;
        color: #FFF;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
        letter-spacing: 0.1em;
        font-size: 1.3em;
    }
    .public_latest_list li{
        color:white;
        font-size: 0.95em;
        border-bottom : 1px dashed black;
        margin-bottom:10px;
        padding-bottom : 10px;
		
    }
    .public_latest_list li:last-child{border:0;}
    .public_box_title{padding: 0;}
    .public_latest_list a{color:inherit;text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);}
    .public_latest_list li:hover{color: #FFB739; text-decoration: underline; text-shadow: 0px 0px 0px rgba(0, 0, 0, 1);}

    .public_event_box{
        height:70px;
        padding : 10px 20px;
        font-size: 0.95em;
        border-left : 3px solid gray;
        line-height: 1.5em;
		 }

    #public_event{position:relative;}
    #public_event .owl-controls .owl-buttons .owl-next, 
    #public_event .owl-controls .owl-buttons .owl-prev{
        position:absolute;
        top:auto;
        bottom : 0;
        left:auto;
    }
    #public_event .owl-controls .owl-buttons .owl-next{right:0;}
    #public_event .owl-controls .owl-buttons .owl-prev{right:20px;}

    .public_event_box a{color:inherit;}
    .public_event_box a:hover{color: #2D5A78;}

    #public_event_title{padding:0; color: black;padding-top:15px;}

    .divnorecord{text-align: center;font-size: 1.3em;letter-spacing: 0.1em;}

</style>

<div class="one_third first push20" style="height:40px;line-height:40px;"><div class="itemtitle"><?php echo $public; ?></div></div>
<div class="two_third push20">
    <input type="text" placeholder="<?php echo $search; ?>" class="itemsearch">
    <div class="weather">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon/storm.png" class="storm">
        <b>Putrajaya, Malaysia</b><br>75.0&deg; F (23.9&deg; C)
    </div>
</div>
<div class="clear"></div>

<div class="two_third first nogutter">

    <!-- Banner -->
    <div class="itemsmaller push20" style="background:white;height:130px;opacity:1.0; ">
        <section class="main_slider">
            <div class="rslides_container clear">
                <ul class="rslides clear" id="rslides">
                    <?php
                    $slider_arr = PortalElement::GetMediaList('slider');
                    if (sizeof($slider_arr) > 0) {
                        foreach ($slider_arr as $sarr) {
                            if ($sarr['url'] == '')
                                echo '<li><img src="' . $sarr['img'] . '" title="' . $sarr['title'] . '"></li>';
                            else
                                echo '<li><a href="' . $sarr['url'] . '" target="_blank"><img src="' . $sarr['img'] . '" title="' . $sarr['title'] . '"></a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>

    <!-- Case Information -->
    <div class="itemsmaller push20 nogutter one_third first">
        <a href="index.php?r=portal2/left&menu_id=YjhQYnRuaHU3bFFXMmNldm1KdGErZz09">
            <div id="public_caseinfo_wrapper">
                <div id="public_inner_box">
                    <?php echo $publiccase; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- Feedback -->
    <div class="itemsmaller push20 nogutter one_third">
        <a href="index.php?r=portal2/left&menu_id=S1lPMk5MOHM3WUJ4czJacm5HRFptQT09">
            <div id="public_feedback_wrapper">
                <div id="public_inner_box">
                    <?php echo $publicfeedback; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- CNC -->
    <div class="itemsmaller push20 nogutter one_third">
        <a href="http://www.agc.gov.my/cnc/" target="_blank">
            <div id="public_cnc_wrapper">
                <div id="public_inner_box">
                    Chambers News Channel
                </div>
            </div>
        </a>
    </div>

    <div class="clear"></div>

    <!-- AGC Events -->
    <div class="itemsmaller" style="background:white;height:110px;border-radius:3px;">
        <div class="pad10">
            <div class='one_fifth first'><div id="public_event_title"><?php echo $publicevent; ?></div></div>
            <div class='four_fifth'>
                <?php
                $event_arr = PortalElement::GetArticleList('192');
                if (sizeof($event_arr) > 0) {
                    echo '<div id="public_event" class="owl-carousel owl-theme">';
                    foreach ($event_arr as $earr) {
                        echo "<div class='public_event_box'><a href='" . $earr['url'] . "'>" . $earr['title'] . " &raquo;</a></div>";
                    }
                    echo '</div>';
                } else {
                    if (Yii::app()->session['lang'] == 'my')
                        echo '<div class="divnorecord" style="line-height:90px;">Tiada aktiviti baru</div>';
                    else
                        echo '<div class="divnorecord" style="line-height:90px;">No new event</div>';
                }
                ?>
            </div>
            <div class='clear'></div>
        </div>
    </div>

</div>

<div class="one_third nogutter">

    <!-- Latest -->
    <div class="itemsmaller" style="background:#30839f;height:380px;margin-left:20px;color:white;">
        <div class="pad10">
            <div class="public_box_title"><?php echo $publiclatest; ?></div>
            <?php
            $latest_arr = PortalElement::GetArticleList('190,194,209');
            if (sizeof($latest_arr) > 0) {
                //echo '<marquee  behavior="scroll" direction="up" height="330" scrollamount="3" onMouseOver="this.setAttribute(\'scrollamount\', 0, 0);" OnMouseOut="this.setAttribute(\'scrollamount\', 3, 0);"><ul class="nospace public_latest_list">';
                echo '<ul class="nospace public_latest_list">';
                foreach ($latest_arr as $larr) {
                    echo '<li><a href="' . $larr['url'] . '">' . $larr['title'] . ' &raquo;</a></li>';
                }
                echo '</ul></marquee>';
            } else {
                if (Yii::app()->session['lang'] == 'my')
                    echo '<div class="divnorecord"><br><br><br><br>Tiada pengumuman / berita / <br>tender & sebutharga baru</div>';
                else
                    echo '<div class="divnorecord"><br><br><br><br>No new announcement / news / <br>tender & quotation</div>';
            }
            ?>
        </div>
    </div>

</div>

<script>

    jQuery.noConflict()(function($) {

        $("#public_event").owlCarousel({
            autoPlay: false,
            navigation: true,
            slideSpeed: 1000,
            items: 2,
            pagination: false,
            navigationText: ["<img src='images/arrow/left_black.png'>", "<img src='images/arrow/right_black.png'>"],
        });

    });

</script>
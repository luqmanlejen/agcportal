<style>

    #public_caseinfo_wrapper{
        height:100px;
        margin-right:20px;
        background-color:#466289;
        background-image:url('images/case1.png');
        background-repeat : no-repeat;
        background-position:120px 55px;
        border-radius: 3px;

    }

    #public_feedback_wrapper{
        height:110px;
        //margin-right:20px;
        background:#2D5A78;
        background-image:url('images/feedback.png');
        background-repeat : no-repeat;
        background-position:130px 40px;
        border-radius: 3px; 
    }

    #public_lom_wrapper{
        height:100px;
        margin-right:20px;
        background:#22796C;
        background-image:url('images/lom.png');
        background-repeat : no-repeat;
        background-position:125px 40px;
        border-radius: 3px;
    }

    #public_stat_wrapper{
        height:110px;
        background:#07A7E0;
        margin-right:20px;
        background-image:url('images/stats.png');
        background-repeat : no-repeat;
        background-position:110px 40px;
        border-radius: 3px;
    }

    #public_directory_wrapper{
        height:100px;
        background:#3987FF;
        margin-right:20px;
        background-image:url('images/direktori.png');
        background-repeat : no-repeat;
        background-position:110px 40px;
        border-radius: 3px;
    }

    #public_gazette_wrapper{
        height:100px;
        background:#1D1FEF;
        margin-right:20px;
        background-image:url('images/egazzete.png');
        background-repeat : no-repeat;
        background-position:125px 35px;
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

    .public_directory_box{
        height:70px;
        padding : 10px 20px;
        font-size: 0.95em;
        border-left : 3px solid gray;
        line-height: 1.5em;
    }

    .searchInput{
        position: absolute;
        margin-top: 4%;
        padding-left: 44%;
    }

    img.qr_code_thumbnail{
        width: 32px;
        height: 32px;
    }

    ul.enlarge{
        list-style-type:none; /*remove the bullet point*/
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

    /*ul.enlarge img{
    give the thumbnails a frame
    background-color:#eae9d4; frame colour
    padding: 6px; frame size
    add a drop shadow to the frame
    -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    box-shadow: 0 0 6px rgba(132, 132, 132, .75);
    and give the corners a small curve
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    }*/

    #enlarge_img{
        //give the thumbnails a frame
        background-color:#eae9d4; //frame colour
        padding: 2px; //frame size
        //padding-top: 10px;
        margin-top: 9%;
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

<div class="one_third first push20" style="height:40px;line-height:40px;"><div class="itemtitle"><?php echo $public; ?></div></div>
<div class="two_third push20">
    <div class="searchInput">
        <fieldset>
            <legend style="display: none"></legend>
            <input id="radio1_1" type="radio" type="radio" name="search_type" value="1">
            <label for="radio1_1">1Akses</label>
            &nbsp;&nbsp;&nbsp;
            <input id="radio1_2" type="radio" type="radio" name="search_type" checked="checked" value="2">
            <label for="radio1_2">AGC Search</label>
        </fieldset>
    </div>
    <form target="_blank" id="frmsearch">
        <label for="agcsearch" style="display:none">1</label><input id="agcsearch" style="margin-bottom:5%;" type="text" placeholder="<?php echo $search; ?>" class="itemsearch" name="search_keyword">
    </form>
    <iframe id="1akses" class="itemsearch" style="margin-top:-5%; margin-bottom:-5%;" src = "http://1akses.malaysia.gov.my/OneGovSearchApps/widgetLoc/search.html?101110000001" width = "350" height = "100" frameborder="0"></iframe>
    <!--<iframe id="1akses" class="itemsearch" style="margin-top:-5%; margin-bottom:-5%;" src="http://1akses.malaysia.gov.my/OneGovSearchApps/widgetLoc/widgetUI.html?eyJzdWNjZXNzIjp0cnVlLCJjb2RlIjoyMDAsIm1lc3NhZ2UiOiJBY3Rpb24gZG9uZSBzdWNjZXNzZnVsbHkuIiwicmVzdWx0cyI6W3sid2lkZ2V0X2lkIjoid2ctMGUyMWVmMGYtNmM1Mi00OTQ0LTgxOWQtZWY3MmE5YWVlZWI0Iiwic2Nybl9zaXplX3NlYXJjaF93IjozNTAsInNjcm5fc2l6ZV9zZWFyY2hfaCI6NTAsInNjcm5fc2l6ZV9yZXN1bHRfdyI6MCwic2Nybl9zaXplX3Jlc3VsdF9oIjowLCJhY2Nlc3NfY29kZSI6IjE0NDAwMDAwMDAwMSIsImJnX2NvbG9yIjoidHJhbnNwYXJlbnQiLCJmb250X3NpemUiOjIwLCJ0b29sdGlwX3RleHQiOiJLUEROS0siLCJpc19wb3B1cF9zcmNoX3JzbHQiOmZhbHNlLCJpc19sYW5nX21hbGF5IjpmYWxzZSwidXJsX3RvX2Rpc3Bfd2lkZ2V0IjoiaHR0cCUzQSUyRiUyRnd3dy5rcGRua2suZ292Lm15JTJGIiwic2VhcmNoX2xhYmVsX3RleHQiOiIxQWtzZXMlMjBTZWFyY2glMjBFbmdpbmUiLCJpc19sb2NhbF9kZWZhdWx0X2luZCI6dHJ1ZSwiaXNfbG9nb19kaXNhYmxlIjp0cnVlLCJhZ2VuY3lfaWQiOiIxNDQwMDAwMDAiLCJjb2xsZWN0aW9uX2lkIjoiY24tYmM4NmViOGQtMzJmYi00ZmQ3LTk4Y2ItYTk3NmM0MmEyNzRmIiwiYWdlbmN5X25hbWUiOiJLRU1FTlRFUklBTiUyMFBFUkRBR0FOR0FOJTIwREFMQU0lMjBORUdFUkklMkMlMjBLT1BFUkFTSSUyMERBTiUyMEtFUEVOR0dVTkFBTiIsImdsb2JhbF9uYW1lIjoibWFzdGVyX2dsb2JhbCJ9XX0="></iframe>-->   
    <div style="float: right; padding-top: -3.5%; margin-top: -1.3%;">
        <ul class="enlarge">
            <a href="http://www.twitter.com/agcputrajaya" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon/twitter.png" class="twitter" alt="twitter agc"></a>&nbsp;&nbsp;&nbsp;
            <a href="http://agc-blog.agc.gov.my/agc-blog/" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon/blog.png" class="blog" alt="blog agc"></a>&nbsp;&nbsp;&nbsp;

            <li>
                <img src="images/qr_code.jpg" class="qr_code_thumbnail" alt="qr_code">
                &nbsp;&nbsp;&nbsp;
                <span><img src="images/qr_code.jpg" id="enlarge_img" alt="qr_code"></span>
            </li>
        </ul>
    </div>
    <!--    <div class="weather">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon/storm.png" class="storm">
            <b>Putrajaya, Malaysia</b><br>75.0&deg; F (23.9&deg; C)
        </div>-->
</div>
<div class="clear"></div>

<div class="two_third first nogutter">

    <!-- Banner -->
    <div class="itemsmaller push20" style="background:white;height:130px;opacity:1.0; ">
        <section class="main_slider">
            <div class="rslides_container clear">
                <ul class="rslides clear" id="rslides">
                    <?php
                    $count = 0;
                    $slider_arr = PortalElement::GetMediaList('slider');
                    if (sizeof($slider_arr) > 0) {
                        foreach ($slider_arr as $sarr) {
                            if ($sarr['url'] == '')
                                echo '<li><img src="' . $sarr['img'] . '" title="' . $sarr['title'] . '" alt="banner'.$count.'"></li>';
                            else
                                echo '<li><a href="' . $sarr['url'] . '" target="_blank"><img src="' . $sarr['img'] . '" title="' . $sarr['title'] . '" alt="banner'.$count.'"></a></li>';
                        $count++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>

    <!-- Case Information -->
    <div class="itemsmaller push20 nogutter one_quarter first">
        <a href="index.php?r=portal2/left&menu_id=YjhQYnRuaHU3bFFXMmNldm1KdGErZz09">
            <div id="public_caseinfo_wrapper">
                <div id="public_inner_box">
                    <?php echo $publiccase; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- e-gazette -->
    <div class="itemsmaller push20 nogutter one_quarter">
        <a href='http://www.federalgazette.agc.gov.my/' target="_blank()">
            <div id="public_gazette_wrapper">
                <div id="public_inner_box">
                    <?php echo $egazzete; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- LOM -->
    <div class="itemsmaller push20 nogutter one_quarter">
        <a href="index.php?r=portal2/lom&menu_id=b21XYmExVUhFOE4wempZdE1vNUVKdz09">
            <div id="public_lom_wrapper">
                <div id="public_inner_box">
                    <?php echo $lom; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- CNC -->
    <div class="itemsmaller push20 nogutter one_quarter">
        <a href="index.php?r=portal2/directory&menu_id=amZIelErcVQzcFozdUgwNjY5K3phQT09">
            <div id="public_directory_wrapper">
                <div id="public_inner_box">
                    <?php echo $directory; ?>
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
    <div class="itemsmaller" style="background:#30839f;height:250px;margin-left:20px;color:white;">
        <div class="pad10">
            <div class="public_box_title"><?php echo $publiclatest; ?></div>
            <?php
            $latest_arr = PortalElement::GetArticleListLatest('190,194');
            if (sizeof($latest_arr) > 0) {
                //echo '<marquee  behavior="scroll" direction="up" height="200" scrollamount="3" onMouseOver="this.setAttribute(\'scrollamount\', 0, 0);" OnMouseOut="this.setAttribute(\'scrollamount\', 3, 0);"><ul class="nospace public_latest_list">';
                echo '<marquee  behavior="scroll" direction="up" height="200" scrollamount="3" onMouseOver="this.stop();" OnMouseOut="this.start();"><ul class="nospace public_latest_list">';
                echo '<ul class="nospace public_latest_list">';
                foreach ($latest_arr as $larr) {
                    echo '<li><a href="' . $larr['url'] . '">' . $larr['title'] . ' &raquo;</a></li>';
                }
                echo '</ul></marquee>';
            } else {
                if (Yii::app()->session['lang'] == 'my')
                    echo '<div class="divnorecord"><br><br><br><br>Tiada pengumuman / berita</div>';
                else
                    echo '<div class="divnorecord"><br><br><br><br>No new announcement / news</div>';
            }
            ?>
        </div>
    </div>    

    <div style="margin-left:20px; margin-top: 20px;">
        <!-- Statistics -->
        <div class="itemsmaller nogutter one_half">
            <a href='index.php?r=portal2/left&menu_id=QWxMam5xNWxsVDZqZXpyU2UvRTFCZz09'>
                <div id="public_stat_wrapper">
                    <div id="public_inner_box">
                        <?php echo $statistik; ?>
                    </div>
                </div>
            </a>
        </div>

        <!-- Feedback -->
        <div class="itemsmaller nogutter one_half">
            <a href="index.php?r=portal2/left&menu_id=S1lPMk5MOHM3WUJ4czJacm5HRFptQT09">
                <div id="public_feedback_wrapper">
                    <div id="public_inner_box">
                        <?php echo $publicfeedback; ?>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<script>

    jQuery.noConflict()(function ($) {

        $("#public_event").owlCarousel({
            autoPlay: true,
            navigation: true,
            slideSpeed: 1000,
            items: 2,
            pagination: false,
            navigationText: ["<img src='images/arrow/left_black.png' alt='left black'>", "<img src='images/arrow/right_black.png' alt='right black'>"],
        });

        $('#1akses').hide();
        //$('#agcsearch').hide();
        $(".searchInput").change(function () {
            var search_type = $('input[name=search_type]:checked', '.searchInput').val();
            if (search_type == 1) {
                $('#1akses').show();
                $('#agcsearch').hide();
            }

            else if (search_type == 2) {
                $('#agcsearch').show();
                $('#1akses').hide();
            }
        });

        $("#frmsearch").submit(function (e) {

            //var search_type = $('input[name=search_type]:checked', '#frmsearch').val();

            var search_keyword = $('[name=search_keyword]').val();

            if (search_keyword != '' && search_keyword.length > 2) {

//                if (search_type == 1) {
//
                $('#frmsearch').attr('action', 'index.php?r=portal2/search');
//
                $('#frmsearch').attr('method', 'post');
//
//                }
//
//                else if (search_type == 2) {

//                    $('#frmsearch').attr('action', 'http://www.google.com#q=' + search_keyword);

//                    $('#frmsearch').attr('method', 'get');


            }
            else {

                alert('Keyword must be more than 3 characters');

                return false;
            }

        });
    });
</script>
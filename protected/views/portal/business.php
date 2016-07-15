<style>

    #business_finance_wrapper{
        background-color: #990033;
        height:100px;
        background-image:url('images/bank.png');
        background-repeat : no-repeat;
        background-position:340px 40px;
        border-radius:3px;
    }

    #business_law_wrapper{
        background:#ff5151;
        height:100px;
        margin-right:20px;
        background-image:url('images/investment.png');
        background-repeat : no-repeat;
        background-position:320px 40px;
        border-radius:3px;
    }

    #business_inner_box, #business_tender_title{
        padding : 10px;
        color: #FFF;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
        letter-spacing: 0.1em;
        font-size: 1.3em;
    }

    #business_tender_title{padding:0;padding-top:15px;color:#b30000;}

    .business_tender_box{
        height:90px;
        padding : 0px 20px;
        font-size: 0.95em;
        border-left : 3px solid gray;
        line-height: 1.5em;
        color:white;
    }

    #business_tender{position:relative;}
    #business_tender .owl-controls .owl-buttons .owl-next, 
    #business_tender .owl-controls .owl-buttons .owl-prev{
        position:absolute;
        top:auto;
        bottom : 0;
        left:auto;
    }
    #business_tender .owl-controls .owl-buttons .owl-next{right:0;}
    #business_tender .owl-controls .owl-buttons .owl-prev{right:20px;}

    .business_tender_box a{color:black;}
    .business_tender_box a:hover{color: #b30000;}
    
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

<div class="one_third first push20" style="height:40px;line-height:40px;"><div class="itemtitle"><?php echo $business; ?></div></div>
<div class="two_third push20">
    <div class="searchInput">
        <fieldset>
            <legend style="display: none"></legend>
            <input id="radio2_1" type="radio" type="radio" name="search_type2" value="1">
            <label for="radio2_1">1Akses</label>
            &nbsp;&nbsp;&nbsp;
            <input id="radio2_2" type="radio" type="radio" name="search_type2" checked="checked" value="2">
            <label for="radio2_2">AGC Search</label>
        </fieldset>
    </div>
    <form target="_blank" id="frmsearch2">
        <label for="agcsearch2" style="display:none">2</label><input id="agcsearch2" style="margin-bottom:5%;" type="text" placeholder="<?php echo $search; ?>" class="itemsearch" name="search_keyword">
    </form>
    <iframe id="1akses2" class="itemsearch" style="margin-top:-5%; margin-bottom:-5%;" src = "http://1akses.malaysia.gov.my/OneGovSearchApps/widgetLoc/search.html?101110000001" width = "350" height = "100" frameborder="0"></iframe>
    
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

    <!-- Tender & Quotation -->
    <div class="itemsmaller push20" style="background:#FFFFFF;height:110px;border-radius:3px;">
        <div class="pad10">
            <div class='one_quarter first'><div id="business_tender_title"><?php echo $businesstender; ?></div></div>
            <div class='three_quarter'>
                <?php
                $tender_arr = PortalElement::GetArticleList('209');                
                if (sizeof($tender_arr) > 0) {
                    echo '<div id="business_tender" class="owl-carousel owl-theme">';
                    foreach ($tender_arr as $tarr) {
                        echo "<div class='business_tender_box'><a href='" . $tarr['url'] . "'>" . $tarr['title'] . " &raquo;</a></div>";
                    }
                    echo '</div>';
                } else {
                    if (Yii::app()->session['lang'] == 'my')
                        echo '<div class="divnorecord" style="line-height:90px;">Tiada tender & sebut harga baru</div>';
                    else
                        echo '<div class="divnorecord" style="line-height:90px;">No new tender & quotation</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Laws Related To Foreign Investment -->
    <div class="itemsmaller push20 nogutter one_half first">
        <a href='#'>
            <div id='business_law_wrapper'>
                <div id="business_inner_box"><?php echo $businesslaw; ?></div>
            </div>
        </a>
    </div>

    <!-- International Trade and Finance Related Legislation -->
    <div class="itemsmaller push20 nogutter one_half">
        <a href='index.php?r=portal2/lom&menu_id=b21XYmExVUhFOE4wempZdE1vNUVKdz09'>
            <div id='business_finance_wrapper'>
                <div id="business_inner_box">
                    <?php echo $businessfinance; ?>
                </div>
            </div>
        </a>
    </div>

    <div class="clear"></div>

    <!-- Advertisement -->
    <div class="itemsmaller" style="background:white;height:130px;opacity:1.0;border-radius:3px;">
        <section class="main_slider">
            <div class="rslides_container clear">
                <ul class="rslides clear" id="rslides2">
                    <?php
                    $count = 0;
                    $slider_arr2 = PortalElement::GetMediaList('slider2');
                    if (sizeof($slider_arr2) > 0) {
                        foreach ($slider_arr2 as $sarr2) {
                            if ($sarr2['url'] == '')
                                echo '<li><img src="' . $sarr2['img'] . '" title="' . $sarr2['title'] . '" alt="iklan'.$count.'"></li>';
                            else
                                echo '<li><a href="' . $sarr2['url'] . '" target="_blank"><img src="' . $sarr2['img'] . '" title="' . $sarr2['title'] . '" alt="iklan'.$count.'"></a></li>';
                            $count++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>

</div>

<div class="one_third nogutter">

    <!-- Latest -->
    <div class="itemsmaller" style="background:#897676;height:380px;margin-left:20px;position:relative;color:white;border-radius:3px;">
        <div class="pad10">
            <div class="public_box_title"><?php echo $businessresult; ?></div>
            <?php
            //$latest_arr = PortalElement::GetArticleList('190,194,209');
            $latest_arr = PortalElement::GetTenderListLatest('209');
            if (sizeof($latest_arr) > 0) {
                //echo '<marquee  behavior="scroll" direction="up" height="330" scrollamount="3" onMouseOver="this.setAttribute(\'scrollamount\', 0, 0);" OnMouseOut="this.setAttribute(\'scrollamount\', 3, 0);"><ul class="nospace public_latest_list">';
                echo '<marquee  behavior="scroll" direction="up" height="330" scrollamount="3" onMouseOver="this.stop();" OnMouseOut="this.start();"><ul class="nospace public_latest_list">';
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

    jQuery.noConflict()(function ($) {

        $('#1akses2').hide();
        //$('#agcsearch2').hide();
        $(".searchInput").change(function () {
            var search_type = $('input[name=search_type2]:checked', '.searchInput').val();
            if (search_type == 1) {
                $('#1akses2').show();
                $('#agcsearch2').hide();
            }

            else if (search_type == 2) {
                $('#agcsearch2').show();
                $('#1akses2').hide();
            }
        });
        
        $("#frmsearch2").submit(function(e) {
            var search_keyword = $('[name=search_keyword]').val();
            if (search_keyword != '' && search_keyword.length > 2) {
                $('#frmsearch2').attr('action', 'index.php?r=portal2/search');
                $('#frmsearch2').attr('method', 'post');
            }
            else {
                alert('Keyword must be more than 3 characters');
                return false;
            }
        });
    });

</script>
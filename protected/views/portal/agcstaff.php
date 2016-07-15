<style>

    #staff_internal_wrapper{
        background-color: #86942A;
        height:120px;
        margin-right:20px;
        background-image:url('images/setting.png');
        background-repeat : no-repeat;
        background-position:185px 60px;
        border-radius:3px;
    }

    #staff_eform_wrapper{
        background:#887F2E;
        height:100px;
        margin-right:20px;
        background-image:url('images/form.png');
        background-repeat : no-repeat;
        background-position:185px 40px;
        border-radius:3px;
    }

    #staff_webmail_wrapper{
        background:#467337;
        height:100px;
        margin-right:20px;
        background-image:url('images/message.png');
        background-repeat : no-repeat;
        background-position:185px 40px;
        border-radius:3px;
    }

    #staff_retirement_wrapper{
        background:#50a892;
        height:100px;
        background-image:url('images/group.png');
        background-repeat : no-repeat;
        background-position:320px 40px;
        border-radius:3px;
    }

    #staff_misc_wrapper{
        background:#515957;
        height:100px;
        background-image:url('images/info.png');
        background-repeat : no-repeat;
        background-position:205px 40px;
        border-radius:3px;
    }

    #staff_club_wrapper{
        background:white;
        height:260px;
    }

    #staff_inner_box, #staff_club_title, #staff_directives_title, #staff_circular_title{
        padding : 10px;
        color: #FFF;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
        letter-spacing: 0.1em;
        font-size: 1.3em; 
    }

    #staff_club_title{padding:0;color:#377364;}

    #staff_club_list li{
        font-size: 0.95em;
        border-bottom : 1px dashed black;
        margin-bottom:4px;
        padding-bottom : 4px;
    }
    #staff_club_list li:last-child{border:0;}

    #staff_club_list a{color:#377364;}
    #staff_club_list a:hover{color: black;}

    #staff_directives_title, #staff_circular_title{padding:0;padding-top:10px;}

    #staff_directives_list, #staff_circular_list{position:relative;}
    #staff_directives_list .owl-controls .owl-buttons .owl-next, 
    #staff_directives_list .owl-controls .owl-buttons .owl-prev, 
    #staff_circular_list .owl-controls .owl-buttons .owl-next, 
    #staff_circular_list .owl-controls .owl-buttons .owl-prev{
        position:absolute;
        top:auto;
        bottom : 0;
        left:auto;
    }
    #staff_directives_list .owl-controls .owl-buttons .owl-next,#staff_circular_list .owl-controls .owl-buttons .owl-next{right:0;}
    #staff_directives_list .owl-controls .owl-buttons .owl-prev,#staff_circular_list .owl-controls .owl-buttons .owl-prev{right:20px;}

    .staff_directives_box, .staff_circular_box{
        /*background:red;*/
        height:80px;
        padding : 10px 20px;
        font-size: 0.95em;
        border-left : 1px solid white;
        line-height: 1.5em;
        color:#ffffff;
    }

    .staff_directives_box a, .staff_circular_box a{color:inherit;}
    .staff_directives_box a:hover, .staff_circular_box a:hover{color: black;}
    
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

<div class="one_third first push20" style="height:40px;line-height:40px;"><div class="itemtitle"><?php echo $agcstaff; ?></div></div>
<div class="two_third push20">
    <div class="searchInput">
        <fieldset>
            <legend style="display: none"></legend>
            <input id="radio3_1" type="radio" type="radio" name="search_type3" value="1">
            <label for="radio3_1">1Akses</label>
            &nbsp;&nbsp;&nbsp;
            <input id="radio3_2" type="radio" type="radio" name="search_type3" checked="checked" value="2">
            <label for="radio3_2">AGC Search</label>
        </fieldset>
    </div>
    <form target="_blank" id="frmsearch2">
        <label for="agcsearch3" style="display:none">3</label><input id="agcsearch3" style="margin-bottom:5%;" type="text" placeholder="<?php echo $search; ?>" class="itemsearch" name="search_keyword">
    </form>
    <iframe id="1akses3" class="itemsearch" style="margin-top:-5%; margin-bottom:-5%;" src = "http://1akses.malaysia.gov.my/OneGovSearchApps/widgetLoc/search.html?101110000001" width = "350" height = "100" frameborder="0"></iframe>
    
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

    <!-- Attorney General's Directives  -->
    <div class="itemsmaller push20" style="background:#507642;height:120px;color:#ffffff;border-radius:3px;"> 
        <div class="pad10">
            <div class='one_quarter first'><div id='staff_directives_title'><?php echo $staffdirectives; ?></div></div>
            <div class='three_quarter'>
                <?php
                $directives_arr = PortalElement::GetArticleList('401');
                if (sizeof($directives_arr) > 0) {
                    echo '<div id="staff_directives_list" class="owl-carousel owl-theme">';
                    foreach ($directives_arr as $darr) {
                        echo "<div class='staff_directives_box'><a href='" . $darr['url'] . "'>" . $darr['title'] . "  &raquo</a></div>";
                    }
                    echo '</div>';
                } else {
                    if (Yii::app()->session['lang'] == 'my')
                        echo '<div class="divnorecord" style="line-height:100px;">Tiada arahan peguam negara baru</div>';
                    else
                        echo '<div class="divnorecord" style="line-height:100px;">No new attorney general\'s directives</div>';
                }
                ?>
            </div>
            <div class='clear'></div>
        </div>
    </div>

    <!-- Internal Application -->
    <div class="itemsmaller push20 nogutter one_third first">
        <a href='index.php?r=portal2/left&menu_id=djQ4NTR3NDNFSk5sTlJlR3c1clJXQT09'>
            <div  id='staff_internal_wrapper'>
                <div id="staff_inner_box">
                    <?php echo $staffdirectory; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- Circulars & General Information  -->
    <div class="itemsmaller push20 nogutter two_third" style="background:#71B238;height:120px;color:white;">
        <div class="pad10">
            <div class='one_third first'><div id='staff_circular_title'><?php echo $staffcircular; ?></div></div>
            <div class='two_third'>
                <?php
                $circular_arr = PortalElement::GetArticleList('403');
                if (sizeof($circular_arr) > 0) {
                    echo '<div id="staff_circular_list" class="owl-carousel owl-theme">';
                    foreach ($circular_arr as $carr) {
                        echo "<div class='staff_circular_box'><a href='" . $carr['url'] . "'>" . $carr['title'] . " &raquo;</a></div>";
                    }
                    echo '</div>';
                } else {
                    if (Yii::app()->session['lang'] == 'my')
                        echo '<div class="divnorecord"><br>Tiada pekeliling & maklumat am baru</div>';
                    else
                        echo '<div class="divnorecord"><br>No new circulars & general information</div>';
                }
                ?>
            </div>
            <div class='clear'></div>
        </div>
    </div>

    <div class="clear"></div>

    <!-- e-Form -->
    <div class="itemsmaller nogutter one_third first">
        <a href='index.php?r=portal2/left&menu_id=dTVIWGRqdjZkcU53dlZ2NVZ4dGlldz09'>
            <div id='staff_eform_wrapper'>
                <div id="staff_inner_box">
                    <?php echo $staffeform; ?>
                </div>
            </div>
        </a>
    </div>

    <!-- Webmail -->
    <div class="itemsmaller nogutter one_third">
        <a href='https://webmail.agc.gov.my/OWA/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fwebmail.agc.gov.my%2fowa' target='_blank'>
            <div id='staff_webmail_wrapper'>
                <div id="staff_inner_box">
                    Webmail
                </div>
            </div>
        </a>
    </div>

    <!-- Miscellaneous -->
    <div class="itemsmaller nogutter one_third">
        <a href='index.php?r=portal2/left&menu_id=QjBvTmlMUHEwMG51ZWxiZHYwRmV4QT09'>
            <div id='staff_misc_wrapper'>
                <div id="staff_inner_box">
                    <?php echo $staffmiscellaneous; ?>
                </div>
            </div>
        </a>
    </div>

    <div class="clear"></div>

</div>

<div class="one_third nogutter">

    <div style="margin-left:20px;">

        <!-- AGC Club -->
        <div class="itemsmaller push20">
            <div id="staff_club_wrapper">
                <div class="pad10">
                    <div id="staff_club_title"><?php echo $staffclub; ?></div>
                    <ul class="nospace" id="staff_club_list"><?php echo PortalElement::GetHomeBottomMenu(365); ?></ul>
                </div>
            </div>
        </div>

        <!-- Retirement / Promotion / Transfer Order -->
        <div class="itemsmaller">
            <a href='index.php?r=portal2/left&menu_id=TWxmYXMwTzdKM3FabzVKSG93SVMvUT09'>
                <div id="staff_retirement_wrapper">
                    <div id="staff_inner_box">
                        <?php echo $staffretirement; ?>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>

<script>

    jQuery.noConflict()(function ($) {

        //$('#agcsearch3').hide();
        $('#1akses3').hide();
        $(".searchInput").change(function () {
            var search_type = $('input[name=search_type3]:checked', '.searchInput').val();
            if (search_type == 1) {
                $('#1akses3').show();
                $('#agcsearch3').hide();
            }

            else if (search_type == 2) {
                $('#agcsearch3').show();
                $('#1akses3').hide();
            }
        });
        
        $("#frmsearch3").submit(function(e) {
            var search_keyword = $('[name=search_keyword]').val();
            if (search_keyword != '' && search_keyword.length > 2) {
                $('#frmsearch3').attr('action', 'index.php?r=portal2/search');
                $('#frmsearch3').attr('method', 'post');
            }
            else {
                alert('Keyword must be more than 3 characters');
                return false;
            }
        });
    });

</script>
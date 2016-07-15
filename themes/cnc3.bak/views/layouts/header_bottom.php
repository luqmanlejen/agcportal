<style>
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
<div class="wrap">
    <div class="header-bottom">
        <div class="col-md-6">
            <div class="logo">
                <a href="index.html"><img id="logoCNC" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_CNC.png" class="img-responsive" alt="CNC_logo" /></a>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="enlarge">
                <li>
                    1246225 Hits
                </li>
                <li>
                    <img src="images/qr_code.jpg" class="qr_code_thumbnail" alt="qr_code">
                    &nbsp;&nbsp;&nbsp;
                    <span><img src="images/qr_code.jpg" id="enlarge_img" alt="qr_code"></span>
                </li>
            </ul>
        <!--<div class="search">-->
            <div class="search2">
                <form>
                    <input type="submit" value="">
                    <input type="text" value="Insert keyword" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Insert keyword';
                            }"/>
                </form>
            </div>
        <!--</div>-->
        </div>
<!--        <div class="col-md-6" style="background-color: red;">
            <div class="col-md-4" style="float: right; background-color: blue;">
                <div style="background-color: greenyellow; float: right; ">gyasasasasasa</div>
                <div style="background-color: green; float: right; position: relative">
                    
                    
                    
                </div>
            </div>
            <div class="search">
            <div class="search2">
                <form>
                    <input type="submit" value="">
                    <input type="text" value="Search for a product, category or brand" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search for a product, category or brand';
                            }"/>
                </form>
            </div>
        </div>
        </div>-->
<!--        <div class="logo">
            <a href="index.html"><img id="logoCNC" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_CNC.png" class="img-responsive" alt="CNC_logo" /></a>
        </div>
        <div class="search">
            <div class="search2">
                <form>
                    <input type="submit" value="">
                    <input type="text" value="Search for a product, category or brand" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search for a product, category or brand';
                            }"/>
                </form>
            </div>
        </div>-->
        <div class="clearfix"></div>
    </div>
</div>
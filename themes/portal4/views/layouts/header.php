<style>
    /* Slide panel */

    .slidepanel{
        margin-bottom: 10px;
        background: #fafafa;
        border-bottom: 1px solid #eee;
    }

    .slidepanel p{
        margin: 0px;
        font-size: 13px;
    }

    .slidepanel p i{
        margin-right: 5px;
    }

    .slidepanel .spara{
        padding: 7px 0px;
    }	

    .slidepanel .social,.slidepanel .personel{
        float: right;
    }

    .container{
        max-width:1200px;
    }
    
    /* Personel && Social*/
    
    .personel,.social{
        padding: 7px 0px;
    }

    .personel a{
        width: 75px;
        height: 26px;
        margin: 0px 3px;
        line-height: 24px;
        color: #fff;
        display: inline-block;
        text-align: center;
    }
    
    .social a{
        width: 24px;
        height: 24px;
        margin: 0px 3px;
        line-height: 24px;
        color: #fff;
        display: inline-block;
        text-align: center;
    }

    /* Background colors */

    .bblack{
        background: #222 !important;
        color: #fff !important;
        border:0px !important;
    }

    .blightblue{
        background:#52b9e9 !important;
        color: #fff !important;
        border: 0px !important;
    }

    .bblue{
        background:#1171a3 !important;
        color: #fff !important;	
        border: 0px !important;
    }

    .bgreen{
        background: #43c83c !important;
        color: #fff !important;	
        border: 0px !important;
    }

    .borange{
        background:#f88529 !important;
        color: #fff !important;	
        border: 0px !important;	
    }

    .bred{
        background: #fa3031 !important;
        color: #fff !important;	
        border: 0px !important;
    }

    .bviolet{
        background: #932ab6 !important;
        color: #fff !important;	
        border: 0px !important;
    }

    .blightblue h2,.blightblue h3, .blightblue h4, .blightblue h5, .blightblue h6,
    .bblue h2,.bblue h3, .bblue h4, .bblue h5, .bblue h6,
    .bgreen h2,.bgreen h3, .bgreen h4, .bgreen h5, .bgreen h6,
    .bred h2,.bred h3, .bred h4, .bred h5, .bred h6,
    .bviolet h2,.bviolet h3, .bviolet h4, .bviolet h5, .bviolet h6,
    .borange h2,.borange h3, .borange h4, .borange h5, .borange h6{
        color: #fff !important;
    }

    /* Responsive */

    @media (max-width: 767px){
        .container{ width:100%; }
        .slidepanel .spara{
            padding-bottom: 0px;
        }
        .slidepanel .personel,
        .slidepanel .social{
            padding-bottom: 10px;
            float: none;
        }
        .slidepanel .personel a,
        .slidepanel .social a{
            margin-left: 0px;
            margin-right: 7px;
        }
    }

    @media (min-width: 768px) and (max-width: 991px){
        .container{
            width:100%;
        }

        .slidepanel .spara{
            padding-bottom: 0px;
        }
        .slidepanel .personel,
        .slidepanel .social{
            padding-bottom: 10px;
            float: none;
        }
        .slidepanel .personel a,
        slidepanel .social a{
            margin-left: 0px;
            margin-right: 7px;
        }		
    }
</style>

<style>
    .nav {
  margin-top: 50px;
  display: none;
  position: relative;
  float: right;
}

#mobile-menu-button {
/*  cursor: pointer;
  display: block;
  width: 4em;
  height: 4em;
  position: absolute;
  top: 0;
  right: .1em;*/
}

#mobile-menu-button a {
/*  margin: 1em;
  display: block;
  position: relative;*/
}

#mobile-menu-button a:before {
/*  content: "";
  position: absolute;
  left: 0;
  top: 0.25em;
  width: 2em;
  height: 0.35em;
  background: #3a693f;
  box-shadow: 0 0.6em 0 0 #3a693f, 0 1.2em 0 0 #3a693f;*/
}

#mobile-menu-button.active a:before {
/*  background: #7bb640;
  box-shadow: 0 0.6em 0 0 #7bb640, 0 1.2em 0 0 #7bb640;*/
}
</style>
<div class="slidepanel">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="spara"> 
                    <!-- Contact details -->
                    <p>
                        <i class="fa fa-globe lightblue"></i> BM &nbsp; 
                        <i class="fa fa-globe lightblue"></i> BI &nbsp; | &nbsp; 
                        <i class="fa fa-font lightblue"></i><span>+</span> &nbsp; 
                        <i class="fa fa-font lightblue"></i> &nbsp; 
                        <i class="fa fa-font lightblue"></i><span>-</span> &nbsp; | &nbsp; 
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <!--<div class="social">-->
                <div class="personel">
                    <!-- Social media icons. Repalce # with your profile links -->
<!--                    <a href="#" class="bblue"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="borange"><i class="fa fa-google-plus"></i></a> 
                    <a href="#" class="blightblue"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="bviolet"><i class="fa fa-linkedin"></i></a>
                    <a href="#" class="bred"><i class="fa fa-pinterest"></i></a>
                    <a href="#" class="borange"><i class="fa fa-rss"></i></a>-->
                    
                    <a href="#public" class="scroller bblue">PUBLIC</a>
                    <a href="#business" class="scroller borange">BUSINESS</a> 
                    <a href="#staff" class="scroller blightblue">AGC STAFF</a>
<!--                    <ul>
                        <li><a href="#section-1">PUBLIC</a></li>
                        <li><a href="#section-2">BUSINESS</a></li>
                        <li><a href="#section-3">AGC STAFF</a></li>
                    </ul>-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php // include 'sub_header1.php'; ?>

<div class="row">
    <div class="container" style="background-color: none;height:55px;">
        <div class="col-xs-12 col-md-9">
            <img class="img img-responsive" src="images/logoAGC_eng.png" alt=""/>
        </div>
        <div class="col-xs-12 col-md-3">
            <div style="float:right;margin-top:20px;">
                <a href="#" style="padding:0 0 5px 10px;color:black">
                    <img src="images/tiles/twitter.png" alt=""/>
                    <!--<i class="fa fa-twitter fa-2x"></i>-->
                </a> &nbsp;
                <a href="#" style="padding:0 0 5px 10px;color:black">
                    <img src="images/tiles/blog.png" alt=""/>
                    <!--<i class="fa fa-twitter fa-2x"></i>-->
                </a> &nbsp;
                <a href="#" style="padding:0 0 5px 10px;color:black">
                    <img src="images/tiles/rss.png" alt=""/>
                    <!--<i class="fa fa-twitter fa-2x"></i>-->
                </a> &nbsp;
                <a href="#" style="padding:0 0 5px 10px;color:black">
                    <img src="images/tiles/cloud.png" alt=""/>
                    <!--<i class="fa fa-twitter fa-2x"></i>-->
                </a> &nbsp;

                <a href="#" style="padding:0 0 5px 10px;color:black">
                    
                    <img id="mobile-menu-button" src="images/tiles/bars.png" alt=""/>
                    <nav class="nav">Shitty menu</nav>
<!--                    <div class="row">
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
    </div>
</div>
</div>-->
                    <!--<i class="fa fa-twitter fa-2x"></i>-->
                    </a> &nbsp;
                
            </div>
        </div>
    </div>
</div>
<!--<div class="row">
    <div class="container" style="background-color: none;height:50px;">
        <div class="col-xs-12 col-md-8" style="background-color:none">
            <h1>PUBLIC</h1>
        </div>
        <div class="col-xs-12 col-md-4" style="background-color:none; margin-top: 10px;">
            <div class="form-group">  
              <input class="form-control" id="focusedInput" value="1Akses" type="text">
            </div>
        </div>
    </div>
</div>-->

<!--<div class="row">
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
    </div>
</div>
</div>-->
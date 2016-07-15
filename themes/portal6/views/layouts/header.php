<style>
    .public-menu{
        background-color: #0077BE;
        padding: -30px 0 0 10px;
        width: 90px;
        text-align: center;
    }
    .business-menu{
        background-color: #800000;
        padding: -30px 0 0 10px;
        width: 90px;
        text-align: center;
    }
    .staff-menu{
        background-color: #009B7D;
        padding: -30px 0 0 10px;
        width: 90px;
        text-align: center;
    }
    .right{
        float:right;
    }
    
    /* Custom, iPhone Retina */ 
    @media only screen and (min-width : 320px) {
        #menu-scroller-header{
            /*margin-left: 5px;*/
            //margin-right: 5px;
        }
        .public-menu{
            margin: 0;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
        .business-menu{
            margin: 0;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
        .staff-menu{
            margin-right: 4px;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
    }

    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 410px) {
        .public-menu{
            margin: 0;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
        .business-menu{
            margin: 0;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
        .staff-menu{
            margin-right: 4px;
            padding: 0;
            min-width: 100px;
            width:auto;
        }
    }
</style>

<div class="codrops-top clearfix">
    <div class="container">
    <div class="col-md-3 col-sm-3 col-xs-12">
            <i class="fa fa-globe lightblue"></i> BM &nbsp; 
            <i class="fa fa-globe lightblue"></i> BI &nbsp; | &nbsp; 
            <i class="fa fa-font lightblue"></i><span>+</span> &nbsp; 
            <i class="fa fa-font lightblue"></i> &nbsp; 
            <i class="fa fa-font lightblue"></i><span>-</span> &nbsp; | &nbsp;
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div id="menu-scroller-header" class="right">
            <a href="#public" class="scroller-menu bblue public-menu">PUBLIC</a>
            <a href="#business" class="scroller-menu borange business-menu">BUSINESS</a> 
            <a href="#staff" class="scroller-menu blightblue staff-menu">STAFF</a>
        </div>
    </div>
    </div>
</div>

<header class="codrops-header">

    <div class="col-xs-12 col-md-9">
        <a href="index.php?r=portal4">
            <img class="img img-responsive" src="images/logoAGC_eng.png" alt="Logo AGC"/>
        </a>
    </div>
    <div class="col-xs-12 col-md-3">
        <div style="float:right;margin-top:20px;">
            <a href="#" style="padding:0 0 5px 10px;color:black">
                <img src="images/tiles/twitter.png" alt="Twitter"/>
                <!--<i class="fa fa-twitter fa-2x"></i>-->
            </a> &nbsp;
            <a href="#" style="padding:0 0 5px 10px;color:black">
                <img src="images/tiles/blog.png" alt="Blog"/>
                <!--<i class="fa fa-twitter fa-2x"></i>-->
            </a> &nbsp;
            <a href="#" style="padding:0 0 5px 10px;color:black">
                <img src="images/tiles/rss.png" alt="RSS"/>
                <!--<i class="fa fa-twitter fa-2x"></i>-->
            </a> &nbsp;
            <a href="#" style="padding:0 0 5px 10px;color:black">
                <img src="images/tiles/cloud.png" alt="Tag Cloud"/>
                <!--<i class="fa fa-twitter fa-2x"></i>-->
            </a> &nbsp;

            <a href="#" id="trigger" style="padding:0 0 5px 10px;color:black">

                <img id="mobile-menu-button" src="images/tiles/bars.png" alt="Menu"/>
                <!--<a href="#"  class="menu-trigger">Open/Close Menu</a>-->
            </a>
        </div>
    </div>
</header>
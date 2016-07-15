<!--start-home-->
<div id="home" class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="index.html"><h1>Chambers <span>News</span> Channels</h1></a>
            </div>
            <span class="menu"></span>
<!--            <div class="top-menu">
                <ul class="cl-effect-16">
                    <li><a class="active" href="#" data-hover="News">News</a></li> 
                    <li><a href="#" data-hover="Articles">Articles</a></li>                    
                </ul>
            </div>-->
            <!--script-for-menu-->
            <script>
                $("span.menu").click(function () {
                    $(".top-menu").slideToggle("slow", function () {
                        // Animation complete.
                    });
                });
            </script>
            <!-- start-search-->
            <div class="search">
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"> </span>
                    </form>
                </div>
            </div>
            <!--search-scripts-->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/classie.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/uisearch.js"></script>
            <script>
                new UISearch(document.getElementById('sb-search'));
            </script>
            <!--//search-scripts-->

            <div class="clearfix"> </div>
        </div>
        <!--end header_main4-->
        <!--start-slider-->
        <div class="banner">
            <div class="col-md-6 banner-slider">
                <div id="top" class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <div class="banner-info">
                                <h3>Improve Your Crop</h3>
                                <p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>High Quality Seeds</h3>
                                <p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>Improve Your Crop</h3>
                                <p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
                            </div>						
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 banner-grids">
                <div class="col-md-6 banner-grid">
                    <figure class="effect-bubba">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/a1.jpg" alt=""/>
                        <figcaption>
                            <h4>New Crop</h4>
                        </figcaption>			
                    </figure>	
                </div>
                <div class="col-md-6 banner-grid">
                    <figure class="effect-bubba">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/a2.jpg" alt=""/>
                        <figcaption>
                            <h4>New Crop</h4>
                        </figcaption>			
                    </figure>	
                </div>
                <div class="col-md-6 banner-grid">
                    <figure class="effect-bubba">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/a3.jpg" alt=""/>
                        <figcaption>
                            <h4>New Crop</h4>
                        </figcaption>			
                    </figure>	
                </div>
                <div class="col-md-6 banner-grid lost">
                    <figure class="effect-bubba">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/a4.jpg" alt=""/>
                        <figcaption>
                            <h4>New Crop</h4>
                        </figcaption>			
                    </figure>	
                </div>				
                <div class="clearfix"></div>							
            </div>
            <div class="clearfix"></div>
            <!--banner-slide-->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                    // Slideshow 4
                    $("#slider4").responsiveSlides({
                        auto: true,
                        pager: true,
                        nav: true,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                            $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                        }
                    });

                });
            </script>
        </div>
        <!--//end-slider-->
    </div>
</div>
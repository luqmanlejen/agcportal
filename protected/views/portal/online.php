<style>
    .online{height:50px;background:rgba(0, 0, 0, 0.5);}
    #online .item{text-align: center;}
    #online .item img{height:30px;}
    .online_inner{
        max-width:1200px;
        margin:0 auto;
        height:30px;
        padding:10px 0;
        line-height: 30px;
    }

    #online .owl-controls .owl-buttons .owl-prev, 
    #online .owl-controls .owl-buttons .owl-next{
        background:rgb(10, 21, 137);
        opacity: 1;
        margin:0;
        padding:10px 0;
        position:absolute;
        border-radius: 0px;
        top:-10px;
        width:50px;
    }

    #online .owl-controls .owl-buttons .owl-next{right:-75px;}
    #online .owl-controls .owl-buttons .owl-prev{left:-75px;}

    .online_title{
        background:#FFB739; 
        color: rgba(255, 255, 255, 0.95);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 400;
        font-size: 1em;
        width : 300px;
        text-align: center;
		

        position:absolute;
        top:-30px;
        left:50%;
        margin-left:-150px;
        height : 30px;
        line-height: 30px;
    }

    .img-zoom {
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }

    .transition {
        background : #cccccc;
        -webkit-transform: scale(2); 
        -moz-transform: scale(2);
        -o-transform: scale(2);
        transform: scale(2);
    }

    #online .owl-wrapper-outer {overflow: visible;}

    #online .owl-item {transform: none;}

</style>


<div class="online_title"><?php echo $onlineservices; ?></div>

<div class="online">

    <div class="online_inner">

        <div id="online">

            <?php
            $online_arr = PortalElement::GetMediaList('online');
            $count = 0;
            if (sizeof($online_arr) > 0) {
                
                foreach ($online_arr as $oarr) {

                    echo '<div class="item"><a href="' . $oarr['url'] . '" target="_blank"><img src="' . $oarr['img'] . '" title="' . $oarr['title'] . '" class="img-zoom" alt="image '.$count.'"></a></div>';
                    $count++;
                }
            }
            ?>

        </div>

    </div>

</div>

<script>

    jQuery.noConflict()(function($) {

        $("#online").owlCarousel({
            //autoPlay: 3000,
            autoPlay: false,
            items: 3,
            navigation: true,
            pagination: false,
            navigationText: ["<img src='images/left_arrow.png' alt='left arrow'>", "<img src='images/right_arrow.png' alt='right arrow'>"],
            slideSpeed: 1000,
            stopOnHover: true,
            autoHeight: false
        });

        $('.img-zoom').hover(function() {
            $(this).addClass('transition');

        }, function() {
            $(this).removeClass('transition');
        });

    });

</script>
<?php
    //change color
    if (isset(Yii::app()->session['color']) && Yii::app()->session['color'] != '') {

        if (Yii::app()->session['color'] == 'red')
            echo '<link rel="stylesheet" type="text/css" href="css/textcolor/red.css" />';
        if (Yii::app()->session['color'] == 'blue')
            echo '<link rel="stylesheet" type="text/css" href="css/textcolor/blue.css" />';
        if (Yii::app()->session['color'] == 'green')
            echo '<link rel="stylesheet" type="text/css" href="css/textcolor/green.css" />';
        if (Yii::app()->session['color'] == 'purple')
            echo '<link rel="stylesheet" type="text/css" href="css/textcolor/purple.css" />';
        if (Yii::app()->session['color'] == 'black')
            echo '<link rel="stylesheet" type="text/css" href="css/textcolor/black.css" />';
    }

    if (isset(Yii::app()->session['size']) && Yii::app()->session['size'] != 0) {

        $size = Yii::app()->session['size'] + 11;
        echo    '<style>
                    body{ font-size: ' . $size . 'px !important; }
                </style>';
    }
?>

<style>
    .header-w3c{position:absolute;right:22%;top:35px;z-index: 9999;}
    .header-w3c img{
        height : 20px;
        width : 20px;
        cursor: pointer;
    }

    #header-contact{cursor: pointer;}

    .imgdivider{height:20px;padding-left:20px;}

    #linkpublic, #linkbusiness, #linkstaff{margin-left:20px;}
</style>

<ul id="example-1" class="sticklr">
    <li>
        <a href="#" title="w3c"><img src="images/oku.png" alt="w3c"></a>
        <ul>

            <li class="sticklr-title">
                <a href="#"><?= $size; ?></a>
            </li>
            <li style="padding: 3px">

                &nbsp;&nbsp;
                <span><a href="index.php?r=main/changesize&size=i"><img src='images/w3c/increase.png' title="Increase font size"></a></span>
                &nbsp;&nbsp;
                <span><a href="index.php?r=main/changesize&size=n"><img src='images/w3c/normal.png' title="Default font size"></a></span>
                &nbsp;&nbsp;
                <span><a href="index.php?r=main/changesize&size=d"><img src='images/w3c/decrease.png' title="Decrease font size"></a></span>

            </li>

            <li class="sticklr-title">
                <a href="#"><?= $colour; ?></a>
            </li>
            <li style="padding: 5px">

                <span><a href="index.php?r=main/changecolor&color=red"><img src='images/w3c/red.png' title="Change text color to red"></a></span>
                <span><a href="index.php?r=main/changecolor&color=blue"><img src='images/w3c/blue.png' title="Change text color to blue"></a></span>
                <span><a href="index.php?r=main/changecolor&color=green"><img src='images/w3c/green.png' title="Change text color to green"></a></span>
                <span><a href="index.php?r=main/changecolor&color=purple"><img src='images/w3c/purple.png' title="Change text color to lilac"></a></span>
                <span><a href="index.php?r=main/changecolor&color=black"><img src='images/w3c/black.png' title="Reset text color"></a></span>

            </li>

            <li class="sticklr-title">
                <a href="#"><?= $contrast; ?></a>
            </li>
            <li style="padding: 5px">

                &nbsp;&nbsp;
                <span><img src='images/w3c/contrast_light.gif' title="Change contrast to minimum"></span>
                &nbsp;&nbsp;
                <span><img src='images/w3c/contrast_normal.gif' title="Change contrast to normal"></span>
                &nbsp;&nbsp;
                <span><img src='images/w3c/contrast_dark.gif' title="Change contrast to maximum"></span>

            </li>

        </ul>
    </li>
</ul>

<div class="wrapper" style='background:white;'>
    <header id="header" class="full_width clear">
        <div id="hgroup">
            <a href="#">
                <?php if(Yii::app()->session['lang'] == 'my') {?>
                    <img src='images/logoAGC_bm.png'>
                <?php } else { ?>
                    <img src='images/logoAGC_eng.png'>
                <?php } ?>
            </a>
        </div>
        <div id="header-contact">
            
            <?php if (Yii::app()->session['lang'] == 'my') { ?>
                <img src='images/lang/ENG.png' title="English" onclick="location.href = 'index.php?r=portal2/setlang&lang=en'">
            <?php } else { ?>
                <img src='images/lang/BM.png' title="Bahasa Malaysia" onclick="location.href = 'index.php?r=portal2/setlang&lang=my'">
            <?php } ?>
        </div>
    </header>
</div>
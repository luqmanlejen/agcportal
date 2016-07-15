<html><head>
  <title>Demo » Add widgets dynamically » gridster.js</title>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/grid/dist/jquery.gridster.css">
  <!--<link rel="stylesheet" type="text/css" href="assets/demo.css">-->
<style type="text/css"> .gridster * {
  margin:0;
  padding:0;
}

ul {
  list-style-type: none;
}


/*/
/* demo
/*/


body {
    font-size: 16px;
    font-family: 'Helvetica Neue', Arial, sans-serif;
    color: #444;
    margin: 30px 40px;
}

.controls {
    margin-bottom: 20px;
}

/*/
/* gridster
/*/

.gridster ul {
    background-color: #EFEFEF;
}

.gridster li {
    font-size: 1em;
    font-weight: bold;
    text-align: center;
    line-height: 100%;
}


.gridster {
    margin: 0 auto;

    opacity: .8;

    -webkit-transition: opacity .6s;
    -moz-transition: opacity .6s;
    -o-transition: opacity .6s;
    -ms-transition: opacity .6s;
    transition: opacity .6s;
}

.gridster .gs-w {
    background: #DDD;
    cursor: pointer;
}

.gridster .player {
    background: #BBB;
}


.gridster .preview-holder {
    border: none!important;
    background: red!important;
}

[data-col="7"] { left:970px; }
 [data-col="6"] { left:810px; }
 [data-col="5"] { left:650px; }
 [data-col="4"] { left:490px; }
 [data-col="3"] { left:330px; }
 [data-col="2"] { left:170px; }
 [data-col="1"] { left:10px; }
 [data-row="16"] { top:2410px; }
 [data-row="15"] { top:2250px; }
 [data-row="14"] { top:2090px; }
 [data-row="13"] { top:1930px; }
 [data-row="12"] { top:1770px; }
 [data-row="11"] { top:1610px; }
 [data-row="10"] { top:1450px; }
 [data-row="9"] { top:1290px; }
 [data-row="8"] { top:1130px; }
 [data-row="7"] { top:970px; }
 [data-row="6"] { top:810px; }
 [data-row="5"] { top:650px; }
 [data-row="4"] { top:490px; }
 [data-row="3"] { top:330px; }
 [data-row="2"] { top:170px; }
 [data-row="1"] { top:10px; }
 [data-sizey="1"] { height:140px; }
 [data-sizey="2"] { height:300px; }
 [data-sizey="3"] { height:460px; }
 [data-sizey="4"] { height:620px; }
 [data-sizey="5"] { height:780px; }
 [data-sizey="6"] { height:940px; }
 [data-sizey="7"] { height:1100px; }
 [data-sizey="8"] { height:1260px; }
 [data-sizey="9"] { height:1420px; }
 [data-sizey="10"] { height:1580px; }
 [data-sizey="11"] { height:1740px; }
 [data-sizey="12"] { height:1900px; }
 [data-sizey="13"] { height:2060px; }
 [data-sizey="14"] { height:2220px; }
 [data-sizey="15"] { height:2380px; }
 [data-sizex="1"] { width:140px; }
 [data-sizex="2"] { width:300px; }
 [data-sizex="3"] { width:460px; }
 [data-sizex="4"] { width:620px; }
 [data-sizex="5"] { width:780px; }
 [data-sizex="6"] { width:940px; }
</style></head>

<body>

    <h1>Add widgets dynamically</h1>
    <p>Create a grid adding widgets from an Array (not from HTML) using <code>add_widget</code> method. Widget position (col, row) not specified.</p>

<!--    <div class="gridster ready">
        <ul style="width: 1210px; position: relative; height: 325px;">
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="1" data-row="1" data-col="1">Testing</li>
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="3" data-row="1" data-col="2">1</li>
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="3" data-row="1" data-col="5">2</li>
            <li style="display: list-item;" class="gs-w" data-sizey="1" data-sizex="2" data-row="1" data-col="8">3</li>
            <li style="display: list-item;" class="gs-w" data-sizey="1" data-sizex="4" data-row="2" data-col="8">4</li>
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="1" data-row="3" data-col="1">5</li>
            <li style="display: list-item;" class="gs-w" data-sizey="1" data-sizex="2" data-row="1" data-col="10">6</li>
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="3" data-row="3" data-col="2">7</li>
            <li style="display: list-item;" class="gs-w" data-sizey="1" data-sizex="1" data-row="3" data-col="5">8</li>
            <li style="display: list-item;" class="gs-w" data-sizey="2" data-sizex="2" data-row="3" data-col="6">9</li>
            <li style="display: list-item;" class="gs-w" data-sizey="3" data-sizex="1" data-row="3" data-col="8">10</li>
        </ul>
    </div>-->
<div class="gridster ready">
          <ul style="height: 480px; width: 960px; position: relative;">
            <li style="min-width: 140px; min-height: 140px;" class="gs-w" data-row="1" data-col="1" data-sizex="4" data-sizey="1">
                <span class="gs-resize-handle gs-resize-handle-both"></span>
                sjdfkdshfsdk
            </li>
            <li style="position: absolute;" class="gs-w" data-row="2" data-col="4" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>

            <li style="position: absolute; min-width: 140px; min-height: 140px;" class="gs-w" data-row="2" data-col="3" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
            <li style="position: absolute;" class="gs-w" data-row="1" data-col="5" data-sizex="2" data-sizey="2"><span class="gs-resize-handle gs-resize-handle-both"></span></li>

            <li style="position: absolute;" class="try gs-w player-revert" data-row="3" data-col="4" data-sizex="1" data-sizey="1" data-max-sizex="1" data-max-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
            <li style="position: absolute;" class="gs-w" data-row="3" data-col="1" data-sizex="2" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
            <li class="gs-w" data-row="3" data-col="5" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>

            <li class="gs-w" data-row="3" data-col="6" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
            <li style="position: absolute;" class="gs-w" data-row="3" data-col="3" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>

            <li class="gs-w" data-row="2" data-col="1" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
            <li style="min-width: 140px; min-height: 140px;" class="gs-w" data-row="2" data-col="2" data-sizex="1" data-sizey="1"><span class="gs-resize-handle gs-resize-handle-both"></span></li>
          </ul>
        </div>

    <!--<script type="text/javascript" src="assets/jquery.js"></script>-->
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/grid/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript" id="code">
    var gridster;

    $(function(){

      gridster = $(".gridster > ul").gridster({
          widget_margins: [5, 5],
          widget_base_dimensions: [100, 55]
      }).data('gridster');

      var widgets = [
          ['<li>0</li>', 1, 2],
          ['<li>1</li>', 3, 2],
          ['<li>2</li>', 3, 2],
          ['<li>3</li>', 2, 1],
          ['<li>4</li>', 4, 1],
          ['<li>5</li>', 1, 2],
          ['<li>6</li>', 2, 1],
          ['<li>7</li>', 3, 2],
          ['<li>8</li>', 1, 1],
          ['<li>9</li>', 2, 2],
          ['<li>10</li>', 1, 3]
      ];

      $.each(widgets, function(i, widget){
          gridster.add_widget.apply(gridster, widget)
      });

    });
    </script>


</body></html>
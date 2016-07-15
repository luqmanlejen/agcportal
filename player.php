<style>

    body{ margin : 0; padding : 0;}

</style>

<object width="640" height="480" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="flashvideo">

    <param value="player.swf" name="movie">

    <param value="file=<?php echo $_GET['video']; ?>&amp;&amp;rotatetime=10&amp;autostart=false" name="FlashVars">

    <param value="high" name="quality">

    <param value="window" name="wmode">

    <param value="true" name="allowfullscreen">      

    <embed width="640" height="480" border="0" flashvars="file=<?php echo $_GET['video']; ?>&amp;&amp;rotatetime=10&amp;autostart=false" quality="high" allowfullscreen="true" wmode="window" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" src="player.swf" allowscriptaccess="always" name="flashvideo">

</object>

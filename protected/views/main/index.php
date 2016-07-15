
<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<link rel="stylesheet" media="screen" href="<?php echo $baseUrl; ?>/css/sequencejs-theme.modern-slide-in.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ruluko|Sirin+Stencil">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    if (typeof jQuery == 'undefined') {
        document.write(unescape('%3Cscript src="<?php echo $baseUrl; ?>/scripts/jquery-min.js" %3E%3C/script%3E'));
    }
</script>
<script src="<?php echo $baseUrl; ?>/scripts/jquery.sequence-min.js"></script>
<script src="<?php echo $baseUrl; ?>/sequencejs-options.modern-slide-in.js"></script>

<div class="wrapper row1">
  <header id="header" class="full_width clear">
      <img src="<?php echo $baseUrl; ?>/images/Header_logo.png" alt=""/>
    <div id="header-contact">
      <ul class="list none">
          <li><a href="#"><span class="icon-suitcase"></span>User</a></li>
          <li><a href="#"><span class="icon-desktop"></span>Public</a></li>
          <li><a href="#"><span class="icon-phone"></span>Staff</a></li>
      </ul>
    </div>
  </header>
</div>

<div class="sequence-theme">
    <div id="sequence">

        <img class="sequence-prev" src="<?php echo $baseUrl; ?>/images/bt-prev.png" alt="Previous Frame" />
        <img class="sequence-next" src="<?php echo $baseUrl; ?>/images/bt-next.png" alt="Next Frame" />

        <ul class="sequence-canvas">
            <li class="animate-in" style="margin-top: 25%; padding: 151px 48px;">
                <?php include "content.php"; ?>
            </li>
            <li>
                <h2 class="title">Creative Control</h2>
                <h3 class="subtitle">Create unique sliders using CSS3 transitions</h3>
            </li>
            <li>
                <h2 class="title">Cutting Edge</h2>
                <h3 class="subtitle">Supports modern browsers, old browsers (IE7+), touch devices and responsive designs</h3>
            </li>
        </ul>
    </div>
</div>


<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetArticleDetails($_GET['artikel_id'], 'title'); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;<?php echo PortalElement::GetArticleDetails($_GET['artikel_id'], 'title'); ?></div> 

    <?php echo PortalElement::GetArticleDetails($_GET['artikel_id'], 'content'); ?>

</div>

<script src="scripts/leftmenu.js"></script>
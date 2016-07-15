<!--<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php // echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php // echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>-->

<div class="">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 

    <?php echo PortalElement::GetArticles('content'); ?>

</div>
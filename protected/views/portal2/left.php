<div id="sidebar_1" class="sidebar one_third first">

    <aside>

        <h2><?php echo PortalElement::GetMasterTitle(); ?></h2>

        <nav><ul id="leftmenu" class=""><?php echo PortalElement::GetLeftMenu(); ?></ul></nav>

    </aside>

</div>

<div class="two_third">

    <h1 class="nospace"><?php echo PortalElement::GetMenuTitle(); ?></h1>

    <div class="breadcrumbs"><?php echo PortalElement::GetBreadcrumbs(); ?></div> 

    <?php echo PortalElement::GetArticles('content'); ?>

</div>

<script src="scripts/leftmenu.js"></script>

<script>

    jQuery.noConflict()(function($) {

        $(".mj_accordion .mj_accordion_item").click(function() {
            $(".mj_accordion .mj_accordion_item").removeClass("active");
            $(".mj_accordion .mj_accordion_content").slideUp("normal");
            if ($(this).next().is(":hidden") == true) {
                $(this).addClass("active");
                $(this).next().slideDown("normal");
                return false;
            }
        });
        $(".mj_accordion .mj_accordion_content").hide();
        $(".mj_accordion .mj_accordion_content:eq(0)").show();
        $('.mj_accordion .mj_accordion_item:eq(0)').addClass("active");

        $('.mj_tab .mj_tab_contents div').hide();
        $('.mj_tab .mj_tab_contents #tab0').show();
        $('.mj_tab .mj_tab_items div').click(function() {
            var target = $(this).data("tab");
            $('.mj_tab .mj_tab_items div').removeClass("active");
            $('.mj_tab .mj_tab_contents div').hide();

            $(this).addClass("active");
            $('.mj_tab .mj_tab_contents ' + target).show();
        });

    });

</script>
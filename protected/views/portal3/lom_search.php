<div class='one_quarter first'><?php // echo $category; ?></div>

<form method="post" action="<?= $url ?>" id="lomlist">
    <!--<div class='three_quarter push10'>-->
        <?php
//        echo CHtml::dropDownList('parent_cat', $postcat, OstCategories::model()->getparentlist(), array('class' => 'pad10', 'style'=>'margin-left: 6.5%', 'ajax' => array(
//                'type' => 'POST',
//                'url' => CController::createUrl('ostCategories/changeparent2'),
//                'success' => 'function(data){
//                $("#parent_cat2").html(data);
//            }',
//        )));
        ?>
    <!--</div>-->

    <div class='one_quarter first'><?php echo $category; ?></div>

    <!--<div class='three_quarter push10'><?php // echo CHtml::dropDownList('parent_cat2', $postcat_sub, OstCategories::model()->getparentsublist($parent_cat), array('class' => 'pad10')); ?></div>-->
    <div class='three_quarter push10'><?php echo CHtml::dropDownList('parent_cat2', $postcat_sub, OstCategories::model()->getactlist(), array('class' => 'pad10')); ?></div>

    <div class='one_quarter first'><?php echo $keyword; ?></div>

    <div class='three_quarter push10'><input name="keyword" type='text' class='pad10' style='width:330px;' value="<?php echo $postkeyword; ?>"></div>

    <!--<div class='one_quarter first'><?php // echo $rev_only; ?></div>-->

    <!--<div class='three_quarter push10'><?php // echo CHtml::dropDownList('lom_rev', $postrev, array('0' => $n, '1' => $y), array('class' => 'pad10')); ?></div>-->

    <div class='one_quarter first'>&nbsp;</div>

    <div class='three_quarter push10'>

        <input value="<?php echo $search_btn; ?>" class="button small grey" type="submit" onclick="displayall(1)">&nbsp;

        <input value="<?php echo $reset_btn; ?>" class="button small orange" type="reset" onclick="javascript:location.href = 'index.php?r=portal2/lom&menu_id=b21XYmExVUhFOE4wempZdE1vNUVKdz09'">

    </div>

</form>
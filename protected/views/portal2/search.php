<?php
$keyword = '';

if (isset($_POST['search_keyword']) && $_POST['search_keyword'] != '')
    $keyword = $_POST['search_keyword'];
else if (isset($_GET['search_keyword']) && $_GET['search_keyword'] != '')
    $keyword = $_GET['search_keyword'];

function GetResult($keyword) {

    $oCommon = new PortalElement;

    $output = '';

    $query1 = "
              SELECT *
              FROM ost_menu a 
                INNER JOIN ost_articles b ON b.menu_id = a.id
              WHERE
                menu_type IN ('footer', 'header', 'others') AND
                b.approval_sts='publish' AND
                b.title LIKE '%" . $keyword . "%'
              ";

    /* ------------------------- */

    $result1 = Yii::app()->db->createCommand($query1)->queryAll();
    $total_pages = sizeof($result1);
    $targetpage = 'index.php?r=portal2/search&search_keyword=' . $keyword;
    $limit = 10;
    $page = 0;

    if (isset($_GET['page']))
        $page = $_GET['page'];

    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $query2 = $query1 . " LIMIT $start, $limit";

    /* ------------------------- */

    $trans_search_keyword = 'Keyword';

    $trans_search_record = 'Total Record Found';

    if (Yii::app()->session['lang'] == 'my') {

        $trans_search_keyword = 'Kata Kunci';

        $trans_search_record = 'Jumlah Rekod Dijumpai';
    }

    $output .= $trans_search_keyword . ' : <b>' . $keyword . '</b><br>' . $trans_search_record . ' : <b>' . $total_pages . '</b>';

    $result2 = Yii::app()->db->createCommand($query2)->queryAll();

    $model = $result2;

    if (sizeof($model) > 0) {

        $output .= '<ul class="list decimal pad10" start="' . ($start + 1) . '">';

        foreach ($model as $row) {

            $content = PortalElement2::strip_html_tags($row['content']);
            
            $startpoint = strpos($content, $keyword);            

            $content2 = substr($content, $startpoint, 500);

            $final_content = preg_replace('/' . $keyword . '/i', "<span class='highlight'>" . $keyword . "</span>", $content2);

            $url = GetUrl($row['id'], $row['menu_id']);
            
            $trans_search_result = '';
            
            if (Yii::app()->session['lang'] == 'my') {

                $trans_search_result = '<br>
                    <span style="color:gray;"><b><u>' . PortalTranslation::TranslateArticleTitle($row['id'], $row['menu_id']) . '</u></b><br>
                        ...' . substr(PortalElement2::strip_html_tags(PortalTranslation::TranslateArticleContent($row['id'], $row['content'])), $startpoint, 500) . '...</span>';
                    ;
            }
            
            $output.= '<li>
                            <div class="push20">
                                <a href="' . $url . '" class="hover" target="_blank"><b><u>' . $row['title'] . '</u></b></a><br>
                                ...' . $final_content . '...' .$trans_search_result.'
                            </div>
                        </li>';
        }

        $output .= '</ul>';
    }

    $output.= $oCommon->pagination($limit, $total_pages, $page, $targetpage);

    return $output;
}

function GetUrl($article_id, $menu_id) {

    $oCommon = new PortalElement;

    $url = '#';

    $model2 = OstMenu::model()->findByAttributes(array('id' => $menu_id));
    if (sizeof($model2) > 0) {
        $url = 'index.php?r=portal2/left&menu_id=' . $oCommon->encrypt_decrypt('encrypt', $model2['id']);
    }


    return $url;
}

$trans_search_title = 'Search Result';

$trans_search_breadcrumbs1 = 'Home';

if (Yii::app()->session['lang'] == 'my') {

    $trans_search_title = 'Keputusan Carian';

    $trans_search_breadcrumbs1 = 'Utama';
}
?>

<style>

    .highlight { background: yellow; }

</style>

<h1 class="nospace"><?php echo $trans_search_title; ?></h1>

<div class="breadcrumbs font-small"><a href="index.php"><?php echo $trans_search_breadcrumbs1; ?></a> &raquo; <a href="#"><?php echo $trans_search_title; ?></a></div>

<?php echo GetResult($keyword); ?>

<div class="clear"></div>
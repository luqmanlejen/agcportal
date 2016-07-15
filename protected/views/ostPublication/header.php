<?php
$title = 'Publication';
$leftmenuno = '20';
$exturl = '';

if (isset($_GET['doc_type'])) {

    //Speeches
    if ($_GET['doc_type'] == 'speeches') {
        $title = 'Speeches';
        $leftmenuno = '22';
        //$exturl = '&menu_id=192';
        $exturl = '&doc_type=speeches';
    }

    //Annual Report
    if ($_GET['doc_type'] == 'annual') {
        $title = 'Annual Report';
        $leftmenuno = '23';
        //$exturl = '&menu_id=190';
        $exturl = '&doc_type=annual';
    }

    //Activities Report
    if ($_GET['doc_type'] == 'activities') {
        $title = 'Activities Reports';
        $leftmenuno = '24';
        //$exturl = '&menu_id=194';
        $exturl = '&doc_type=activities';
    }
    
    //Press Release
    if ($_GET['doc_type'] == 'press') {
        $title = 'Press Release';
        $leftmenuno = '25';
        //$exturl = '&menu_id=194';
        $exturl = '&doc_type=press';
    }
}
?>

<script>
    $(function() {
        activemenu('20', <?php echo $leftmenuno; ?>);
    });
</script>
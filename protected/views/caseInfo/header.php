<?php
$title = 'Case Info';
$leftmenuno = '568';
$exturl = '';

if (isset($_GET['case_type'])) {
    
    //Appeal cases
    if ($_GET['case_type'] == 'appeal') {
        $title = 'Appeal Cases';
        $leftmenuno = '569';
        $exturl = '&case_type=appeal';
    }
    
    //Trial cases
    if ($_GET['case_type'] == 'trial') {
        $title = 'Trial Cases';
        $leftmenuno = '570';
        $exturl = '&case_type=trial';
    }
    
    //High Court Decision
    if ($_GET['case_type'] == 'court') {
        $title = 'High Court Decision';
        $leftmenuno = '571';
        $exturl = '&case_type=court';
    }
}
?>

<script>
    $(function() {
        activemenu('568', <?php echo $leftmenuno; ?>);
    });
</script>
<?php
if (isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] == 'my') {
    $time1 = 'pg';
    $time2 = 'ptg';
    $hari = "'Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'";
    $bulan = "'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'";
} else {
    $time1 = 'am';
    $time2 = 'pm';
    $hari = "'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'";
    $bulan = "'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'";
}
?>

<script>

    function updateClock() {
        var currentTime = new Date( );
        var currentHours = currentTime.getHours( );
        var currentMinutes = currentTime.getMinutes( );
        var currentSeconds = currentTime.getSeconds( );
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;// Pad the minutes and seconds with leading zeros, if required
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
        var timeOfDay = (currentHours < 12) ? "<?= $time1; ?>" : "<?= $time2; ?>"; // Choose either "AM" or "PM" as appropriate
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;// Convert the hours component to 12-hour format if needed
        currentHours = (currentHours == 0) ? 12 : currentHours;// Convert an hours component of "0" to "12"
        var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;// Compose the string for display
        jQuery.noConflict()(function($) {
            $("#clock").html(currentTimeString);
        });
    }

    function displaydate() {
        var date = new Date;
        var day = date.getDay();
        var days = new Array(<?= $hari; ?>);
        var d = date.getDate();
        var year = date.getFullYear();
        var month = date.getMonth();
        var months = new Array(<?= $bulan; ?>);
        var result = days[day] + ', ' + d + ' ' + months[month] + ' ' + year;
        jQuery.noConflict()(function($) {
            $("#date").html(result);
        });
    }

    jQuery.noConflict()(function($) {
        setInterval('updateClock()', 1000);
        displaydate();
    });

</script>

<span id="clock"></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
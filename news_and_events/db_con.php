<?php
    $host = "localhost";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($host, $user, $password) or die('Unable to connect!');

    mysqli_select_db($conn, "news_and_events") or die('No database selected!');

    $tz = 'Asia/Kolkata';   
   date_default_timezone_set($tz);
?>
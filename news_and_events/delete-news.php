<?php
    session_start();
    if (!isset($_SESSION['news_and_events_admin']) || !array_key_exists('news_and_events_admin', $_SESSION)) {
        header('location: login.php');
    } else {
        // do nothing
    }
    
    require_once "db_con.php";

    $ni = isset($_GET['ni']) ? $_GET['ni'] : die('Invalid Request!');

    $query = "UPDATE `news` SET `is_deleted` = '1', `admin_id` = '".$_SESSION['news_and_events_admin']."' WHERE `news`.`news_id` = ".$ni.";";
    $run_query = mysqli_query($conn, $query);

    if($run_query){
        header('location: .');
    } else {
        echo "Error Deleting News";
    }
?>
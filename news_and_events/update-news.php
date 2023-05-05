<?php
    session_start();
    if (!isset($_SESSION['news_and_events_admin']) || !array_key_exists('news_and_events_admin', $_SESSION)) {
        header('location: login.php');
    } else {
        // do nothing
    }
    
    require_once "db_con.php";

    $ni = isset($_POST['ni']) ? $_POST['ni'] : die('Invalid Request!');
    $title = isset($_POST['title']) ? $_POST['title'] : die('Invalid Request!');
    $description = isset($_POST['description']) ? $_POST['description'] : die('Invalid Request!');

    $query = "UPDATE `news` SET `title` = '".$title."', `description` = '".$description."', `admin_id` = '".$_SESSION['news_and_events_admin']."' WHERE `news`.`news_id` = ".$ni.";";
    $run_query = mysqli_query($conn, $query);

    if($run_query){
        header('location: ./?ni='.$ni);
    } else {
        echo "Error Updating News";
    }
?>
<?php
    session_start();
    if (!isset($_SESSION['news_and_events_admin']) || !array_key_exists('news_and_events_admin', $_SESSION)) {
        header('location: login.php');
    } else {
        // do nothing
    }
    
    require_once "db_con.php";

    $title = isset($_POST['title']) ? $_POST['title'] : die('Invalid Request!');
    $description = isset($_POST['description']) ? $_POST['description'] : die('Invalid Request!');

    $query = "INSERT INTO `news` (`title`, `description`, `admin_id`) VALUES ('".trim($title)."', '".trim($description)."', '".$_SESSION['news_and_events_admin']."');";
    $run_query = mysqli_query($conn, $query);

    if($run_query){

        $query2 = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1;";
        $run_query2 = mysqli_query($conn, $query2);

        $fetch = mysqli_fetch_assoc($run_query2);

        header('location: ./?ni='.$fetch['news_id']);
    } else {
        echo "Error Adding News";
    }

    echo $query;
?>
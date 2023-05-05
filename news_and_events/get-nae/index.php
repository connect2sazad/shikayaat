<?php

    require_once "../db_con.php";

    if(isset($_GET['nc'])){
        if($_GET['nc'] == 'all'){
            $suffix_query =  ";";
        } else if(ctype_digit($_GET['nc'])){
            $suffix_query =  " LIMIT " . $_GET['nc'] . ";";
        } else {
            $data = array("err" => "Invalid nc value");
            header('Content-Type: application/json');
            echo json_encode($data);
            die;
        }
    } else {
        $suffix_query =  " LIMIT 6;";
    }

    $query = "SELECT * FROM `news` WHERE `news`.`is_deleted` = 0 ORDER BY `news_id` DESC" . $suffix_query;
    $run_query = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($run_query)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
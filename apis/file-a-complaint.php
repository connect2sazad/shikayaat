<?php

    include_once "./api.php";

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : '';
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $priority = isset($_POST['priority']) ? $_POST['priority'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $suggestions = isset($_POST['suggestions']) ? $_POST['suggestions'] : '';

    $refno = date("dmyhis");
    $authid  = "default";

    $query = "INSERT INTO `complaints`(`refno`, `title`, `authid`, `typeid`, `userid`, `priority`, `description`, `suggestions`, `attachments`, `responses`, `reminders`, `date`, `status`, `resolve_date`) VALUES ('".$refno."', '".$title."', '".$authid."', '".$type_id."', '".$userid."', '".$priority."', '".$description."', '".$suggestions."','[]','[]','[]', '', 'pending','')";
    $run_query = mysqli_query($conn, $query);

    if($run_query){
        $arr['status'] = "1";
        $arr['response'] = "SUCCESS";
        $arr['message'] = "#".$refno." is the complaint reference id!";
        $arr['refno'] = "#".$refno;
        
        echo json_encode($arr);
    } else {
        $arr['status'] = "0";
        $arr['response'] = "INSERTION_REJECTED";
        $arr['message'] = "Unable to file the complaint! Try again.";
        $arr['refno'] = NULL;

        echo json_encode($arr);
    }

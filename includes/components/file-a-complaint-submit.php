<?php

    include_once "../../constants.php";
    include_once ___FUNCTIONS___;
    
    session_start();

    $userid = $_SESSION[USER_GLOBAL_VAR];
    $refno = getRandomId(11);

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $to_userid = isset($_POST['to_userid']) ? $_POST['to_userid'] : '';
    $priorityid = isset($_POST['priorityid']) ? $_POST['priorityid'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $suggestions = isset($_POST['suggestions']) ? $_POST['suggestions'] : '';

    $responses = '[]';
    $reminders = '[]';
    $status = 'pending';
    $attachmets = array();

    // attachments
    $countattachments = count($_FILES['file']['name']);
    for($i=0;$i<$countattachments;$i++){
        $filename = $_FILES['file']['name'][$i];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = $refno."_".$i.".".$ext;
        echo $filename."<br/>";
   
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'][$i], ___ASSETS___.'uploads/'.$filename);

        array_push($attachmets, $filename);
    
   }

   
?>
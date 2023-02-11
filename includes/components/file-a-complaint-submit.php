<?php

    include_once "../../constants.php";
    include_once ___FUNCTIONS___;
    
    session_start();

    $userid = $_SESSION[USER_GLOBAL_VAR];
    $refno = getRandomId(11, 'alpha_uppercase_numeric');

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $to_userid = isset($_POST['to_userid']) ? $_POST['to_userid'] : '';
    $priorityid = isset($_POST['priorityid']) ? $_POST['priorityid'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $suggestions = isset($_POST['suggestions']) ? $_POST['suggestions'] : '';

    $responses = array();
    $reminders = array();
    $status = 'pending';
    $attachmets = array();

    // attachments
    $countattachments = count($_FILES['file']['name']);
    for($i=0;$i<$countattachments;$i++){
        $filename = $_FILES['file']['name'][$i];
        if($filename == '')
            break;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = $refno."_".($i+1).".".$ext;
        // echo $filename."<br/>";
   
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'][$i], ___ASSETS___.'uploads/'.$filename);

        array_push($attachmets, $filename);
    
   }

   $query = "INSERT INTO `complaints` (`refno`, `title`, `userid`, `to_userid`, `priorityid`, `description`, `suggestions`, `attachments`, `responses`, `reminders`, `status`) VALUES ('".$refno."', '".$title."', '".$userid."', '".$to_userid."', '".$priorityid."', '".$description."', '".$suggestions."', '".json_encode($attachmets)."', '".json_encode($responses)."', '".json_encode($reminders)."', 'pending');";
   $res = runQuery($query);
   if($res!=1){
    echo "<h1>Unable to Add Complaint</h1>";
    echo "<h2>Create an error page for this</h2>";
   } else {
    header('location: ../../page/?pn=all-complaints');
   }

?>
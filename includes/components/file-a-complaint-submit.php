<?php

    include_once "../../constants.php";
    include_once ___FUNCTIONS___;
    
    session_start();

    $from_userid = $_SESSION[USER_GLOBAL_VAR];
    $refno = getRandomId(11, 'alpha_uppercase_numeric');

    $conn = get_conn();

    $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : '';
    $to_userid = isset($_POST['to_userid']) ? mysqli_real_escape_string($conn, $_POST['to_userid']) : '';
    $priorityid = isset($_POST['priorityid']) ? mysqli_real_escape_string($conn, $_POST['priorityid']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $suggestions = isset($_POST['suggestions']) ? mysqli_real_escape_string($conn, $_POST['suggestions']) : '';

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

   $query = "INSERT INTO `complaints` (`refno`, `title`, `userid`, `to_userid`, `priorityid`, `description`, `suggestions`, `attachments`, `status`) VALUES ('".$refno."', '".$title."', '".$from_userid."', '".$to_userid."', '".$priorityid."', '".$description."', '".$suggestions."', '".json_encode($attachmets)."', 'pending');";
   $res = runQuery($query);
   if($res!=1){
    // echo $query;
    header('location: ../../404.php');
   } else {
    header('location: ../../page/?pn=all-complaints');
   }

?>
<?php

    include_once "../../constants.php";
    include_once ___FUNCTIONS___;
    
    session_start();

    $from_userid = $_SESSION[USER_GLOBAL_VAR];
    
    $conn = get_conn();
    
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $to_userid = isset($_POST['to_userid']) ? mysqli_real_escape_string($conn, $_POST['to_userid']) : '';
    $refno = isset($_POST['refno']) ? mysqli_real_escape_string($conn, $_POST['refno']) : '';

    $response_refno = getRandomId(6, 'alpha_uppercase_numeric');
    $response_refno = "RES".$refno.$response_refno;

    $attachmets = array();

    // attachments
    $countattachments = count($_FILES['file']['name']);
    for($i=0;$i<$countattachments;$i++){
        $filename = $_FILES['file']['name'][$i];
        if($filename == '')
            break;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = $response_refno."_".($i+1).".".$ext;
   
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'][$i], ___ASSETS___.'uploads/'.$filename);

        array_push($attachmets, $filename);
    
   }

   $query = "INSERT INTO `responses` (`response_refno`, `refno`, `from_userid`, `to_userid`, `description`, `attachments`) VALUES ('".$response_refno."', '".$refno."', '".$from_userid."', '".$to_userid."', '".$description."', '".json_encode($attachmets)."');";
   $res = runQuery($query);
   if($res!=1){
    echo $query;
    // header('location: ../../404.php');
   } else {
    header('location: '.SITE_HOME.'page/?pn=complain-details&refno='.$refno);
   }

?>
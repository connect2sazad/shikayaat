<?php

    include_once "./api.php";

    $authid = isset($_POST['authid']) ? $_POST['authid'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $query = "SELECT * FROM authorities WHERE `authid` = '".$authid."';";
    $run_query = mysqli_query($conn, $query);

    if(!mysqli_num_rows($run_query)){
        $arr = array(
            "status" => "0",
            "response" => "NO_AUTHORITY_FOUND",
            "message" => "No such authority found!"
        );
        echo json_encode($arr);
        die();
    }

    $row = mysqli_fetch_assoc($run_query);

    if($password == $row['password']){
        $arr['status'] = "1";
        $arr['response'] = "SUCCESS";
        $arr['message'] = "Login successful!";

        // set session variable
        $_SESSION['shikayat_authorityid'] = $authid;

        echo json_encode($arr);
    } else {
        $arr = array(
            "status" => "0",
            "response" => "INCORRECT_CREDS",
            "message" => "Your authority username or password is incorrect!"
        );
        echo json_encode($arr);
    }

?>
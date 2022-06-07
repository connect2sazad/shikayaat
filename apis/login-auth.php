<?php

    include_once "./api.php";

    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $query = "SELECT * FROM users WHERE `userid` = '".$userid."';";
    $run_query = mysqli_query($conn, $query);

    if(!mysqli_num_rows($run_query)){
        $arr = array(
            "status" => "0",
            "response" => "NO_USER_FOUND",
            "message" => "No such user found!"
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
        $_SESSION['shikayat_userid'] = $userid;

        echo json_encode($arr);
    } else {
        $arr = array(
            "status" => "0",
            "response" => "INCORRECT_CREDS",
            "message" => "Your username or password is incorrect!"
        );
        echo json_encode($arr);
    }

?>
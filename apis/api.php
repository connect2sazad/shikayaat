<?php
    session_start();

    include_once "../assets/config.php";

    $app_key_id = isset($_POST['app_key_id']) ? $_POST['app_key_id'] : '';

    if($app_key_id != APP_KEY_ID){
        $arr = array(
            "status" => "0",
            "response" => "ACCESS_DENIED",
            "message" => "You are not authorized to access!"
        );
        $arr = json_encode($arr);
        die($arr) or exit($arr);
    }
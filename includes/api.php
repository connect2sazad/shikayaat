<?php

    include_once "../constants.php";
    include_once ___FUNCTIONS___;


    define('API_KEY', md5('MTDNG-PDDGD-MHMV4-F2MBY-RCXKK'));

    $received_api_key = isset($_POST['api_key']) ? $_POST['api_key'] : die('Invalid Request');

    if($received_api_key != API_KEY){
        die('Invalid API Key!');
    }

    $request_type = isset($_POST['request_type']) ? $_POST['request_type'] : die('Invalid Request Type');

    if(function_exists($request_type)){

        $response = $request_type(secure_API_KEY($_POST));

        $response = json_encode($response);
        print_r($response);
    } else {
        die('Requested API Not Found');
    }


?>
<?php

    define('DB_HOST', 'localhost'); // host
    define('DB_USER', 'root'); // username
    define('DB_PASSWORD', ''); // password
    define('DB_NAME', 'shikayaat'); // database name

    //Connecting to database
    if($conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD)){

        //connecting to table
        if(!mysqli_select_db($conn, DB_NAME)){

            echo "Error in connecting to database - ".mysqli_error($conn); // error message if database not found

        }
    } else {

        echo "Error in connection - ".mysqli_error($conn); // error message if host is not connected

    }

    $query__url = "SELECT * FROM options WHERE `option_name` = 'site_url'";
    $run_query_url = mysqli_query($conn, $query__url);
    $url = mysqli_fetch_assoc($run_query_url);

    if(!defined('SITE_URL'))
        define('SITE_URL', $url['option_value']);
    
    if(!defined('APP_KEY_ID'))
        define('APP_KEY_ID', 'e44d7c13-e9c6-46d6-9b1d-ea0bc946aa72');
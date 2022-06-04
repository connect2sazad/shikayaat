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
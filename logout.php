<?php

    include_once "./constants.php";
    
    include_once ___FUNCTIONS___;

    session_start();

    if(array_key_exists(USER_GLOBAL_VAR,$_SESSION)){
        unset($_SESSION[USER_GLOBAL_VAR]);
    }

    session_destroy();

    header('location: ./');

?>
<?php
    session_start();

    if(array_key_exists('news_and_events_admin',$_SESSION)){
        unset($_SESSION['news_and_events_admin']);
    }

    session_destroy();

    header('location: ./');
?>
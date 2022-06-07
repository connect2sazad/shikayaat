<?php
    session_start();

    if(isset($_SESSION['shikayat_userid']))	
        unset($_SESSION['shikayat_userid']);

    session_destroy();

    header('location: ../login');

<?php
    session_start();

    if(isset($_SESSION['shikayat_authorityid']))	
        unset($_SESSION['shikayat_authorityid']);

    session_destroy();

    header('location: ../login');

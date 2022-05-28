<?php

    function get_header($home=true){
        if($home){
            include_once './assets/header.php';
        } else {
            include_once '../assets/header2.php';
        }
    }

    function get_sidebar($home=true){
        if($home){
            include_once './assets/sidebar.php';
        } else {
            include_once '../assets/sidebar2.php';
        }
    }

    function getheader($home=true, $loc='./'){
        $loc = $home ? './' : '../';
        $header = '<header>
            <div class="project-title-container">
                <div class="logo-img">
                    <div class="img-holder">
                        <img src="'.$loc.'images/logo.png" alt="Logo">
                    </div>
                </div>
                <div class="project-title">
                    shikayaat
                </div>
            </div>
            <div class="control-menu">
                <ul class="control-menu-list">
                    <li>home</li>
                    <li>about</li>
                    <li>sales</li>
                    <li>support</li>
                    <li>connect2sazad</li>
                    <li>logout</li>
                </ul>
            </div>
        </header>';
        return $header;
    }

?>
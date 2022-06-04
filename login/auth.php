<?php
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    echo $userid." ".$password;
?>
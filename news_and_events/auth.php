<?php
    require_once 'db_con.php';

    session_start();

    $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : die();
    $password = isset($_POST['password']) ? $_POST['password'] : die();

    $query = "SELECT * FROM `admins` WHERE admin_id='$admin_id'";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
        $row = mysqli_fetch_assoc($run_query);
 
        if (password_verify($password, $row['password'])) {
            $_SESSION['news_and_events_admin'] = $row['admin_id'];
            header("Location: ./");
            exit();
        } else {
            $error_message = "Unauthorized!";
        }
    } else {
        die('Unauthorized!');
    }
?>
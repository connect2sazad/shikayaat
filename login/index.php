<?php
session_start();
include_once "../assets/config.php";

$query = "SELECT * FROM options WHERE `option_name` = 'home'";
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);

if (isset($_SESSION['shikayat_userid'])) {
    header('Location: '.$fetch['option_value']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style001.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>sign in - shikayaat — the digital complaint box</title>
    <script src="../script/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#continue').on('click', function(event) {
                event.preventDefault();
                var data = {
                    'userid': $('#userid').val(),
                    'password': $('#password').val()
                };
                $.ajax({
                    url: "auth.php",
                    method: "post",
                    data: data,
                    dataType: "text",
                    success: function(strMessage) {
                        var response = JSON.parse(strMessage);
                        if (response.status == "1") {
                            $('#notification-icon').html("&#10004;");
                            $('#notification-title').text("Success");
                            $('#notification-message').text(response.message);
                            $('#notification-container').css("display", "flex");
                            window.location.href = '<?=$fetch['option_value']?>';
                        } else {
                            if (response.response == 'NO_USER_FOUND') {
                                $('#notification-icon').html("!");
                                $('#notification-title').text("Info");
                                $('#notification-message').text(response.message);
                            } else {
                                $('#notification-icon').html("!");
                                $('#notification-title').text("Warning");
                                $('#notification-message').text(response.message);
                            }
                            $('#notification-container').css("display", "flex");
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>

    <?php
    include_once "../assets/notifications.php";
    ?>

    <div class="container">
        <div class="flex-box-wrapper">
            <div class="form-inner-wrapper">
                <div class="row height-100">
                    <div class="column-50">
                        <div class="image-conatiner flex-center">
                            <div class="form-side-content">
                                <div class="row height-20">
                                    <div class="form-logo-container" id="form-logo-container">
                                        <div class="logo-img">
                                            <div class="img-holder">
                                                <img src="../images/logo.png" alt="Logo">
                                            </div>
                                        </div>
                                        <div class="project-title">
                                            shikayaat
                                        </div>
                                    </div>
                                </div>
                                <div class="row height-70">
                                    <div class="welcome-text-container">
                                        <div class="welcome-text">
                                            welcome
                                        </div>
                                        <div class="message-text">
                                            Sign in <br />
                                            to continue access
                                        </div>
                                    </div>
                                </div>
                                <div class="row height-10">www.shikayaat.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="column-50">
                        <div class="form-container">
                            <div class="form-heading">Sign In</div>
                            <div>
                                <!-- <form> -->
                                <div class="input-control">
                                    <label for="userid">User Id</label>
                                    <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <input type="submit" class="submit-btn" id="continue" value="CONTINUE" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
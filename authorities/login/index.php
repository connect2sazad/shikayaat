<?php
session_start();
include_once "../../assets/config.php";

$query = "SELECT * FROM options WHERE `option_name` = 'authority_home'";
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);
$home = $fetch['option_value'];

if (isset($_SESSION['shikayat_authorityid'])) {
    header('Location: '.$home);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=SITE_URL?>images/favicon.ico" type="image/x-icon">
    <title>authority sign in - shikayaat — the digital complaint box</title>
    <link rel="stylesheet" href="<?=SITE_URL?>styles/style001.css">
    <style>
        .bgcolor-violet{
            background-color: violet;
        }
    </style>
    <script src="<?=SITE_URL?>script/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#continue').on('click', function(event) {
                event.preventDefault();
                var data = {
                    'app_key_id': '<?=APP_KEY_ID?>',
                    'authid': $('#authid').val(),
                    'password': $('#password').val()
                };
                $.ajax({
                    url: "<?=SITE_URL?>apis/authorities-login-auth.php",
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
                            window.location.href = '<?=$home?>';
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
    include_once "../../assets/notifications.php";
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
                                                <img src="<?=SITE_URL?>images/logo.png" alt="Logo">
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
                                            Authorities Center
                                        </div>
                                    </div>
                                </div>
                                <div class="row height-10">www.shikayaat.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="column-50">
                        <div class="form-container bgcolor-violet">
                            <div class="form-heading">Sign In</div>
                            <div>
                                <!-- <form> -->
                                <div class="input-control">
                                    <label for="authid">Authorization Id</label>
                                    <input class="bgcolor-violet" type="text" id="authid" name="authid" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="password">Password</label>
                                    <input class="bgcolor-violet" type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true">
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
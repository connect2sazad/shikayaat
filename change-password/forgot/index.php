<?php

require_once "../../constants.php";
require_once ___FUNCTIONS___;

session_start();
if (!isset($_SESSION[USER_GLOBAL_VAR]) || !array_key_exists(USER_GLOBAL_VAR, $_SESSION)) {
} else {
    header('location: .');
}

// ob_start("minifier");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= loadMetaData() ?>
    <?= loadTitleAndFavicon('Forgot Password') ?>
    <?= loadStyleSheets() ?>
    <link rel="stylesheet" href="<?= systemVariable('SITE_DIR') . 'assets/css/style001.css' ?>">
    <?= loadScripts() ?>
    <?= getAjaxRequester() ?>
    <script>
        $(document).ready(() => {

            $('#request-btn').on('click', function() {
                e.preventDefault();

                var form_data = $('#uid_email').val();
                form_data += "&request_type=forgot_password_send_otp";

                ajax_request(form_data).done(function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4fbe87",
                        }).showToast();


                        if (response.request_status == 'approved') {
                            $('#status-field').html(response.request_status + ' | <a href="../../login.php?uid=' + btoa(response.email) + '">Login</a>');
                        } else {
                            $('#status-field').text(response.request_status + " | " + response.description);
                        }

                    } else {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "red",
                        }).showToast();
                    }
                });

            });

            // $('#forgot_password_send_email').on('submit', function(e) {
            //     e.preventDefault();

            //     var form_data = $('#forgot_password_send_email').serialize();
            //     form_data += "&request_type=forgot_password_send_email";

            // ajax_request(form_data).done(function(response) {
            //     console.log(response);
            //     if (response.status == 'success') {
            //         Toastify({
            //             text: response.message,
            //             duration: 3000,
            //             close: true,
            //             gravity: "top",
            //             position: "right",
            //             backgroundColor: "#4fbe87",
            //         }).showToast();


            //         if(response.request_status == 'approved'){
            //             $('#status-field').html(response.request_status+' | <a href="../../login.php?uid='+btoa(response.email)+'">Login</a>');
            //         } else {
            //             $('#status-field').text(response.request_status+" | "+response.description);
            //         }

            //     } else {
            //         Toastify({
            //             text: response.message,
            //             duration: 3000,
            //             close: true,
            //             gravity: "top",
            //             position: "right",
            //             backgroundColor: "red",
            //         }).showToast();
            //     }
            // });
            // });
        });
    </script>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="loader-overlay">
        <div class="loader-gate left-loader">
            <div class="logo-left">
                <img src="../../assets/images/logo-left.png">
            </div>
        </div>

        <div class="loader-gate right-loader">
            <div class="logo-right">
                <img src="../../assets/images/logo-right.png">
            </div>
        </div>

        <div class="shikayaat-name">
            shikayaat
        </div>
    </div>



    <div class="container height-auto">
        <div class="flex-box-wrapper">
            <div class="form-inner-wrapper register-form">
                <div class="row height-100">

                    <div class="column">
                        <div class="form-container bg-grey border-radius">
                            <div class="form-heading">Forgot Password?</div>

                            <form id="forgot_password_send_email" method="POST" autocomplete="off">
                                <!-- <div class="input-control-row"> -->
                                <div class="input-control">
                                    <label for="email">User Id or Email*</label>
                                    <input type="text" id="uid_email" name="email" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <!-- </div> -->

                                <div class="input-control login-register-single">
                                    <button type="button" id="request-btn">Send OTP</button>
                                </div>

                                <div class="input-control">
                                    <label for="title">Status</label>
                                    <div class="readonly" id="status-field">Enter an Email Id to check!</div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= loadFooterScripts(false) ?>
</body>

</html>
<?php
ob_end_flush();
?>
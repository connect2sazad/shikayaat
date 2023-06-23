<?php

require_once "./constants.php";
require_once ___FUNCTIONS___;

session_start();
if (!isset($_SESSION[USER_GLOBAL_VAR]) || !array_key_exists(USER_GLOBAL_VAR, $_SESSION)) {
} else {
    header('location: .');
}

if(isset($_GET['uid'])){
    $uid = base64_decode($_GET['uid']);
} else {
    $uid = " ";
}

// ob_start("minifier");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= loadMetaData() ?>
    <?= loadTitleAndFavicon('Login to Continue') ?>
    <?= loadStyleSheets() ?>
    <link rel="stylesheet" href="<?= systemVariable('SITE_DIR') . 'assets/css/style001.css' ?>">
    <?= loadScripts() ?>
    <?= getAjaxRequester() ?>
    <script>
        $(document).ready(() => {
            $('#shikayaat_login').on('submit', function(e) {
                e.preventDefault();

                var form_data = $('#shikayaat_login').serialize();
                form_data += "&request_type=login";


                ajax_request(form_data).done(function(response) {
                    // console.log(response);
                    if (response.status == 'success') {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4fbe87",
                        }).showToast();
                        // alert('fssd')

                        window.location.href = "./";

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
        });
    </script>
</head>

<body>

    <div class="loader-overlay">
        <div class="loader-gate left-loader">
            <div class="logo-left">
                <img src="./assets/images/logo-left.png">
            </div>
        </div>

        <div class="loader-gate right-loader">
            <div class="logo-right">
                <img src="./assets/images/logo-right.png">
            </div>
        </div>

        <div class="shikayaat-name">
            shikayaat
        </div>
    </div>



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
                                                <img src="<?= SITE_DIR ?>assets/images/logo.png" alt="Logo">
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
                                            Sign in or Register<br />
                                            to continue access
                                        </div>
                                    </div>
                                </div>
                                <div class="row height-10">www.shikayaat.com</div>
                            </div>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-container bg-grey">
                            <div class="form-heading">Sign In</div>
                            <div>
                                <form id="shikayaat_login" method="POST">
                                    <div class="input-control">
                                        <label for="userid">User Id or Email</label>
                                        <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" value="<?=$uid?>" required aria-required="true">
                                    </div>
                                    <div class="input-control">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true">
                                    </div>
                                    <div class="input-control login-register">
                                        <button type="submit">Log In</button>
                                        <button type="button" onclick="window.location.href='./register/'">Register</button>
                                        <button type="button" onclick="window.location.href='./change-password/forgot/'">Forgot Password</button>
                                    </div>
                                    <div class="input-control login-register">
                                        <button type="button" onclick="window.location.href='./register/check/'">Check Registration Request</button>
                                    </div>
                                </form>
                            </div>
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





<?php

require_once "../constants.php";
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
    <?= loadTitleAndFavicon('Register for shikayaat') ?>
    <?= loadStyleSheets() ?>
    <link rel="stylesheet" href="<?= systemVariable('SITE_DIR') . 'assets/css/style001.css' ?>">
    <?= loadScripts() ?>
    <?= getAjaxRequester() ?>
    <script>
        $(document).ready(() => {
            $('#shikayaat_register').on('submit', function(e) {
                e.preventDefault();

                var form_data = $('#shikayaat_register').serialize();
                form_data += "&request_type=register";

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

                        // window.location.href = "./";
                        $('#shikayaat_register').remove();
                        var status = '<div class="input-control">';
                        status += '<label for="title">Status</label>'
                        status += '<div class="readonly" id="status-field">Registration Request Sent Successfully! <br/> Kindly Note the Reference No for easy tracking! Your request reference no is <strong>'+response.request_refno+'</strong>.<br>'
                        status += '<a href="./check?refno='+response.request_refno+'">Click here</a> to track request!</div></div>';
                        $('#form-wrapper').html(status);


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
                <img src="../assets/images/logo-left.png">
            </div>
        </div>

        <div class="loader-gate right-loader">
            <div class="logo-right">
                <img src="../assets/images/logo-right.png">
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
                            <div class="form-heading">Register</div>
                            <div id="form-wrapper">
                                <form id="shikayaat_register" method="POST" autocomplete="off">
                                    <div class="input-control">
                                        <label for="user_type">User Type*</label>
                                        <select name="user_type_id" id="user_type" required>
                                            <?php
                                            $user_types = getAllUserTypes();
                                            while ($row = mysqli_fetch_assoc($user_types)) {
                                                if ($row['user_type_id'] != 1)
                                                    echo '<option value="' . $row['user_type_id'] . '">' . $row['user_type_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-control-row">
                                        <div class="input-control">
                                            <label for="first_name">First Name*</label>
                                            <input type="text" id="first_name" name="first_name" autocomplete="off" spellcheck="false" required aria-required="true">
                                        </div>
                                        <div class="input-control">
                                            <label for="last_name">Last Name*</label>
                                            <input type="text" id="last_name" name="last_name" autocomplete="off" spellcheck="false" required aria-required="true">
                                        </div>
                                    </div>
                                    <div class="input-control-row">
                                        <div class="input-control">
                                            <label for="userid">Select User Id*</label>
                                            <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" required aria-required="true" oninput="checkUserIdExistence(this.value)" onchange="checkUserIdExistence(this.value)">
                                        </div>
                                        <div class="input-control">
                                            <label for="email">Email Id*</label>
                                            <input type="email" id="email" name="email" autocomplete="off" spellcheck="false" required aria-required="true" oninput="checkEmailExistence(this.value)" onchange="checkEmailExistence(this.value)">
                                        </div>
                                    </div>
                                    <div class="input-control-row">
                                        <div class="input-control">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true" onchange="checkPasswords()">
                                        </div>
                                        <div class="input-control">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" id="cpassword" name="cpassword" autocomplete="off" spellcheck="false" required aria-required="true" onchange="checkPasswords()">
                                        </div>
                                    </div>

                                    <div class="input-control login-register-single">
                                        <button type="submit" id="request-btn">Request Registration</button>
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
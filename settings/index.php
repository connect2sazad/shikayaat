<?php
include_once "../assets/asset_manager.php";
include_once "../assets/secure.php";
include_once "../assets/config.php";

$query = "SELECT * FROM options WHERE `option_name` = 'site_url'";
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= $fetch['option_value'] ?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= $fetch['option_value'] ?>styles/style002.css">
    <title>User Settings - shikayaat — the digital complaint box</title>

</head>

<body>
    <main>
        <?php
        get_header($fetch['option_value']);
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('settings', $fetch['option_value']);
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">

                    <div class="card">

                        <form autocomplete="off" method="post" action="">

                            <div id="saved-complaint">
                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                </svg>
                                <div class="message-text">Saved!</div>
                            </div>

                            <div id="form-complaint">
                                <h1 class="form-heading">General Settings</h1>
                                <div class="input-control">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="userid">User Id</label>
                                    <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" id="cpassword" name="cpassword" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <input type="submit" id="submit-btn" class="submit-btn" value="SEND" />
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?= $fetch['option_value'] ?>script/base.js"></script>
    <script>
        var submit_btn = document.getElementById("submit-btn");
        var form_complaint = document.getElementById("form-complaint");
        var saved_complaint = document.getElementById("saved-complaint");
        submit_btn.addEventListener("click", function() {
            form_complaint.style.display = "none";
            saved_complaint.style.display = "block";
        });
    </script>
    <!-- scripts -->
</body>

</html>
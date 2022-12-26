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
            get_sidebar('about', $fetch['option_value']);
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">
                    <div class="card">

                        <h1 class="form-heading">About</h1>

                        <div class="texts-holder">
                            <p class="font-size-25 text-align-justify">
                                <span class="set-logo-font font-size-35">shikayaat</span> is a digital complaint box that allows you to file complaints online and get
                                instant feedback from the organisation. It is a web-based application that is designed to be
                                used by people in the organisation to easify the long and hectic complain raising and resolving process by providing a suitable online platform for the complain filing and resolving. <br><br>
                                - Developer
                            </p>
                        </div>
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
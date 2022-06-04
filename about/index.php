<?php
include_once "../assets/asset_manager.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style002.css">
    <title>User Settings - shikayaat — the digital complaint box</title>

</head>

<body>
    <main>
        <?php
        get_header('../');
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('about');
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">

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

            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="../script/base.js"></script>
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
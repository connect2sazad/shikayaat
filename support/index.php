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
            get_sidebar('support');
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">

                    <h1 class="form-heading">Support</h1>

                    <div class="texts-holder">
                        <p class="font-size-25">
                            <b>For Non-Technical Support:</b> <br>
                            &emsp; Prof. Prahallad Sahoo <br>
                            &emsp; Contact No: <a href="tel:9861383117">+91-9861383117</a> <br>
                            &emsp; Email: <a href="mailto:prahalladsahoo@gita.edu.in">prahalladsahoo@gita.edu.in</a> <br>
                            &emsp; Mr. Lalatendu Jena <br>
                            &emsp; Contact No: <a href="tel:7978530308">+91-7978530308</a>
                        </p>
                        <p class="font-size-25">
                            <b>For Technical Support:</b> <br>
                            &emsp; Sazad Ahemad <br>
                            &emsp; B.Tech 3rd Year, CSIT <br>
                            &emsp; Contact No: <a href="tel:8596829975">+91-8596829975</a> <br>
                            &emsp; Email: <a href="mailto:mail2sazad@gmail.com">mail2sazad@gmail.com</a> <br>
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
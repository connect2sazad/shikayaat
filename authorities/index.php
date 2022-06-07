<?php
    include_once "../assets/asset_manager.php";
    include_once "../assets/config.php";
    include_once "./assets/secure-home.php";

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
    <link rel="shortcut icon" href="<?=$fetch['option_value']?>images/favicon.ico" type="image/x-icon">
    <title>shikayaat — the digital complaint box</title>
    <link rel="stylesheet" href="<?=$fetch['option_value']?>styles/style002.css">
    <link rel="stylesheet" href="<?=$fetch['option_value']?>fonts/fontawesome6/css/fontawesome.css">
    
</head>

<body>
    <main>
        <?php
            get_header($fetch['option_value']);
        ?>
        <div class="section-holder">
            <?php
                get_sidebar('home', $fetch['option_value']);
            ?>
            <section class="right-content-section" id="right-content-section">
                <br><br><br><br><br><br>
               dsfsd
               <?php
            print_r($fetch['option_value']);
        ?>
            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?=$fetch['option_value']?>script/base.js"></script>
    <!-- scripts -->

</body>

</html>
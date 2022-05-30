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
    <title>File a Complaint - shikayaat — the digital complaint box</title>
</head>

<body>
    <main>
        <?php
        get_header('../');
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('file-a-complaint');
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">

                    <div>
                        <h1>File a Complaint</h1>
                        <!-- <form> -->
                        <div class="input-control">
                            <label for="userid">Title</label>
                            <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" required aria-required="true">
                        </div>
                        <div class="input-control">
                            <label for="responsible-authority">Responsible Authority</label>
                            <select id="responsible-authority">
                                <option value="none" selected disabled>Select</option>
                                <option value="Examination Department">Examination Department</option>
                                <option value="Transportation Department">Transportation Department</option>
                            </select>
                        </div>
                        <div class="input-control">
                            <label for="priority">Priority</label>
                            <select id="priority">
                                <option value="none" selected disabled>Select</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="input-control">
                            <label for="description">Problem Description</label>
                            <textarea></textarea>
                        </div>
                        <div class="input-control">
                            <label for="suggestions">Suggestions</label>
                            <textarea></textarea>
                        </div>
                        <div class="input-control">
                            <label for="file-input">Attachments</label>
                            <input type="file" id="file-input" multiple>
                        </div>
                        <div class="input-control">
                            <input type="submit" class="submit-btn" value="COMPLAIN" />
                        </div>
                    </div>

                </div>

            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="../script/base.js"></script>
    <!-- scripts -->
</body>

</html>
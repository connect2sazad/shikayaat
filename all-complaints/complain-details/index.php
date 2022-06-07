<?php
include_once "../../assets/asset_manager.php";
include_once "../../assets/secure.php";
include_once "../../assets/config.php";

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
    <link rel="stylesheet" href="<?=$fetch['option_value']?>styles/style002.css">
    <title>File a Complaint - shikayaat — the digital complaint box</title>
</head>

<body>
    <main>
        <?php
        get_header($fetch['option_value']);
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('all-complaints', $fetch['option_value']);
            ?>
            <section class="right-content-section" id="right-content-section">
                <div class="content-wrapper">
                    <div id="form-complaint">
                        <h1 class="form-heading">Complain Details</h1>
                        <div class="input-control">
                            <label for="ticket-no">Ticket No</label>
                            <input type="text" id="ticket-no" name="ticket-no" autocomplete="off" value="#78213" spellcheck="false" readonly>
                        </div>
                        <div class="input-control">
                            <label for="time">Time</label>
                            <input type="text" id="time" name="time" autocomplete="off" value="<?php echo date('Y-m-d h:i:s')?>" spellcheck="false" readonly>
                        </div>
                        <div class="input-control">
                            <label for="title">Problem</label>
                            <input type="text" id="title" name="title" autocomplete="off" spellcheck="false" value="Unable to avail bus card though paid for it" readonly>
                        </div>
                        <div class="input-control">
                            <label for="responsible-authority">Responsible Authority</label>
                            <input type="text" id="authority" name="authority" autocomplete="off" spellcheck="false" value="Transportation Department" readonly>
                        </div>
                        <div class="input-control">
                            <label for="priority">Priority</label>
                            
                            <input type="text" id="priority" name="priority" autocomplete="off" spellcheck="false" value="High" readonly>
                        </div>
                        <div class="input-control">
                            <label for="description">Problem Description</label>
                            <div class="textarea-resembler">Low blood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure…</div>
                        </div>
                        <div class="input-control">
                            <label for="suggestions">Suggestions</label>
                            <div class="textarea-resembler">Low blood pressure (less than 90/60) is referred to as hypotension. A blood pressure reading is represented by two digits. The first and more important of the two measures systolic pressure, or the pressure in the arteries as the heart beats and fills them with blood. The second number represents diastolic pressure, or the pressure…</div>
                        </div>
                        <div class="input-control">
                            <label for="file-input">Attachments</label>
                            <input type="file" id="file-input" multiple>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?=$fetch['option_value']?>script/base.js"></script>
    <!-- scripts -->
</body>

</html>
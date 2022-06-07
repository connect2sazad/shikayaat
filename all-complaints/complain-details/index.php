<?php
include_once "../../assets/asset_manager.php";
include_once "../../assets/secure.php";
include_once "../../assets/config.php";

$refno = isset($_GET['refno']) ? $_GET['refno'] : '';

$query = "SELECT * FROM ((`complaints` INNER JOIN `priorities` ON complaints.priority = priorities.priorityid) INNER JOIN `types` ON complaints.typeid = types.typeid) WHERE complaints.refno=".$refno.";";
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= SITE_URL ?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= SITE_URL ?>styles/style002.css">
    <title>File a Complaint - shikayaat — the digital complaint box</title>
</head>

<body>
    <main>
        <?php
        get_header(SITE_URL);
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('all-complaints',  SITE_URL);
            ?>
            <section class="right-content-section" id="right-content-section">
                <div class="content-wrapper">
                    <div id="form-complaint">
                        <h1 class="form-heading">Complain Details</h1>
                        <div class="input-control">
                            <label for="ticket-no">Ticket No</label>
                            <input type="text" id="ticket-no" name="ticket-no" autocomplete="off" value="#<?= $fetch['refno'] ?>" spellcheck="false" readonly>
                        </div>
                        <div class="input-control">
                            <label for="time">Time</label>
                            <input type="text" id="time" name="time" autocomplete="off" value="<?= $fetch['date'] ?>" spellcheck="false" readonly>
                        </div>
                        <div class="input-control">
                            <label for="title">Problem</label>
                            <input type="text" id="title" name="title" autocomplete="off" spellcheck="false" value="<?= $fetch['title'] ?>" readonly>
                        </div>
                        <div class="input-control">
                            <label for="responsible-authority">Responsible Authority</label>
                            <input type="text" id="authority" name="authority" autocomplete="off" spellcheck="false" value="<?= $fetch['authority_type_name'] ?>" readonly>
                        </div>
                        <div class="input-control">
                            <label for="priority">Priority</label>
                            <input type="text" id="priority" name="priority" autocomplete="off" spellcheck="false" value="<?= $fetch['priority_name'] ?>" readonly>
                        </div>
                        <div class="input-control">
                            <label for="description">Problem Description</label>
                            <div class="textarea-resembler"><?= $fetch['description'] ?></div>
                        </div>
                        <div class="input-control">
                            <label for="suggestions">Suggestions</label>
                            <div class="textarea-resembler"><?= $fetch['suggestions'] ?></div>
                        </div>
                        <div class="input-control">
                            <label for="file-input">Attachments</label>
                            <input type="file" id="file-input" disabled multiple>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?= SITE_URL ?>script/base.js"></script>
    <!-- scripts -->
</body>

</html>
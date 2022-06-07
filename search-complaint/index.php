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
            get_sidebar('search-complaint', $fetch['option_value']);
            ?>
            <section class="right-content-section" id="right-content-section">
                <div class="content-wrapper">
                    <h1 class="form-heading">Search for a Complaint</h1>
                    <div>
                        <div class="input-control">
                            <label for="search-text">Search For</label>
                            <input type="text" id="search-text" >
                        </div>
                    </div>
                    <div class="colors-meaning">
                        <div class="color-indentity-holder">
                            <div class="color-box red-color"></div>
                            <div class="color-meaning">High Priority</div>
                        </div>
                        <div class="color-indentity-holder">
                            <div class="color-box yellow-color"></div>
                            <div class="color-meaning">Medium Priority</div>
                        </div>
                        <div class="color-indentity-holder">
                            <div class="color-box white-color"></div>
                            <div class="color-meaning">Low Priority</div>
                        </div>
                        <div class="color-indentity-holder">
                            <div class="color-box dddddd-color"></div>
                            <div class="color-meaning">Solved</div>
                        </div>
                    </div>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Ticket No</th>
                                <th>Problem</th>
                                <th>Responsible</th>
                                <th>Priority</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="high solved">
                                <td>#78213</td>
                                <td><a href="../all-complaints/complain-details?ref=78213">Unable to avail bus card though paid for it</a></td>
                                <td>Transportation Department</td>
                                <td>High</td>
                                <td><?php echo date('Y-m-d')?></td>
                                <td>Status</td>
                            </tr>
                            <tr class="medium">
                                <td>#78214</td>
                                <td><a href="#">Unable to avail bus card though paid for it</a></td>
                                <td>Transportation Department</td>
                                <td>Medium</td>
                                <td><?php echo date('Y-m-d')?></td>
                                <td>Status</td>
                            </tr>
                            <tr class="low">
                                <td>#78215</td>
                                <td><a href="#">Unable to avail bus card though paid for it</a></td>
                                <td>Transportation Department</td>
                                <td>Low</td>
                                <td><?php echo date('Y-m-d')?></td>
                                <td>Status</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?=$fetch['option_value']?>script/base.js"></script>
    <!-- scripts -->
</body>

</html>
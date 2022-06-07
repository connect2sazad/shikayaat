<?php
include_once "../assets/asset_manager.php";
include_once "../assets/secure.php";
include_once "../assets/config.php";

$query_priorities = "SELECT * FROM priorities";
$run_query_priorities = mysqli_query($conn, $query_priorities);
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
            get_sidebar('search-complaint', SITE_URL);
            ?>
            <section class="right-content-section" id="right-content-section">
                <div class="content-wrapper">
                    <h1 class="form-heading">Search for a Complaint</h1>
                    <div>
                        <div class="input-control">
                            <label for="search-text">Search For</label>
                            <input type="text" id="search-text">
                        </div>
                    </div>
                    <div class="colors-meaning">
                    <?php
                        if (mysqli_num_rows($run_query_priorities) > 0) {
                            while ($row = mysqli_fetch_assoc($run_query_priorities)) {
                                // echo ' <option value="' . $row['priorityid'] . '">' . $row['prioririty_name'] . ' - ' . $row['color'] . '</option>';
                                echo '<div class="color-indentity-holder">';
                                echo '<div class="color-box color-' . $row['color'] . '"></div>';
                                if ($row['is_priority'])
                                    echo '<div class="color-meaning">' . $row['priority_name'] . ' Priority</div>';
                                else
                                    echo '<div class="color-meaning">' . $row['priority_name'] . '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
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
                                <td><?php echo date('Y-m-d') ?></td>
                                <td>Status</td>
                            </tr>
                            <tr class="medium">
                                <td>#78214</td>
                                <td><a href="#">Unable to avail bus card though paid for it</a></td>
                                <td>Transportation Department</td>
                                <td>Medium</td>
                                <td><?php echo date('Y-m-d') ?></td>
                                <td>Status</td>
                            </tr>
                            <tr class="low">
                                <td>#78215</td>
                                <td><a href="#">Unable to avail bus card though paid for it</a></td>
                                <td>Transportation Department</td>
                                <td>Low</td>
                                <td><?php echo date('Y-m-d') ?></td>
                                <td>Status</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?= SITE_URL ?>script/base.js"></script>
    <!-- scripts -->
</body>

</html>
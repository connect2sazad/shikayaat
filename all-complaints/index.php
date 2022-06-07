<?php
include_once "../assets/asset_manager.php";
include_once "../assets/secure.php";
include_once "../assets/config.php";

$query_priorities = "SELECT * FROM priorities";
$run_query_priorities = mysqli_query($conn, $query_priorities);


$query_complaints = "SELECT complaints.refno, complaints.title, types.authority_type_name, complaints.date, complaints.status, complaints.priority, priorities.priority_name  FROM ((`complaints` 
INNER JOIN `priorities` ON complaints.priority = priorities.priorityid)
INNER JOIN `types` ON complaints.typeid = types.typeid);";
$run_query_complaints = mysqli_query($conn, $query_complaints);


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
                    <h1 class="form-heading">All Complaints</h1>
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
                            <?php

                            if (mysqli_num_rows($run_query_complaints) > 0) {
                                while ($row = mysqli_fetch_assoc($run_query_complaints)) {
                                    echo '<tr class="'.$row['priority'].' '.$row['status'].'">';
                                    echo '<td>#'.$row['refno'].'</td>';
                                    echo '<td><a href="./complain-details?refno='.$row['refno'].'">'.$row['title'].'</a></td>';
                                    echo '<td>'.$row['authority_type_name'].'</td>';
                                    echo '<td>'.$row['priority_name'].'</td>';
                                    echo '<td>'.$row['date'].'</td>';
                                    echo '<td>'.$row['status'].'</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>

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
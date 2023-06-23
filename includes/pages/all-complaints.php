<div class="content-wrapper">
    <div class="card">

        <h1 class="card-heading">All Complaints</h1>

        <div class="card-content">


            <div class="colors-meaning">
                <?php
                $priorities_list = getPrioritiesList();
                if (mysqli_num_rows($priorities_list) > 0) {
                    while ($row = mysqli_fetch_assoc($priorities_list)) {
                        // echo ' <option value="' . $row['priorityid'] . '">' . $row['prioririty_name'] . ' - ' . $row['color'] . '</option>';
                        echo '<div class="color-indentity-holder">';
                        if ($row['is_priority']) {
                            echo '<div class="color-box" style="background-color: #' . $row['color'] . '"></div>';
                            echo '<div class="color-meaning">' . $row['priority_name'] . ' Priority</div>';
                        }

                        echo '</div>';
                    }
                }
                ?>
            </div>

            <!-- Complaints -->
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Ticket No</th>
                        <th>Problem</th>
                        <th>Responsible</th>
                        <th>Priority</th>
                        <th>Reporting Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $current_user = $_SESSION[USER_GLOBAL_VAR];
                    $current_user_type = getCurrentUser();
                    if($current_user_type['user_type_id'] == 1){
                        $complaints_list = getComplaintsList();
                    } else {
                        $complaints_list = getComplaintsListWithUser($_SESSION[USER_GLOBAL_VAR]);
                    }
                    if (mysqli_num_rows($complaints_list) > 0) {
                        while ($row = mysqli_fetch_assoc($complaints_list)) {
                            // if($row['userid'] == $_SESSION[USER_GLOBAL_VAR] || $row['to_userid'] == $_SESSION[USER_GLOBAL_VAR]){
                                $get_tr_color = $row['priorityid'];
                                $get_tr_color = getPriorityColor($get_tr_color);
                                echo '<tr class="' . $row['status'] . '" style="background-color: #' . $get_tr_color . '">';
                                echo '<td><a href="./?pn=complain-details&refno=' . $row['refno'] . '">' . $row['refno'] . '</a></td>';
                                echo '<td><a href="./?pn=complain-details&refno=' . $row['refno'] . '">' . $row['title'] . '</a></td>';
                                echo '<td>' . $row['to_userid'] . '</td>';
                                echo '<td><a href="'.SITE_DIR.'page/?pn=all-complaints&pid=' . $row['priorityid'] . '">' . $row['priorityid'] . '</a></td>';
                                echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                echo '<td>' . $row['status'] . '</td>';
                                echo '</tr>';
                            // }
                        }
                    } else {
                        echo '<tr><td colspan="6">No complaints found!</td></tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

</div>

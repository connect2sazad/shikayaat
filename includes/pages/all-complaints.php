<div class="content-wrapper">
    <div class="card">

        <h1 class="form-heading">All Complaints</h1>

        <div class="colors-meaning">
            <?php
            $priorities_list = getPrioritiesList();
            if (mysqli_num_rows($priorities_list) > 0) {
                while ($row = mysqli_fetch_assoc($priorities_list)) {
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
                $complaints_list = getComplaintsList();
                if (mysqli_num_rows($complaints_list) > 0) {
                    while ($row = mysqli_fetch_assoc($complaints_list)) {
                        echo '<tr class="' . $row['priorityid'] . ' ' . $row['status'] . '">';
                        echo '<td>' . $row['refno'] . '</td>';
                        echo '<td><a href="./?pn=complain-details&refno=' . $row['refno'] . '">' . $row['title'] . '</a></td>';
                        echo '<td>' . $row['to_userid'] . '</td>';
                        echo '<td>' . $row['priorityid'] . '</td>';
                        echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '</tr>';
                    }
                }
                ?>

            </tbody>
        </table>

    </div>

</div>
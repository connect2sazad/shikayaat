<?php
if(getCurrentUser()['user_type_id'] != 1){
    $html = ob_get_clean();
    header('Location: '.SITE_HOME.'404.php');
    exit;
}
$pending_requests = getRequestsByStatus('pending');
$approved_requests = getRequestsByStatus('approved');
$rejected_requests = getRequestsByStatus('rejected');
?>
<div class="content-wrapper">
    <div class="card">

        <h1 class="card-heading">Requests</h1>

        <div class="card-content">
            <div class="tab-container">
                <div class="tab-header">
                    <button class="tab-button active" data-tab="tab1">Pending Requests(<?= mysqli_num_rows($pending_requests) ?>)</button>
                    <button class="tab-button" data-tab="tab2">Approved Requests(<?= mysqli_num_rows($approved_requests) ?>)</button>
                    <button class="tab-button" data-tab="tab3">Rejected Requests(<?= mysqli_num_rows($rejected_requests) ?>)</button>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="tab-panel active">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Ref No</th>
                                    <th>Request Type</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Requesting Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($pending_requests) > 0) {
                                    while ($row = mysqli_fetch_assoc($pending_requests)) {
                                        echo '<tr id="row-' . $row['request_refno'] . '">';
                                        echo '<td>' . $row['request_refno'] . '</td>';
                                        echo '<td>' . $row['request_type'] . '</td>';
                                        echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                        echo '<td class="request-action-btns">
                                            <button type="button" onclick="change_request_status(\'' . $row['request_refno'] . '\', \'approved\')">Approve</button>
                                            <button type="button" class="bg-red" onclick="change_request_status(\'' . $row['request_refno'] . '\', \'rejected\')">Reject</button>
                                        </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="6">No requests found!</td></tr>
                                    ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div id="tab2" class="tab-panel">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Ref No</th>
                                    <th>Request Type</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Requesting Time</th>
                                    <th>Approval Time</th>
                                    <th>Restore</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($approved_requests) > 0) {
                                    while ($row = mysqli_fetch_assoc($approved_requests)) {
                                        echo '<tr id="row-' . $row['request_refno'] . '">';
                                        echo '<td>' . $row['request_refno'] . '</td>';
                                        echo '<td>' . $row['request_type'] . '</td>';
                                        echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                        echo '<td>' . date_format(date_create($row['updated_at']), 'M d, Y - h:i a') . '</td>';
                                        echo '<td class="request-action-btns">
                                            <button type="button" onclick="change_request_status(\'' . $row['request_refno'] . '\', \'pending\')">Restore</button>
                                            </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="6">No requests found!</td></tr>
                                    ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div id="tab3" class="tab-panel">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Ref No</th>
                                    <th>Request Type</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Requesting Time</th>
                                    <th>Rejection Time</th>
                                    <th>Restore</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($rejected_requests) > 0) {
                                    while ($row = mysqli_fetch_assoc($rejected_requests)) {
                                        echo '<tr id="row-' . $row['request_refno'] . '">';
                                        echo '<td>' . $row['request_refno'] . '</td>';
                                        echo '<td>' . $row['request_type'] . '</td>';
                                        echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                        echo '<td>' . date_format(date_create($row['updated_at']), 'M d, Y - h:i a') . '</td>';
                                        echo '<td class="request-action-btns">
                                            <button type="button" onclick="change_request_status(\'' . $row['request_refno'] . '\', \'pending\')">Restore</button>
                                            </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="7">No requests found!</td></tr>
                                    ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
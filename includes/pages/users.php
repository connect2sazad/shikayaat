<?php
if (getCurrentUser()['user_type_id'] != 1) {
    $html = ob_get_clean();
    header('Location: ' . SITE_HOME . '404.php');
    exit;
}

$active_users = getAllUsers(1);
$inactive_users = getAllUsers(0);
$deleted_users = getDeletedUsers();
?>
<div class="content-wrapper">
    <div class="card">

        <h1 class="card-heading">Requests</h1>

        <div class="card-content">
            <div class="tab-container">
                <div class="tab-header">
                    <button class="tab-button active" data-tab="tab1">Active Users(<?= mysqli_num_rows($active_users) ?>)</button>
                    <button class="tab-button" data-tab="tab2">Inactive Users(<?= mysqli_num_rows($inactive_users) ?>)</button>
                    <button class="tab-button" data-tab="tab3">Deleted Users(<?= mysqli_num_rows($deleted_users) ?>)</button>
                    <button class="tab-button" data-tab="tab4">New User</button>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="tab-panel active">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Creation Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (mysqli_num_rows($active_users) > 0) {
                                    while ($row = mysqli_fetch_assoc($active_users)) {
                                        if ($row['userid'] != $_SESSION[USER_GLOBAL_VAR]) {

                                            // echo $row['userid']."   =    ".$_SESSION[USER_GLOBAL_VAR]."<br>";
                                            echo '<tr id="row-' . $row['userid'] . '">';
                                            echo '<td>' . $count . '</td>';
                                            echo '<td>' . $row['first_name'] . " " . $row['last_name'] . '</td>';
                                            echo '<td>' . $row['userid'] . '</td>';
                                            echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                            echo '<td class="request-action-btns">
                                            <button type="button" onclick="change_user_status(\'' . $row['userid'] . '\', \'0\')">Deactivate</button>
                                            <button type="button" class="bg-red" onclick="change_user_delete(\'' . $row['userid'] . '\', \'1\')">Delete</button>
                                        </td>';
                                            echo '</tr>';
                                            $count++;
                                        }
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="7">No users found!</td></tr>
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
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Creation Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (mysqli_num_rows($inactive_users) > 0) {
                                    while ($row = mysqli_fetch_assoc($inactive_users)) {
                                        if ($row['userid'] != $_SESSION[USER_GLOBAL_VAR]) {

                                            // echo $row['userid']."   =    ".$_SESSION[USER_GLOBAL_VAR]."<br>";
                                            echo '<tr id="row-' . $row['userid'] . '">';
                                            echo '<td>' . $count . '</td>';
                                            echo '<td>' . $row['first_name'] . " " . $row['last_name'] . '</td>';
                                            echo '<td>' . $row['userid'] . '</td>';
                                            echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                            echo '<td class="request-action-btns">
                                            <button type="button" onclick="change_user_status(\'' . $row['userid'] . '\', \'1\')">Activate</button>
                                            <button type="button" class="bg-red" onclick="change_user_delete(\'' . $row['userid'] . '\', \'1\')">Delete</button>
                                        </td>';
                                            echo '</tr>';
                                            $count++;
                                        }
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="7">No users found!</td></tr>
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
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Creation Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (mysqli_num_rows($deleted_users) > 0) {
                                    while ($row = mysqli_fetch_assoc($deleted_users)) {
                                        if ($row['userid'] != $_SESSION[USER_GLOBAL_VAR]) {

                                            // echo $row['userid']."   =    ".$_SESSION[USER_GLOBAL_VAR]."<br>";
                                            echo '<tr id="row-' . $row['userid'] . '">';
                                            echo '<td>' . $count . '</td>';
                                            echo '<td>' . $row['first_name'] . " " . $row['last_name'] . '</td>';
                                            echo '<td>' . $row['userid'] . '</td>';
                                            echo '<td>' . getUserTypeNameByUserTypeId($row['user_type_id']) . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . date_format(date_create($row['created_at']), 'M d, Y - h:i a') . '</td>';
                                            echo '<td class="request-action-btns">
                                            <button type="button" class="bg-red" onclick="change_user_delete(\'' . $row['userid'] . '\', \'0\')">Restore</button>
                                        </td>';
                                            echo '</tr>';
                                            $count++;
                                        }
                                    }
                                } else {
                                    echo '
                                        <tr><td colspan="7">No users found!</td></tr>
                                    ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div id="tab4" class="tab-panel">
                        <form id="shikayaat_register" method="POST" autocomplete="off">
                            <div class="input-control">
                                <label for="user_type">User Type*</label>
                                <select name="user_type_id" id="user_type" required>
                                    <?php
                                    $user_types = getAllUserTypes();
                                    while ($row = mysqli_fetch_assoc($user_types)) {
                                        if ($row['user_type_id'] != 1)
                                            echo '<option value="' . $row['user_type_id'] . '">' . $row['user_type_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-control-row">
                                <div class="input-control">
                                    <label for="first_name">First Name*</label>
                                    <input type="text" id="first_name" name="first_name" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                                <div class="input-control">
                                    <label for="last_name">Last Name*</label>
                                    <input type="text" id="last_name" name="last_name" autocomplete="off" spellcheck="false" required aria-required="true">
                                </div>
                            </div>
                            <div class="input-control-row">
                                <div class="input-control">
                                    <label for="userid">Select User Id*</label>
                                    <input type="text" id="userid" name="userid" autocomplete="off" spellcheck="false" required aria-required="true" oninput="checkUserIdExistence(this.value)" onchange="checkUserIdExistence(this.value)">
                                </div>
                                <div class="input-control">
                                    <label for="email">Email Id*</label>
                                    <input type="email" id="email" name="email" autocomplete="off" spellcheck="false" required aria-required="true" oninput="checkEmailExistence(this.value)" onchange="checkEmailExistence(this.value)">
                                </div>
                            </div>
                            <div class="input-control-row">
                                <div class="input-control">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off" spellcheck="false" required aria-required="true" onchange="checkPasswords()">
                                </div>
                                <div class="input-control">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" id="cpassword" name="cpassword" autocomplete="off" spellcheck="false" required aria-required="true" onchange="checkPasswords()">
                                </div>
                            </div>

                            <div class="input-control login-register-single">
                                <button type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
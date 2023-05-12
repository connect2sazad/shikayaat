<?php
$refno = isset($_GET['refno']) ? $_GET['refno'] : '';
$complaint = getComplaintDetails($refno);
?>
<div class="content-wrapper fd-col">
    <div class="card">

        <h1 class="card-heading"><a href="./?pn=all-complaints">All Complaints</a> / <?= $refno ?> <span><?= $complaint['status'] ?></span></h1>

        <div class="card-content">
            <?php
            print_r($complaint);
            ?>
            <div class="input-control">
                <label for="title">Reference No</label>
                <div class="readonly"><?= $complaint['refno'] ?></div>
            </div>
            <div class="input-control">
                <label for="title">Ticket Raised On</label>
                <div class="readonly"><?= date_format(date_create($complaint['created_at']), 'M d, Y - h:i a') ?></div>
            </div>
            <div class="input-control">
                <label for="title">Problem</label>
                <div class="readonly"><?= $complaint['title'] ?></div>
            </div>
            <div class="input-control">
                <label for="title">Complaint Against</label>
                <div class="readonly"><?= getNameFromUserId($complaint['to_userid'], true) ?></div>
            </div>
            <div class="input-control">
                <label for="title">Priority</label>
                <div class="readonly"><?= getPriorityNameFromPriorityId($complaint['priorityid']) ?></div>
            </div>
            <div class="input-control">
                <label for="title">Description</label>
                <div class="readonly"><?= $complaint['description'] ?></div>
            </div>
            <div class="input-control">
                <label for="title">Suggestions</label>
                <div class="readonly"><?= $complaint['suggestions'] ?></div>
            </div>
            <div class="input-control">
                <label for="title">Attachments</label>
                <div class="attachments-container">
                    <?php
                    $attachments = $complaint['attachments'];
                    $attachments = json_decode($attachments);
                    if (count($attachments) == 0) {
                        echo "No files were attached to this ticket!";
                    }
                    foreach ($attachments as $attachment) {
                        $extension = pathinfo($attachment, PATHINFO_EXTENSION);

                        $videoExtensions = array("3g2", "3gp", "avi", "flv", "m4v", "mkv", "mov", "mp4", "mpeg", "mpg", "ogv", "webm", "wmv");
                        $imageExtensions = array("bmp", "gif", "jpeg", "jpg", "png", "svg", "tiff", "webp", "ico", "jfif", "pjpeg", "pjp", "heic", "heif", "bat", "bpg", "jpe", "jif", "jiff", "jng", "jp2", "jps", "wbmp", "xbm", "dib");
                        $audioExtensions = array("aac", "aiff", "flac", "m4a", "mp3", "ogg", "wav", "wma");

                        if (in_array($extension, $videoExtensions)) {
                            $file_display = "video.png";
                        } else if (in_array($extension, $imageExtensions)) {
                            $file_display = "image.png";
                        } else  if (in_array($extension, $audioExtensions)) {
                            $file_display = "audio.png";
                        } else if ($extension == 'doc' || $extension == 'docx') {
                            $file_display = 'docx.png';
                        } else if ($extension == 'xls' || $extension == 'xlsx' || $extension == 'csv') {
                            $file_display = 'xls.png';
                        } else if ($extension == 'xls' || $extension == 'xlsx' || $extension == 'csv') {
                            $file_display = 'xls.png';
                        } else {
                            $file_display = 'file.png';
                        }

                        $file_display = SITE_DIR . "assets/images/file-icons/" . $file_display;
                        $file_location = SITE_DIR . "assets/uploads/" . $attachment;
                        echo '<div class="another-file">';
                        echo '<a href="' . $file_location . '" target="_blank"><img src="' . $file_display . '"></a>';
                        echo '<div class="file-name"><a href="' . $file_location . '" target="_blank">' . $attachment . '</a></div></div>';
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>

    <?php
    if ($complaint['status'] == 'revoked' || $complaint['status'] == 'rejected' || $complaint['status'] == 'closed' || $complaint['status'] == 'resolved') {
    } else {
    ?>

        <div class="card">


            <div class="input-control m-0">
                <button class="submit-btn bg-red" onclick="revoke_complaint('<?= $complaint['refno'] ?>')" id="revoke-<?= $complaint['refno'] ?>">REVOKE</button>

                <?php
                    $reminders = getRemindersByRefno($complaint['refno']);
                    $row_count = mysqli_num_rows($reminders);
                    if ($row_count > 0) {
                        mysqli_data_seek($reminders, $row_count - 1);
                        $last_row = mysqli_fetch_assoc($reminders);

                        $last_reminder_time = new DateTime($last_row['created_at']);
                        $current_time = new DateTime(date('Y-m-d h:i:s'));

                        // find time difference
                        $interval = $current_time->diff($last_reminder_time);
                        $minutes = $interval->i;

                        
                        $next_reminder_in_minutes = systemVariable('reminder_cool_down_minutes') - $minutes;

                        if ($next_reminder_in_minutes < 1) {

                            echo '<button class="submit-btn bg-green" onclick="remind_complaint(\'' . $complaint['refno'] . '\')" id="reminder-' . $complaint['refno'] . '">REMIND</button>';
                        } else {


                            $hours = floor($next_reminder_in_minutes / 60);
                            $remainingMinutes = $next_reminder_in_minutes % 60;
                            echo '<div class="reminder-status">Next Reminder can be sent after next ' . $hours . " hours and " . $remainingMinutes . " minutes!" . '</div>';
                        }
                    } else {
                        echo '<div class="reminder-status">Next Reminder can be sent after next ' . $hours . " hours and " . $remainingMinutes . " minutes!" . '</div>';
                    }
                ?>


            </div>
        </div>

    <?php
    }
    ?>

</div>


<!-- scripts -->
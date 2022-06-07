<?php
include_once "../assets/asset_manager.php";
include_once "../assets/secure.php";
include_once "../assets/config.php";

$query = "SELECT * FROM types";
$run_query_authority_types = mysqli_query($conn, $query);

$query = "SELECT * FROM priorities";
$run_query_priorities = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=SITE_URL?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=SITE_URL?>styles/style002.css">
    <title>File a Complaint - shikayaat — the digital complaint box</title>
    <script src="<?=SITE_URL?>script/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submit-btn').on('click', function(event) {
                event.preventDefault();
                var data = {
                    'app_key_id': '<?=APP_KEY_ID?>',
                    'title': $('#title').val(),
                    'type_id': $('#type-id').val(),
                    'userid': '<?=$_SESSION['shikayat_userid'];?>',
                    'priority': $('#priority').val(),
                    'description': $('#description').val(),
                    'suggestions': $('#suggestions').val(),
                };
                $.ajax({
                    url: "<?=SITE_URL?>apis/file-a-complaint.php",
                    method: "post",
                    data: data,
                    dataType: "text",
                    success: function(strMessage) {
                        var response = JSON.parse(strMessage);
                        if (response.status == "1") {
                            $('#notification-icon').html("&#10004;");
                            $('#notification-title').text("Success");
                            $('#notification-message').text(response.message);
                            $('#notification-container').css("display", "flex");
                            $("#ref_no_show").text(response.refno);
                            $("#href-refno").attr('href', "<?=SITE_URL?>all-complaints/complain-details?refno="+response.refno);
                            $("#form-complaint").hide();
                            $("#saved-complaint").show();
                            
                        } else {
                            if (response.response == 'INSERTION_REJECTED') {
                                $('#notification-icon').html("!");
                                $('#notification-title').text("Info");
                                $('#notification-message').text(response.message);
                                
                            } else {
                                $('#notification-icon').html("!");
                                $('#notification-title').text("Warning");
                                $('#notification-message').text(response.message);
                            }
                            $('#notification-container').css("display", "flex");
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
    <main>
        <?php
        get_header(SITE_URL);
        ?>
        <div class="section-holder">
            <?php
            get_sidebar('file-a-complaint', SITE_URL);
            ?>
            <section class="right-content-section" id="right-content-section">

                <div class="content-wrapper">

                    <div>
                        <!-- <form> -->

                        <div id="saved-complaint">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <div class="message-text">Your complaint has been saved! <br> Your complaint refno is <span id="ref_no_show"></span>. <a id="href-refno" href="">Check</a>.</div>
                        </div>

                        <div id="form-complaint">
                            <h1 class="form-heading">File a Complaint</h1>

                            <div class="input-control">
                                <label for="title">Problem</label>
                                <input type="text" id="title" name="title" autocomplete="off" spellcheck="false" required aria-required="true">
                            </div>
                            <div class="input-control">
                                <label for="type-id">Responsible Authority</label>
                                <select id="type-id">
                                    <option value="none" selected disabled> </option>
                                    <?php
                                        if (mysqli_num_rows($run_query_authority_types) > 0) {
                                            while ($row = mysqli_fetch_assoc($run_query_authority_types)) {
                                                echo ' <option value="'.$row['typeid'].'">'.$row['authority_type_name'].' - '.$row['typeid'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-control">
                                <label for="priority">Priority</label>
                                <select id="priority">
                                    <option value="none" selected disabled> </option>
                                    <?php
                                        if (mysqli_num_rows($run_query_priorities) > 0) {
                                            while ($row = mysqli_fetch_assoc($run_query_priorities)) {
                                                if ($row['is_priority'])
                                                    echo ' <option value="'.$row['priorityid'].'">'.$row['priority_name'].' - '.$row['color'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-control">
                                <label for="description">Problem Description</label>
                                <textarea id="description"></textarea>
                            </div>
                            <div class="input-control">
                                <label for="suggestions">Suggestions</label>
                                <textarea id="suggestions"></textarea>
                            </div>
                            <div class="input-control">
                                <label for="file-input">Attachments</label>
                                <input type="file" id="file-input" multiple>
                            </div>
                            <div class="input-control">
                                <input type="submit" id="submit-btn" class="submit-btn" value="FILE" />
                            </div>



                        </div>
                    </div>

                </div>

            </section>
        </div>
    </main>

    <!-- scripts -->
    <script src="<?=SITE_URL?>script/base.js"></script>
    <script>
        // var submit_btn = document.getElementById("submit-btn");
        // var form_complaint = document.getElementById("form-complaint");
        // var saved_complaint = document.getElementById("saved-complaint");
        // submit_btn.addEventListener("click", function() {
        //     form_complaint.style.display = "none";
        //     saved_complaint.style.display = "block";
        // });
    </script>
    <!-- scripts -->
</body>

</html>
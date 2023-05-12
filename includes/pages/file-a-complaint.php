<div class="content-wrapper">
    <div class="card">

        <h1 class="card-heading">File A Complaint</h1>

        <div class="card-content">

            <form method="post" action="<?= SITE_DIR ?>includes/components/file-a-complaint-submit.php" enctype="multipart/form-data">
                <div class="input-control">
                    <label for="title">Problem*</label>
                    <input type="text" id="title" name="title" autocomplete="off" spellcheck="false" required aria-required="true">
                </div>
                <div class="input-control">
                    <label for="to_userid">Directing To*</label>
                    <select id="to_userid" name="to_userid" required>
                        <option value="none" selected disabled> </option>
                        <?php
                        $directing_authorities_list = getDirectingAuthoritiesList();
                        if (mysqli_num_rows($directing_authorities_list) > 0) {
                            // print_r(mysqli_fetch_assoc(getDirectingAuthoritiesList()));
                            while ($row = mysqli_fetch_assoc($directing_authorities_list)) {
                                echo ' <option value="' . $row['userid'] . '">' . $row['userid'] . ' - ' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                                // echo $row['id']."<br>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-control">
                    <label for="priority">Priority*</label>
                    <select id="priority" name="priorityid" required>
                        <option value="none" selected disabled> </option>
                        <?php
                        $priorities_list = getPrioritiesList();
                        if (mysqli_num_rows($priorities_list) > 0) {
                            while ($row = mysqli_fetch_assoc($priorities_list)) {
                                if ($row['is_priority'])
                                    echo ' <option value="' . $row['priorityid'] . '">' . $row['priority_name'] . ' - ' . $row['color'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-control">
                    <label for="description">Problem Description*</label>
                    <textarea class="tinymce" id="editor1" name="description"></textarea>
                </div>
                <div class="input-control">
                    <label for="suggestions">Suggestions</label>
                    <textarea class="tinymce" id="editor2" name="suggestions"></textarea>
                </div>
                <div class="input-control">
                    <label for="file-input">Attachments</label>
                    <input type="file" id="file-input" name="file[]" multiple>
                </div>
                <div class="input-control">
                    <input type="submit" id="submit-btn" class="submit-btn" value="FILE" />
                </div>
            </form>
        </div>

    </div>

</div>
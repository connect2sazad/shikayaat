<?php
    $refno = isset($_GET['refno']) ? $_GET['refno'] : '';
    $complaint = getComplaintDetails($refno);
?>
<div class="content-wrapper">
    <div class="card">

        <h1 class="form-heading"><a href="./?pn=all-complaints">All Complaints</a> / <?=$refno?></h1>

        <?php
        print_r($complaint);
        ?>

    </div>

</div>
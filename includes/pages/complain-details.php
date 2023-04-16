<?php
$refno = isset($_GET['refno']) ? $_GET['refno'] : '';
$complaint = getComplaintDetails($refno);
?>
<div class="content-wrapper">
    <div class="card full-width">

        <h1 class="card-heading"><a href="./?pn=all-complaints">All Complaints</a> / <?= $refno ?></h1>

        <div class="card-content">
            <?php
            print_r($complaint);
            ?>
        </div>

    </div>

</div>
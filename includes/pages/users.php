<?php
if (getCurrentUser()['user_type_id'] != 1) {
    $html = ob_get_clean();
    header('Location: ' . SITE_HOME . '404.php');
    exit;
}
?>
<div class="content-wrapper">
    <div class="card">

        <h1 class="card-heading">Requests</h1>

        <div class="card-content">
            <div class="tab-container">
                <div class="tab-header">
                    <button class="tab-button active" data-tab="tab1">Active Users()</button>
                    <button class="tab-button" data-tab="tab2">Inactive Users()</button>
                    <button class="tab-button" data-tab="tab3">Deleted Users()</button>
                    <button class="tab-button" data-tab="tab4">New User</button>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="tab-panel active">1
                    </div>
                    <div id="tab2" class="tab-panel">2
                    </div>
                    <div id="tab3" class="tab-panel">3
                    </div>
                    <div id="tab4" class="tab-panel">4
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
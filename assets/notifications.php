<div class="notification-container" id="notification-container">
    <div class="notification-icon-holder">
        <div class="notification-icon">!</div>
    </div>
    <div class="notification-content">
        <div class="notification-title">Warning</div>
        <div class="notification-message">Your username or password is incorrect!</div>
    </div>
    <div class="notification-close-holder">
        <div class="notification-close" id="notification-close">&times;</div>
    </div>
</div>
<script>
    var notification_close = document.getElementById('notification-close');
    notification_close.addEventListener('click', function() {
        document.getElementById('notification-container').style.display = 'none';
    });
    setTimeout(function() {
        document.getElementById('notification-container').style.display = 'none';
    }, 10000);
</script>
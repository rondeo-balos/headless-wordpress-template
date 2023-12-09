<?php if( isset($response) && isset($response['message']) ): ?>
    <div class="callout callout-danger">
        <p><?= preg_replace('/<a\s[^>]*href=.*<\/a>/', '', $response['message']) ?></p>
    </div>
<?php endif; ?>
<?php if( isset($_GET['success']) ): ?>
    <div class="callout callout-success">
        <p>Successfully Saved!</p>
    </div>
<?php endif; ?>
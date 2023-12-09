<?php
    if( isset($_POST['save']) ) {
        extract($_POST);
        $response = cms::post_content( 'settings', array(
            'title' => $title,
            'description' => $description
        ) );
        if( isset($response) && !isset($response['message']) ) {
            js_redirect( 'index.php?page=settings&success=1' );
        }
    }
    
    $settings = cms::get_content( 'settings' );
?>
<div class="row">
    <div class="col-md-6">
        <?php require_once 'callouts.php' ?>
        <!-- form start -->
        <form method="POST">
            <input type="hidden" name="save" value="1">
            <div class="form-group">
                <label for="title">Site Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $settings['title'] ?>" autocomplete="new-password" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $settings['description'] ?>" autocomplete="new-password" required>
                <p>In a few words, explain what this site is about.</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

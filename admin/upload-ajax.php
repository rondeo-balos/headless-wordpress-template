<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
if( isset($_FILES['file']) ) {
    $file = file_get_contents($_FILES['file']['tmp_name']);
    $response = cms::post_content( 'media', $file, ['Content-Disposition: form-data; filename="'.$_FILES['file']['name'].'"'] );
}
?>
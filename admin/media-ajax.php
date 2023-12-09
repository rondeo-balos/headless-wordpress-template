<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
if( isset($_POST['save']) ) {
    extract( $_POST );
    $data = array(
        'id' => $save,
        'alt_text' => $alt_text,
        'title'=> $title
    );
    $response = cms::post_content( 'media/'.$save, $data );

    if( isset($response) && !isset($response['message']) ) {
        echo 1;
    }
}
?>
<?php
if( isset($_POST['save']) ) {
    extract( $_POST );
    $data = array(
        'id' => $save,
        'title' => $title,
        'content'=> $content,
    );
    $response = cms::post_content( 'pages/'.$save, $data );

    if( isset($response) && !isset($response['message']) ) {
        $params = $_GET;
        $params['success'] = 1;
        js_redirect( 'index.php?'.http_build_query($params) );
    }
}

$page = array();
if( isset($_GET['page_id']) ) {
    extract($_GET);
    $page = cms::get_content( 'pages/'.$page_id.'?_fields=id,title,content,date,status' );
} else {
    js_redirect( 'index.php?page=page' );
}
?>

<!-- summernote -->
<link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">

<?php require_once 'callouts.php' ?>
<form method="POST">
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-body">
                    <input type="hidden" name="save" value="<?= $page['id'] ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Page Title" value="<?= $page['title']['rendered'] ?>" autocomplete="new-password" required>
                    </div>
                    <div class="form-group">
                        <textarea id="content" name="content" rows="5"><?= $page['content']['rendered'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-default">
                <div class="card-header">
                    <b>Publish</b>
                </div>
                <div class="card-body">
                    <p>
                        <small>
                            <b>Status:</b> <?= $page['status'] ?><br>
                            <b>Date created:</b> <?= $page['date'] ?>
                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Summernote -->
<script src="./plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('#content').summernote({
            height: 300
        });
    })
</script>
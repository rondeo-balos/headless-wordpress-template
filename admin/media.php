<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
    if( isset($_GET['id']) ) {
        extract( $_GET );
        $media = cms::get_content('media/'.$id.'?_fields=id,date,alt_text,media_type,author,title,author,caption,description,source_url,media_details');
        ?>
            <div class="row" style="height: 100%;">
                <div class="col-md-7" style="height: 100%">
                    <img style="width: 100%; height: 100%; object-fit: contain;" src="<?= $media['source_url'] ?>" alt="<?= $media['alt_text'] ?>">
                </div>
                <div class="col-md-5">
                    <p>
                        <small>
                            <b>Uploaded on:</b> <?= date('F d, Y', strtotime($media['date'])) ?><br>
                            <b>File name:</b> <?= $media['media_details']['file'] ?><br>
                            <b>File type:</b> <?= $media['media_type'] ?><br>
                            <b>File size:</b> <?= $media['media_details']['filesize']/1000 ?>KB<br>
                            <b>Dimensions:</b> <?= $media['media_details']['width'].' by '.$media['media_details']['height'] ?> pixels
                        </small>
                    </p>
                    <hr>
                    <form method="post" id="media_form">
                        <input type="hidden" name="save" value="<?= $id ?>">
                        <div class="form-group">
                            <label for="alt_text">Alternative Text</label>
                            <input type="text" class="form-control" id="alt_text" name="alt_text" autocomplete="new-password" value="<?= $media['alt_text'] ?>">
                            <small><a href="https://www.w3.org/WAI/tutorials/images/decision-tree" target="_blank">Learn how to describe the purpose of the image.</a> Leave empty if the image is purely decorative.</small>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" autocomplete="new-password" value="<?= $media['title']['rendered'] ?>">
                        </div>
                    </form>
                    <div class="loader"></div>
                    <hr>
                    <a href="?page=media&delete=<?= $id ?>" class="text-danger delete_notice">Delete Permamently</a>
                </div>
            </div>
            <script>
                $('.delete_notice').click( function(e) {
                    e.preventDefault();
                    var $target_url = $(this).attr('href');
                    var $confirm = confirm( 'You are about to permamently delete this item from your site. This action cannot be undone.' );
                    if( $confirm ) {
                        document.location = $target_url;
                    }
                } );

                $( '#media_form input' ).change( function() {
                    $( '.loader' ).html( '<div class="callout callout-info"><p>Saving...</p></div>' );

                    // Serialize the form data into an array
                    var formDataArray = $('#media_form').serializeArray();

                    // Convert the array into an object
                    var formDataObject = {};
                    $.each(formDataArray, function(index, field){
                        formDataObject[field.name] = field.value;
                    });

                    $.ajax({
                        url: './media-ajax.php',
                        method: 'POST',
                        data: formDataObject
                    }).done( function( $data ) {
                        console.log( $data );
                        if( $data.includes( '1' ) ) // I know this is a bad way to get result, we'll change that in the future or not
                            $( '.loader' ).html( '<div class="callout callout-success"><p>Successfully saved!</p></div>' );
                        else
                            $( '.loader' ).html( '<div class="callout callout-info"><p>Error Saving</p></div>' );
                    } );
                } );
            </script>
        <?php
    }
<?php
    if(isset($_GET['delete'])) {
        $response = cms::delete_content( 'media/'.$_GET['delete'].'?force=true' );
        //echo json_encode($response);
        if( isset($response) && !isset($response['message']) ) {
            js_redirect( 'index.php?page=media&success=1' );
        }
    }
?>
<?php require_once 'callouts.php' ?>

<!-- Ekko Lightbox -->
<link rel="stylesheet" href="./plugins/ekko-lightbox/ekko-lightbox.css">

<div class="row">
    <div class="col-12">
        <div class="filter-container p-0 row">
            <?php
                $media_list = cms::get_content('media?_fields=id,date,alt_text,media_type,author,guid.rendered');
                foreach ($media_list as $media) {
                    ?>
                        <div class="filtr-item col-sm-1" data-category="1" data-sort="<?= $media['alt_text'] ?>">
                            <a href="media.php?id=<?= $media['id'] ?>" data-toggle="lightbox" data-title="Attachment Details" data-width="1024">
                                <img src="<?= $media['guid']['rendered'] ?>" class="img-fluid mb-2" alt="<?= $media['alt_text'] ?>" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;"/>
                            </a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- Ekko Lightbox -->
<script src="./plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="./plugins/filterizr/jquery.filterizr.min.js"></script>
<script>
$(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

    $('.filter-container').filterizr({
        gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
    });
})
</script>
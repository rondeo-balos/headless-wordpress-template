<!DOCTYPE html>
<html lang="en">
<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>
<?php require_once 'header.php'; ?>

<?php if( !isset($_SESSION['auth']) ) {
    js_redirect( 'login.php' );
} ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php require_once 'topbar.php'; ?>
        <?php require_once 'sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?= ucwords(isset($_GET['page']) ? $pages[$_GET['page']]['title'] : 'Dashboard') ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">
                                    <?= ucwords(isset($_GET['page']) ? $pages[$_GET['page']]['title'] : 'Dashboard') ?>
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if(isset($_GET['page'])) {
                        if( array_intersect( $pages[$_GET['page']]['permission'], $_SESSION['auth']['roles'] ) ) {
                            require_once $pages[$_GET['page']]['page'];
                        } else {
                            require_once '403.php';
                        }
                    } ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php require_once 'footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <script>
    <?php if( isset($_GET['page']) ): ?>
    $('[href="index.php?page=<?= $_GET['page'] ?>"]').addClass('active');
    if ($('[href="index.php?page=<?= $_GET['page'] ?>"]').parents('.parent')) {
        $('[href="index.php?page=<?= $_GET['page'] ?>"]').parents('.parent').addClass('menu-open');
        $('[href="index.php?page=<?= $_GET['page'] ?>"]').parents('.parent').find('a.nav-link').first().addClass(
            'active');
    }
    <?php else: ?>
    $('[href="index.php"]').addClass('active');
    <?php endif ?>

    $('.delete').click(function(e) {
        e.preventDefault();
        var $target_url = $(this).attr('href');
        $('#delete-confirmation').modal('show');
        $('#delete-confirmation .confirm').click( function(e) {
            document.location = $target_url;
        } );
    });
    </script>

    <div class="modal fade" id="delete-confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You are about to permamently delete this item from your site. This action cannot be undone.</p>
                    <p>Do you really want to delete this data?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</body>

</html>
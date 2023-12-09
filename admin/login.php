<!DOCTYPE html>
<html lang="en">
<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>
<?php require_once 'header.php'; ?>

<?php
    if( isset($_SESSION['auth']) ) {
        js_redirect('index.php');
    }
    if( isset($_POST['email']) ) {
        extract($_POST);
        $response = cms::authenticate($email, $password);
        if(isset($response['token'])) {
            $me = cms::get_content('users/me');
            $_SESSION['auth']['id'] = $me['id'];
            $_SESSION['auth']['roles'] = $me['roles'];
            js_redirect( 'index.php' );
        }
    }
    if( isset($_GET['logout']) ) {
        unset($_SESSION['auth']);
        js_redirect( 'login.php' );
    }
?>

<body class="hold-transition login-page">
<?php require_once 'callouts.php' ?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../" class="h1"><b><?= $site_details['name'] ?></b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email or Username" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
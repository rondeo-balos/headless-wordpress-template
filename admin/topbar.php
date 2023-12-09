<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= 'https://gravatar.com/avatar/'.hash('md5', $_SESSION['auth']['user_email'] ) ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?= $_SESSION['auth']['user_nicename'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                <img src="<?= 'https://gravatar.com/avatar/'.hash('md5', $_SESSION['auth']['user_email'] ) ?>" class="img-circle elevation-2" alt="User Image">

                <p> <?= $_SESSION['auth']['user_nicename'] ?> </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="index.php?page=profile" class="btn btn-default btn-flat">Profile</a>
                <a href="login.php?logout=1" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
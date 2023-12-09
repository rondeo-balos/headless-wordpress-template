<?php
    if( isset($_POST['new']) ) {
        extract($_POST);
        $response = cms::post_content( 'users', array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name
        ) );
        if( isset($response) && !isset($response['message']) ) {
            js_redirect( 'index.php?page=users&success=1' );
        }
    }
?>
<div class="row">
    <div class="col-md-6">
        <?php require_once 'callouts.php' ?>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create a brand new user and add them to this site.</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
                <div class="card-body">
                    <input type="hidden" name="new" value="1">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" autocomplete="new-password" <?= isset($_POST['new']) ? "value='$username'" : '' ?> required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="new-password" <?= isset($_POST['new']) ? "value='$email'" : '' ?> required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="new-password" <?= isset($_POST['new']) ? "value='$first_name'" : '' ?> required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="new-password" <?= isset($_POST['new']) ? "value='$last_name'" : '' ?> required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="new-password" <?= isset($_POST['new']) ? "value='$password'" : '' ?> required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="send_email" name="send_email" checked>
                        <label class="form-check-label" for="send_email">Send the new user an email about their account.</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

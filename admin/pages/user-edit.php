<?php
if( isset($_POST['save']) ) {
    extract( $_POST );
    $data = array(
        'id' => $save,
        'username' => $username,
        'email'=> $email,
        'first_name' => $first_name,
        'last_name'=> $last_name
    );
    if(!empty($password)) {
        $data['password'] = $password;
    }
    $response = cms::post_content( 'users/'.$save, $data );

    if( isset($response) && !isset($response['message']) ) {
        $params = $_GET;
        $params['success'] = 1;
        js_redirect( 'index.php?'.http_build_query($params) );
    }
}

$user = array();
if( isset($_GET['user_id']) ) {
    extract($_GET);
    $user = cms::get_content( 'users/'.$user_id );
} else {
    $user = cms::get_content( 'users/me' );
}
?>
<div class="row">
    <div class="col-md-6">
        <?php require_once 'callouts.php' ?>
        <div class="card card-primary">
            <!-- form start -->
            <form method="POST">
                <div class="card-body">
                    <h4>Personal Details</h4>
                    <input type="hidden" name="save" value="<?= $user['id'] ?>">
                    <input type="hidden" name="username" value="<?= $user['username'] ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="user" placeholder="Enter Username" value="<?= $user['username'] ?>" autocomplete="new-password" required disabled>
                        <small>Usernames cannot be changed.</small>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="<?= $user['first_name'] ?>" autocomplete="new-password" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="<?= $user['last_name'] ?>" autocomplete="new-password" required>
                    </div>

                    <h4 class="mt-5">Contact Info</h4>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $user['email'] ?>" autocomplete="new-password" required>
                    </div>

                    <h4 class="mt-5">About the User</h4>
                    
                    <h4 class="mt-5">Account Management</h4>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" autocomplete="new-password">
                        <small>Leave this blank if you dont want to change the password.</small>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
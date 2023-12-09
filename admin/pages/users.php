<?php
    if(isset($_GET['delete'])) {
        $response = cms::delete_content( 'users/'.$_GET['delete'].'?reassign=7&force=true' );
        //echo json_encode($response);
        if( isset($response) && !isset($response['message']) ) {
            js_redirect( 'index.php?page=users&success=1' );
        }
    }
?>
<?php require_once 'callouts.php' ?>
<table id="users" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $users = cms::get_content( 'users' );
            foreach( $users as $user ) {
                ?>
                <tr>
                    <td><img src="<?= $user['avatar'] ?>" class="img-circle elevation-2" alt="User Image" style="background: #fff; width: 30px; margin-right: 10px;" /> <?= $user['username'] ?></td>
                    <td><?= $user['first_name'].' '.$user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= implode(', ', $user['roles']) ?></td>
                    <td>
                        <a href="?page=user-edit&user_id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a> 
                        <a href="?page=users&delete=<?= $user['id'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>
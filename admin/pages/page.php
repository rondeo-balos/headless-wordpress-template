<?php require_once 'callouts.php' ?>
<table id="pages" class="table table-bordered table-hover">
    <thead>
        <colgroup>
            <col width="50%">
            <col width="20%">
            <col width="20%">
            <col width="10%">
        </colgroup>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $pages = cms::get_content( 'pages?_fields=id,title,author,date' );
            foreach( $pages as $page ) {
                ?>
                <tr>
                    <td><?= $page['title']['rendered'] ?></td>
                    <td><?= $page['author'] ?></td>
                    <td><?= date( 'F d, Y h:i A', strtotime ($page['date'] ) ) ?></td>
                    <td>
                        <a href="?page=page-edit&page_id=<?= $page['id'] ?>" class="btn btn-primary btn-sm">Edit</a> 
                    </td>
                </tr>
                <?php
            }
            if( empty( $pages ) ) {
                ?>
                    <td colspan="4">No pages found</td>
                <?php
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>
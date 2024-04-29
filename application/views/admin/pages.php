<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Pages</h4>
                        </div>
                        <div class="col-auto ms-auto">
                            <a href="pages/add" class="btn btn-primary">Add new</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($total == 0) : ?>
                            <h4>No pages have been found in the database</h4>
                        <?php else: ?>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($pages AS $row) {
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['title'] . '</td>';
                                    echo '<td>' . $row['type'] . '</td>';
                                    echo '<td><a href="' . $settings['site_url'] . 'admin/pages/delete/' . $row['id'] . '">Delete</a> | <a href="' . $settings['site_url'] . 'admin/pages/edit/' . $row['id'] . '">Edit</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
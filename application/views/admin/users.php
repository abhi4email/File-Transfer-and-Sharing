<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="col-auto ms-auto">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user-modal" aria-label="Create new user">Add new</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $this->load->library('plugin');
                        if ($this->plugin->pluginLoaded('auth')):
                        ?>
                            <div class="alert alert-info" style="margin: 10px 0 20px 0;">
                                <h2>Authentication plugin installed</h2>
                                It seems like you've an authentication plugin installed. Note that this may cause the users listed on this page to no longer being able to login.
                                <br>
                            </div>
                        <?php endif; ?>

                        <?php if($total == 0) : ?>
                            <h4>No users have been found in the database</h4>
                        <?php else: ?>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($users AS $row) {
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td><a href="' . $settings['site_url'] . 'admin/users/page/' . $page . '/delete/' . $row['id'] . '">Delete</a> | <a href="' . $settings['site_url'] . 'admin/users/edit/' . $row['id'] . '">Edit</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            $total_pages = round($total / 20);
                            $page_up = $page + 1;
                            $page_down = $page - 1;
                            ?>
                            <div style="float: right; padding-right: 10px;">
                                <?php if($page > 0): ?>
                                    <a href="<?php echo $settings['site_url'] . 'admin/users/page/' . $page_down; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Prev</a>
                                <?php
                                endif;
                                if($total_pages > $page + 1) :
                                ?>
                                    <a href="<?php echo $settings['site_url'] . 'admin/users/page/' . $page_up; ?>" class="btn btn-success">Next <i class="fa fa-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="add-user-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createUser" action="" method="POST">
                    <input type="hidden" name="action" value="add_user">
                    <div class="modal-body">
                        <div id="userError"></div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="E-Mail">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitAddUser">Add user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
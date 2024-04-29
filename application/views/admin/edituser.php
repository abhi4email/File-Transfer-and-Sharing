<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Edit user <?php echo $user['email'] ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="action" value="edit_user">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="E-Mail" value="<?php echo $user['email'] ?>" required><br>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required><br>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save changes">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
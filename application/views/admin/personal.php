<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Your account</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="POST">
                            <input type="hidden" name="id" value="<?php echo $account['id'] ?>">
                            <div class="mb-3">
                                <label class="formlabel">Login email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Admin email" value="<?php echo $account['email'] ?>" required="required">
                                    <p><i>Admin login email</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="formlabel">Login password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                    <p><i>Admin login password (Leave empty to keep the same)</i></p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
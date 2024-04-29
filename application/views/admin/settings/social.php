<?php require_once dirname(__FILE__) . '/header.php'; ?>
<div class="page-body margins">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <?php require_once dirname(__FILE__) . '/tabs.php'; ?>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="post">
                            <input type="hidden" name="save" value="1">
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook url" value="<?php echo $social['facebook']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter plus url" value="<?php echo $social['twitter']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Google plus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="google" placeholder="Google plus url" value="<?php echo $social['google']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram url" value="<?php echo $social['instagram']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">GitHub</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="github" placeholder="GitHub url" value="<?php echo $social['github']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tumblr</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tumblr" placeholder="Tumblr url" value="<?php echo $social['tumblr']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pinterest</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pinterest" placeholder="Pinterest url" value="<?php echo $social['pinterest']; ?>">
                                    <p><i>Leave empty to disable it</i></p>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                <label class="form-label">Enable contact form</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="contact_enabled">
                                        <option value="true">Enabled</option>
                                        <option value="false">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <script>$('select[name="contact_enabled"]').val("<?php echo $settings['contact_enabled'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Contact form receiver</label>
                                <div class="col-sm-10">
                                    <input type="email" name="contact_email" class="form-control" value="<?php echo $settings['contact_email'] ?>">
                                    <p><i>The email address where the messages will be send to</i></p>
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
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
                                <label class="form-label">User needs to accept terms</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="accept_terms">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <script>$('select[name="accept_terms"]').val("<?php echo $settings['accept_terms'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Terms</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="terms_text" style="width: 100%; height: 300px;"><?php echo $settings['terms_text']; ?></textarea>
                                    <p><i>You can use HTML to style the text, leave field empty to hide the Terms tabs and links</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="about_text" style="width: 100%; height: 300px;"><?php echo $settings['about_text']; ?></textarea>
                                    <p><i>You can use HTML to style the text, leave field empty to hide the About tabs and links</i></p>
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
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
                                <label class="form-label">Advertisement in menu enabled</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="ad_1_enabled">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            <script>$('select[name="ad_1_enabled"]').val("<?php echo $settings['ad_1_enabled'] ?>");</script>
    
                            <div class="mb-3">
                                <label class="form-label">Advertisement in menu code</label>
                                <div class="col-sm-10">
                                    <textarea name="ad_1_code" class="form-control" style="width: 100%; height: 300px;"><?php echo $settings['ad_1_code']; ?></textarea>
                                    <p><i>Advertisement code. If you're using adsense do not forget to include the javascript tags</i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Advertisement on upload/download enabled</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="ad_2_enabled">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            <script>$('select[name="ad_2_enabled"]').val("<?php echo $settings['ad_2_enabled'] ?>");</script>
    
                            <div class="mb-3">
                                <label class="form-label">Advertisement on upload/download code</label>
                                <div class="col-sm-10">
                                    <textarea name="ad_2_code" class="form-control" style="width: 100%; height: 300px;"><?php echo $settings['ad_2_code']; ?></textarea>
                                    <p><i>Advertisement code. If you're using adsense do not forget to include the javascript tags</i></p>
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
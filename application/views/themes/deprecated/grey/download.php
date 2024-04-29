<div class="main" id="downloadDiv">
    <?php if(!$mobile): ?>
        <img src="<?php echo $settings['logo_path']; ?>" class="logo" alt="Logo"><hr>
    <?php else: ?>
        <br>
    <?php endif; ?>

    <?php if(isset($data) && is_array($data)): ?>
        <?php if($data['status'] == 'ready'): ?>
            <div id="downloadForm">
                <?php
                if($data['password'] != 'EMPTY' && !empty($data['password'])) : ?>
                    <div style="text-align: center;">
                        <div id="downloadLogo"><i class="fa fa-lock fa-5x" style="padding-top: 35px;"></i></div>
                        <p id="statusDownload" style="padding-top: 30px;"><?php echo lang('fill_password'); ?>:</p>
                    </div>

                    <form id="downloadPassword" action="handler/download" method="post">
                        <div class="form-group">
                            <input type="hidden" name="action" id="action" value="download">
                            <input type="hidden" name="download_id" id="download_id" value="<?php echo $upload_id; ?>">
                            <input type="hidden" name="private_id" id="private_id" value="<?php echo $unique_id; ?>">
                            <input type="hidden" name="url" value="<?php echo urlencode(current_url()) ?>">
                            <input type="password" class="form-control input-sm" id="password" name="password" placeholder="<?php echo lang('password'); ?>" autocomplete="off" required>
                        </div>
                        <?php
                        if($data['destruct'] == 'YES') :
                            ?>
                            <input type="submit" class="btn btn-default btn-block btn-sm" id="submitpass" value="<?php echo lang('download'); ?> & <?php echo lang('destruct'); ?>">
                            <?php
                        else :
                            ?>
                            <input type="submit" class="btn btn-default btn-block btn-sm" id="submitpass" value="<?php echo lang('download'); ?>">
                            <?php
                        endif;
                        ?>
                    </form>
                <?php else: ?>
                    <form id="downloadItems" action="handler/download" method="post">
                        <input type="hidden" name="action" id="action" value="download">
                        <input type="hidden" name="download_id" id="download_id" value="<?php echo $upload_id; ?>">
                        <input type="hidden" name="private_id" id="private_id" value="<?php echo $unique_id; ?>">
                        <div style="text-align:center;"><i class="fa fa-cloud-download fa-3x"></i></div>
                        <div style="padding-top: 5px;">
                            <table>
                                <tr>
                                    <td><b><?php echo lang('total_size'); ?>:</b></td>
                                    <td class="td_2"><?php echo (($data['size'] < 1048576)? round($data['size'] / 1024, 2) . ' KB' : round($data['size'] / 1048576, 2) . ' MB'); ?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo lang('total_files'); ?>:</b></td>
                                    <td class="td_2"><?php echo $data['count']; ?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo lang('destructed_on'); ?>:</b></td>
                                    <td class="td_2"><?php echo date("Y-m-d", $data['time_expire']); ?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo lang('download_id'); ?>:</b></td>
                                    <td class="td_2"><?php echo $upload_id; ?></td>
                                </tr>
                            </table>
                            <b><?php echo lang('files'); ?>:</b>
                            <div style="height: 50px; overflow-x: hidden;">
                                <ul>
                                    <?php
                                    foreach($files as $file) {
                                        echo '<li>' . $file['file'] . '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php if(!empty($data['message'])) : ?>
                                <b><?php echo lang('message'); ?>:</b>
                                <div style="height: 50px; overflow: auto;">
                                    <?php echo $data['message']; ?>
                                </div>
                            <?php else: ?>
                                <div style="height: 70px; display: none;"></div>
                            <?php endif; ?>
                        </div>
                        <?php echo ($mobile ? '<br><br>' : '') ?>
                        <div class="buttonSection" style="width: 70%;">
                            <?php if($data['destruct'] == 'YES'): ?>
                                <input type="submit" class="btn btn-default btn-block btn-sm" id="submitdownload" value="<?php echo lang('download'); ?> & <?php echo lang('destruct'); ?>">
                            <?php else: ?>
                                <input type="submit" class="btn btn-default btn-block btn-sm" id="submitdownload" value="<?php echo lang('download'); ?>">
                            <?php endif; ?>
                            <!--<div style="float: left; width: 20%; padding-left: 10px;">
                                <a class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#flagModal"><i class="fa fa-flag"></i></a>
                            </div>-->
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <div id="downloadSuccess">
                <div style="text-align:center; padding-top: 25px;"><i class="fa fa-check-circle-o fa-5x"></i></div>
                <div style="padding-top: 15px;">
                    <p><?php echo lang('download_started'); ?></p>
                </div>
                <div class="buttonSection" style="width: 70%;">
                    <a class="btn btn-default btn-block btn-sm" href="<?php echo $settings['site_url']; ?>"><?php echo lang('ok'); ?></a>
                </div>
            </div>
        <?php elseif($data['status'] == 'processing'): ?>
            <div id="downloadError">
                <div class="progressImage"><i class="fa fa-clock-o fa-5x"></i></div>
                <div class="progressMessage">
                    <p><?php echo lang('upload_processing'); ?></p>
                </div>
                <div class="buttonSection" style="width: 70%;">
                    <a class="btn btn-default btn-block btn-sm" href="<?php echo $settings['site_url']; ?>"><?php echo lang('ok'); ?></a>
                </div>
            </div>
        <?php else: ?>
            <div id="downloadError" style="width: 70%; margin-left: auto; margin-right: auto;">
                <div style="text-align:center;"><i class="fa fa-question-circle fa-5x"></i></div>
                <div style="padding-top: 15px; font-size: 14px;">
                    <p><?php echo lang('upload_not_found'); ?></p>
                </div>
                <div class="buttonSection" style="width: 70%;">
                    <a class="btn btn-default btn-block btn-sm" href="<?php echo $settings['site_url']; ?>"><?php echo lang('ok'); ?></a>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div id="downloadError" style="width: 70%; margin-left: auto; margin-right: auto;">
            <div style="text-align:center;"><i class="fa fa-question-circle fa-5x"></i></div>
            <div style="padding-top: 15px; font-size: 14px;">
                <p><?php echo lang('upload_not_found'); ?></p>
            </div>
            <div class="buttonSection" style="width: 70%;">
                <a class="btn btn-default btn-block btn-sm" href="<?php echo $settings['site_url']; ?>"><?php echo lang('ok'); ?></a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
if(isset($_GET['error'])) {
    echo '<script>$(document).ready(function() { General.errorMsg("'.lang($_GET['error']).'"); });</script>';
}
?>
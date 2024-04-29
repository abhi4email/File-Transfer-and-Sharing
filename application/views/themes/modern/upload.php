<div class="upload-block">
    <div class="upload-block-inner">
        <?php if($settings['ad_1_enabled'] == 'true') : ?>
            <div class="mobile-ad-block">
                <?php echo $settings['ad_1_code']; ?>
            </div>
        <?php endif; ?>
        <!--<div class="upload-block-logo">
            <img src="<?php echo $settings['logo_path']; ?>">
        </div>-->
        <div class="upload-block-content start-top active" id="upload">
            <div class="upload-form">
                <div class="select-first-files">
                    <div class="outside-container">
                        <lord-icon
                                src="assets/themes/<?php echo $settings['theme'] ?>/mecwbjnp.json"
                                trigger="click"
                                colors="primary:<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#3e8ed0'); ?>,secondary:<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#3e8ed0'); ?>"
                                scale="100"
                                style="width:120px;height:120px;min-width:100%;">
                        </lord-icon>
                        <span class="description"><?php echo lang('lets_begin_files') ?></span>
                        <span class="folder-select"><?php echo lang('or_select_folder') ?></span>
                    </div>
                </div>
                <div class="selected-files" id="selected-files">
                    <ul></ul>

                    <div class="bottom">
                        <div class="stats">
                            <span><b id="stats-total"></b><br>
                                <?php echo lang('files_selected') ?></span>
                            <span><b id="stats-selected"></b><br>
                                <?php echo lang('selected') ?></span>
                            <span><b id="stats-remaining"></b><br>
                                <?php echo lang('remaining') ?></span>
                        </div>
                        <div class="add-buttons">
                            <button class="button is-small is-info" id="add-files"><?php echo lang('add_more_files') ?></button>
                            <button class="button is-small is-info" id="add-folders"><?php echo lang('add_folders') ?></button>
                        </div>
                    </div>
                </div>

                <form enctype="multipart/form-data" id="upload-form" class="uploadForm">
                    <input type="hidden" name="share" id="share" value="<?php echo $settings['default_sharetype'] ?>">
                    <input type="hidden" name="destruct" id="destruct" value="<?php echo $settings['default_destruct'] ?>">
                    <input type="file" name="files[]" id="file-selector" multiple="multiple">
                    <input type="file" name="files[]" id="folder-selector" multiple="multiple" webkitdirectory="true" directory>

                    <div id="email-fields">
                        <div class="input-group">
                            <div class="recipients"></div>
                            <?php
                            if(empty($settings['default_email_to'])) {
                                echo '<input class="input" type="text" name="email_to[]" id="email-to" placeholder="'.lang('email_to').'" autocomplete="none" onfocus="this.setAttribute(\'autocomplete\', \'none\');">';
                            } else {
                                $emails_to = explode(',', $settings['default_email_to']);

                                if(count($emails_to) > 1) {
                                    echo '<select name="email_to[]"><option selected disabled>'.lang('select_recipient').'</option>';
                                    foreach ($emails_to as $email_to) {
                                        $email_to_label = explode(']', (explode('[', $email_to)[1]))[0];
                                        $email_to = str_replace('['.$email_to_label.']', '', $email_to);

                                        echo "<option value='$email_to'>".(empty($email_to_label) ? $email_to : $email_to_label)."</option>";
                                    }
                                    echo '</select>';
                                }
                                else
                                {
                                    echo '<input class="input" type="text" name="email_to[]" placeholder="' . lang('email_to') . '" value="' . $settings['default_email_to'] . '" readonly="readonly">';
                                }
                            }
                            ?>
                        </div>
                        <div class="input-group">
                            <?php if($session->has_userdata('user_email') && $session->userdata('user_email')) : ?>
                                <input class="input" type="text" name="email_from" id="email-from" placeholder="<?php echo lang('email_from') ?>" value="<?php echo $session->userdata('user_email'); ?>" required="required" readonly>
                            <?php elseif(isset($_SESSION['Sharify_premium'])): ?>
                                <input class="input" type="text" name="email_from" id="email-from" placeholder="<?php echo lang('email_from') ?>" value="<?php echo $_SESSION['Sharify_premium_email']; ?>" required="required" readonly>
                            <?php elseif($settings['enable_sender_cookie'] == 'true' && isset($sender_cookie) && !empty($sender_cookie)): ?>
                                <input class="input" type="text" name="email_from" id="email-from" placeholder="<?php echo lang('email_from') ?>" value="<?php echo $sender_cookie; ?>" required="required">
                            <?php else:?>
                                <input class="input" type="text" name="email_from" id="email-from" placeholder="<?php echo lang('email_from') ?>" required="required">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <textarea class="input" name="message" placeholder="<?php echo lang('message') ?>"></textarea>
                    </div>

                    <div class="advanced-options">
                        <?php if($settings['share_enabled'] == 'true'): ?>
                        <div class="input-group" data-help="<?php echo lang('share_type_text') ?>">
                            <span class="label"><?php echo lang('how_to_share_file') ?> <i class="lni lni-question-circle"></i></span>
                            <div class="radio-group share-options">
                                <label class="radio <?php if($settings['default_sharetype'] == 'mail') { echo 'selected'; } ?>" id="mail">
                                    <?php echo lang('send_using_email') ?>
                                </label>
                                <label class="radio <?php if($settings['default_sharetype'] == 'link') { echo 'selected'; } ?>" id="link">
                                    <?php echo lang('get_sharable_link') ?>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($settings['destruct_enabled'] == 'true'): ?>
                        <div class="input-group" data-help="<?php echo lang('destruct_text') ?>">
                            <span class="label"><?php echo lang('enable_destuct') ?> <i class="lni lni-question-circle"></i></span>
                            <div class="radio-group destruct-options">
                                <label class="radio <?php if($settings['default_destruct'] == 'no') { echo 'selected'; } ?>" id="no">
                                    <?php echo lang('no') ?>
                                </label>
                                <label class="radio <?php if($settings['default_destruct'] == 'yes') { echo 'selected'; } ?>" id="yes">
                                    <?php echo lang('yes') ?>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if((isset($settings['pm_pass_enabled']) && $settings['pm_pass_enabled'] == 'true') || $settings['password_enabled'] == 'true') : ?>
                            <div class="input-group" data-help="<?php echo lang('password_text') ?>">
                                <span class="label"><?php echo lang('protect_upload_password') ?> <i class="lni lni-question-circle"></i></span>
                                <input class="input" type="text" name="password" placeholder="<?php echo lang('password') ?>" autocomplete="off" autofill="no">
                            </div>
                        <?php else: ?>
                            <div class="input-group disabled" data-help="<?php echo lang('password_text') ?>">
                                <span class="label"><?php echo lang('protect_upload_password') ?> <i class="lni lni-question-circle"></i></span>
                                <input class="input" type="text" name="password" placeholder="<?php echo lang('not_available_pass') ?>" readonly="readonly" autocomplete="off"  autofill="no">
                            </div>
                        <?php endif; ?>
                        <?php if(strpos($settings['expire'], ',') !== false): ?>
                            <div class="input-group">
                                <span class="label"><?php echo lang('when_file_expire') ?></span>
                                <select name="expire">
                                    <?php
                                    $times = explode(',',$settings['expire']);
                                    foreach ($times AS $time) {
                                        echo "<option value='$time'>".secondsToTime($time)."</option>";
                                    }
                                    ?>
                                </select>
                                <?php if(!empty($settings['default_expire']) && $settings['default_expire'] != 0): ?><script>$('select[name="expire"]').val("<?php echo $settings['default_expire'] ?>");</script><?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <div class="button-block">
                <button class="button is-info is-rounded" id="submit-upload"><?php echo lang('upload') ?></button>
                <button class="button is-info is-rounded options"><i class="lni lni-more-alt"></i></button>
            </div>
        </div>

        <div class="upload-block-content" id="upload-verify">
            <lord-icon
                    src="assets/themes/<?php echo $settings['theme'] ?>/rhvddzym.json"
                    trigger="loop"
                    colors="primary:<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#121331'); ?>,<?php echo (!empty($settings['theme_color_secondary']) ? $settings['theme_color_secondary'] : '#3e8ed0'); ?>"
                    style="width:180px;height:180px">
            </lord-icon>

            <div class="upload-verify-details">
                <h1><?php echo lang('verify_email_title') ?></h1>

                <p><?php echo lang('verify_email_desc') ?> <span id="email-to-verify"></span></p>

                <input type="number" class="input is-normal" placeholder="<?php echo lang('enter_verify_code') ?>">
            </div>

            <div class="button-block">
                <button class="button is-info is-rounded"><?php echo lang('verify') ?></button>
            </div>
        </div>

        <div class="upload-block-content" id="upload-progress">
            <div class="upload-progress-bar" id="progress-bar"></div>

            <div class="upload-progress-details">
                <span class="size"></span>
                <span class="time"></span>
            </div>

            <div class="button-block">
                <button class="button is-info is-rounded" id="cancel-upload"><?php echo lang('cancel') ?></button>
            </div>
        </div>
        <div class="upload-block-content" id="upload-finished">
            <lord-icon
                    src="assets/themes/<?php echo $settings['theme'] ?>/lupuorrc.json"
                    trigger="loop"
                    colors="primary:<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#121331'); ?>,secondary:<?php echo (!empty($settings['theme_color_secondary']) ? $settings['theme_color_secondary'] : '#3e8ed0'); ?>"
                    style="width:180px;height:180px">
            </lord-icon>

            <div class="upload-finished-details">
                <h1><?php echo lang('success') ?></h1>

                <div class="upload-finished-message" id="link">
                    <p><?php echo lang('success_link') ?></p>
                    <input type="text" class="input is-normal" value="" readonly="readonly">
                </div>
                <div class="upload-finished-message" id="mail">
                    <p><?php echo lang('success_email') ?></p>
                </div>
            </div>

            <div class="button-block">
                <button class="button is-info is-rounded"><?php echo lang('copy_url') ?></button>
            </div>
        </div>
    </div>

    <div class="upload-block-tooltip">
        <div class="content error">
            <img src="assets/themes/<?php echo $settings['theme'] ?>/img/icons/error-icon-white.png">
            <p></p>
        </div>
        <div class="content help">
            <img src="assets/themes/<?php echo $settings['theme'] ?>/img/icons/question.png">
            <p></p>
        </div>
    </div>
</div>
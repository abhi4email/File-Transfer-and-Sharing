<form enctype="multipart/form-data" id="upload-form" class="uploadForm">
    <?php if($mobile): ?>
        <div id="modalSettings" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo lang('upload_settings') ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><b><?php echo lang('share_type'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('share_type_text'); ?>"></i></b></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-sm <?php if($settings['default_sharetype'] == 'mail') { echo 'active'; } ?>">
                                <input type="radio" name="options" id="option1" onchange="Form.pickShareOption('email')" <?php if($settings['default_sharetype'] == 'mail') { echo 'checked=""'; } ?> > <?php echo lang('email') ?>
                            </label>
                            <label class="btn btn-default btn-sm <?php if($settings['default_sharetype'] == 'link') { echo 'active'; } ?>">
                                <input type="radio" name="options" id="option2" onchange="Form.pickShareOption('link')" <?php if($settings['default_sharetype'] == 'link') { echo 'checked=""'; } ?> > <?php echo lang('link') ?>
                            </label>
                            <input type="hidden" name="share" id="share" value="mail">
                        </div>
                        <p style="padding-top: 15px;"><b><?php echo lang('destruct_file'); ?>:</b> <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('destruct_text') ?>"></i></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-sm <?php echo ($settings['default_destruct'] == 'no' ? 'active' : ''); ?>">
                                <input type="radio" name="options" id="option3" onchange="Form.pickDestructOption('no')" <?php echo ($settings['default_destruct'] == 'no' ? 'checked=""' : ''); ?>><?php echo lang('no') ?>
                            </label>
                            <label class="btn btn-default btn-sm <?php echo ($settings['default_destruct'] == 'yes' ? 'active' : ''); ?>">
                                <input type="radio" name="options" id="option4" onchange="Form.pickDestructOption('yes')" <?php echo ($settings['default_destruct'] != 'yes' ? 'checked=""' : ''); ?>><?php echo lang('yes') ?>
                            </label>
                            <input type="hidden" name="destruct" id="destruct" value="<?php echo $settings['default_destruct'] ?>">
                        </div>
                        <?php
                        if($settings['password_enabled'] == 'true') :
                            ?>
                            <p style="padding-top: 15px;"><b><?php echo lang('protect_with_pass'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('password_text'); ?>"></i></b></p>
                            <div class="input-group">
                                <input type="password" class="form-control input-sm" name="password" id="password" placeholder="<?php echo lang('password'); ?>" autocomplete="off">
                            </div>
                            <i style="font-size: 12px;">(<?php echo lang('leave_empty_password'); ?>)</i>
                            <?php
                        else:
                            ?>
                            <p style="padding-top: 15px;"><b><?php echo lang('protect_with_pass'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('password_text'); ?>"></i></b></p>
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="password" id="password" placeholder="<?php echo lang('not_available_pass'); ?>" autocomplete="off" readonly>
                            </div>
                            <i style="font-size: 12px;">(<?php echo lang('leave_empty_password'); ?>)</i>
                            <?php
                        endif;
                        if($settings['ad_1_enabled'] == 'true') :
                            ?>
                            <div style="margin-right: auto; margin-left: auto; margin-top: 70px; width: 468px; height: 60px;">
                                <?php echo $settings['ad_1_code']; ?>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div style="padding-top: 10px;">
                            <button type="button" class="btn btn-default btn-block btn-sm" class="close" data-dismiss="modal"><?php echo lang('save') ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="customValues"></div>
    <div>
        <?php if(!$mobile): ?>
        <div id="uploadSettings" class="uploadSettings" style="display: none;">
            <div style="float: left; margin-left: 20px; margin-top: 7px; width: 130px;">
                <h4><?php echo $settings['site_name']; ?></h4><hr style="margin-bottom: 0px;">
                <ul style="list-style-type: none; padding-left: 0;">
                    <li><a id="upload_settings_tab" class="settingsNav" style="font-weight: bold;" onclick="Pager.openInlinePage(this.id);"><?php echo lang('upload_settings'); ?></a></li>
                    <li><a id="language_settings_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo lang('change_language'); ?></a></li>
                    <li><a id="terms_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo lang('terms_service'); ?></a></li>
                    <li><a id="about_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo lang('about_us'); ?></a></li>
                    <?php if($settings['contact_enabled'] == 'true'): ?>
                        <li><a id="contact_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo lang('contact'); ?></a></li>
                    <?php endif; ?>
                    <?php if($settings['lock_page'] == 'upload' || $settings['lock_page'] == 'both'): ?>
                        <li><a href="login/logout" class="settingsNav"><?php echo lang('logout'); ?></a></li>
                    <?php endif; ?>
                </ul>
                <?php
                if(is_array($custom_tabs) && !empty($custom_tabs)) {
                    echo '<ul style="list-style-type: none; padding-left: 0;">';

                    foreach ($custom_tabs AS $key => $tab) {
                        echo '<li><a '.($tab['type'] == 'url' ? 'href="'.base_url($tab['url']).'" '. ($tab['new_tab'] ? 'target="_blank"' : '') : '').' id="custom_' . $key . '" class="settingsNav" onclick="Pager.openInlinePage(this.id);">' . lang($tab['translation']) . '</a></li>';
                    }

                    echo '</ul>';
                }
                ?>
            </div>
            <div class="settingsContent">
                <div style="float: right; padding-top: 5px; padding-right: 5px;">
                    <i class="fa fa-times-circle-o" style="color: #716C6C; font-size: 25px; cursor: pointer; cursor: hand;" onclick="Pager.closeSettings();"></i>
                </div>
                <div class="settingsBody">
                    <div id="upload_settings_tab_body" class="settingsBodyContent">
                        <p><b><?php echo lang('share_type'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('share_type_text'); ?>"></i></b></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-sm <?php if($settings['default_sharetype'] == 'mail') { echo 'active'; } ?>">
                                <input type="radio" name="options" id="option1" onchange="Form.pickShareOption('email')" <?php if($settings['default_sharetype'] == 'mail') { echo 'checked=""'; } ?> > <?php echo lang('email') ?>
                            </label>
                            <label class="btn btn-default btn-sm <?php if($settings['default_sharetype'] == 'link') { echo 'active'; } ?>">
                                <input type="radio" name="options" id="option2" onchange="Form.pickShareOption('link')" <?php if($settings['default_sharetype'] == 'link') { echo 'checked=""'; } ?> > <?php echo lang('link') ?>
                            </label>
                            <input type="hidden" name="share" id="share" value="mail">
                        </div>
                        <p style="padding-top: 15px;"><b><?php echo lang('destruct_file'); ?>:</b> <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('destruct_text') ?>"></i></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-sm <?php echo ($settings['default_destruct'] == 'no' ? 'active' : ''); ?>">
                                <input type="radio" name="options" id="option3" onchange="Form.pickDestructOption('no')" <?php echo ($settings['default_destruct'] == 'no' ? 'checked=""' : ''); ?>><?php echo lang('no') ?>
                            </label>
                            <label class="btn btn-default btn-sm <?php echo ($settings['default_destruct'] == 'yes' ? 'active' : ''); ?>">
                                <input type="radio" name="options" id="option4" onchange="Form.pickDestructOption('yes')" <?php echo ($settings['default_destruct'] != 'yes' ? 'checked=""' : ''); ?>><?php echo lang('yes') ?>
                            </label>
                            <input type="hidden" name="destruct" id="destruct" value="<?php echo $settings['default_destruct'] ?>">
                        </div>
                        <?php
                        if((isset($settings['pm_pass_enabled']) && $settings['pm_pass_enabled'] == 'true') || $settings['password_enabled'] == 'true') :
                            ?>
                            <p style="padding-top: 15px;"><b><?php echo lang('protect_with_pass'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('password_text'); ?>"></i></b></p>
                            <div class="input-group">
                                <input type="password" class="form-control input-sm" name="password" id="password" placeholder="<?php echo lang('password'); ?>" autocomplete="off">
                            </div>
                            <i style="font-size: 12px;">(<?php echo lang('leave_empty_password'); ?>)</i>
                            <?php
                        else:
                            ?>
                            <p style="padding-top: 15px;"><b><?php echo lang('protect_with_pass'); ?>: <i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo lang('password_text'); ?>"></i></b></p>
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="password" id="password" placeholder="<?php echo lang('not_available_pass'); ?>" autocomplete="off" readonly>
                            </div>
                            <i style="font-size: 12px;">(<?php echo lang('leave_empty_password'); ?>)</i>
                            <?php
                        endif;
                        if($settings['ad_1_enabled'] == 'true') :
                            ?>
                            <div style="margin-right: auto; margin-left: auto; margin-top: 70px; width: 468px; height: 60px;">
                                <?php echo $settings['ad_1_code']; ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    </form>
                    <div id="language_settings_tab_body" class="settingsBodyContent" style="display: none;">
                        <div style="padding-top: 120px; width: 90%; margin-left: auto; margin-right: auto;">
                            <p><?php echo lang('select_pref_lang') ?>:</p>
                            <select class="form-control" onchange="General.changeLanguage()" id="languagePicker">
                                <option disabled selected> -- <?php echo lang('select_language'); ?> -- </option>
                                <?php
                                foreach($language_list as $row)
                                {
                                    echo '<option value="' . $row->path . '">' . $row->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        if($settings['ad_1_enabled'] == 'true') :
                            ?>
                            <div style="margin-right: auto; margin-left: auto; margin-top: 120px; width: 468px; height: 60px;">
                                <?php echo $settings['ad_1_code']; ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <div id="terms_tab_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 360px; width: 90%;">
                        <?php
                        echo $settings['terms_text'];
                        ?>
                    </div>
                    <div id="about_tab_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 360px; width: 90%;">
                        <?php
                        echo $settings['about_text'];
                        ?>
                    </div>
                    <div id="contact_tab_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 360px; width: 90%;">
                        <form class="contact-form">
                            <p style="padding-top: 15px;"><?php echo lang('email'); ?>:</p>
                            <div class="input-group">
                                <input type="email" class="form-control input-sm" name="contact_email" id="contact_email" placeholder="<?php echo lang('contact_email_description'); ?>">
                            </div>
                            <p style="padding-top: 15px;"><?php echo lang('subject'); ?>:</p>
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="contact_subject" id="contact_subject" placeholder="<?php echo lang('contact_subject_description'); ?>">
                            </div>
                            <p style="padding-top: 15px;"><?php echo lang('message'); ?>:</p>
                            <div class="input-group">
                                <textarea class="form-control input-sm" name="contact_message" placeholder="<?php echo lang('contact_message_description'); ?>"></textarea>
                            </div>
                            <br>

                            <?php if(!empty($settings['recaptcha_key'])): ?>
                                <div class="g-recaptcha" data-sitekey="<?php echo $settings['recaptcha_key']; ?>"></div>
                            <?php endif; ?>

                            <button class="btn btn-default"><?php echo lang('send') ?></button>
                        </form>
                    </div>
                    <?php
                    if(is_array($custom_tabs) && !empty($custom_tabs)) {
                        foreach ($custom_tabs AS $key => $tab) {
                            if($tab['type'] == 'inline')
                            {
                                echo '<div id="custom_' . $key . '_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 380px; width: 90%;">';
                                require_once APPPATH . 'plugins/' . $tab['plugin'] . '/' . $tab['view'];
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="headerDivider"></div>
        </div>
        <?php endif; ?>

        <!-- Normal view div -->
        <div class="main" id="uploadDiv">
            <?php if(!$mobile): ?>
            <img src="<?php echo $settings['logo_path']; ?>" class="logo" alt="Logo">
            <hr style="margin-top: 10px; margin-bottom: 15px;">
            <?php else: ?>
            <br>
            <?php endif; ?>
            <div class="FormContent">
                <div class="upload_section" id="upload_section">
                    <div id="upload-form-list"></div>
                    <input type="file" name="files[]" multiple="multiple">
                    <button id="select_files" class="btn btn-default btn-xs file-select"><i class="fa fa-plus"></i> <?php echo lang('select_files'); ?> <span id="total_upload_size">(<?php echo (($settings['max_size'] < 1024) ? lang('max') . ' ' . $settings['max_size'] . ' MB' : lang('max') . ' ' . round($settings['max_size'] / 1024, 2) . ' GB'); ?>)</span></button>
                </div>
                <?php
                if(empty($settings['default_email_to'])) :
                    ?>
                    <div class="EmailToSection" id="EmailToSection">
                        <div class="form-group" id="receivers" class="receivers" style="display: none;">
                            <div id="receiverHiddenList"></div>
                            <div id="receiverList" class="receiverList" style="display: none; font-size: 12px;"></div>
                        </div>
                        <input type="email" class="form-control input-sm" id="emailTo" name="email_to[]" placeholder="<?php echo lang('enter_email'); ?>" required="required">
                        <div style="padding-top: 5px;"><a onclick="Form.addReceiver()" class="btn btn-default btn-xs" style="width: 100%;" id="addReceiver"><?php echo lang('add_more'); ?></a></div>
                    </div>
                <?php
                else:
                ?>
                    <div class="EmailToSection" id="EmailToSection">
                        <input type="email" class="form-control input-sm" id="emailTo" name="email_to[]" value="<?php echo $settings['default_email_to']; ?>" required="required" readonly>
                    </div>
                <?php
                endif;
                ?>
                <div class="EmailFromSection" id="EmailFromSection">
                    <div class="form-group">
                        <?php
                        if($session->has_userdata('user_email') && $session->userdata('user_email')) :
                            ?>
                            <input type="email" class="form-control input-sm" id="emailFrom" name="email_from" value="<?php echo $session->userdata('user_email'); ?>" required="required" readonly>
                            <?php
                        elseif(isset($_SESSION['Sharify_premium'])):
                            ?>
                            <input type="email" class="form-control input-sm" id="emailFrom" name="email_from" value="<?php echo $_SESSION['Sharify_premium_email']; ?>" required="required" readonly>
                            <?php
                        elseif($settings['enable_sender_cookie'] == 'true' && isset($sender_cookie) && !empty($sender_cookie)):
                            ?>
                            <input type="email" class="form-control input-sm" id="emailFrom" name="email_from" value="<?php echo $sender_cookie; ?>" required="required">
                            <?php
                        else:
                            ?>
                            <input type="email" class="form-control input-sm" id="emailFrom" name="email_from" placeholder="<?php echo lang('enter_own_email'); ?>" required="required">
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="MessageSection">
                    <div class="form-group">
                        <textarea class="form-control input-sm" style="resize: none; height: 75px;" name="message" id="message" placeholder="<?php echo lang('message_receiver'); ?>" maxlength="1000"></textarea>
                    </div>
                </div>
                <div class="buttonSection">
                    <div style="width: 72%; float: left;">
                        <button type="button" class="btn btn-info btn-block btn-sm" id="submit_upload"><?php echo lang('share_files'); ?></button>
                    </div>
                    <div style="float: left; padding-left: 24px;">
                        <button type="button" class="btn btn-success btn-sm" id="settingsButton" onclick="Pager.openSettings();"><i class="fa fa-cog"></i><span class="show-mobile"> <?php echo lang('upload_settings'); ?></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Progress and succes div -->
<div class="main" id="uploadingDiv" style="display: none; text-align: center;">
    <div id="uploadProcess" class="progressround">
        <input type="text" value="" class="progressCircle" id="progresscircle">
        <div id="progressMb" style="padding-top: 10px; text-align: center; font-size: 13px;"></div>
        <a class="btn btn-default btn-xs" id="cancelUpload" style="width: 200px; margin-top: 10px;"><?php echo lang('cancel') ?></a>
    </div>
    <div id="uploadSuccess" class="progresssuccess" style="display: none; padding-top: 40px;">
        <img src="assets/themes/<?php echo $settings['theme'] ?>/img/loader.gif" alt="Upload success" width="180" height="180">
        <h2 style="text-align: center;"><?php echo lang('success'); ?></h2>
        <div id="linkMessage" style="display: none; font-size: 14px;">
            <p><?php echo lang('success_link'); ?></p>
            <div id="downloadLink"></div>
        </div>
        <div id="emailMessage" style="display: none; font-size: 14px; margin-left: 15px;">
            <p><?php echo lang('success_email'); ?></p>
        </div>
        <div class="buttonSection" style="bottom: -55px;">
            <div id="copyButton"></div>
            <div id="okButton" style="display: none;">
                <a href="<?php echo $settings['site_url']; ?>" class="btn btn-success btn-block btn-sm"><?php echo lang('ok'); ?></a>
            </div>
        </div>
    </div>
</div>
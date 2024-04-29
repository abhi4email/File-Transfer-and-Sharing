<div class="modal fade" id="flagModal" tabindex="-1" role="dialog" aria-labelledby="flagModalLabel" aria-hidden="true">
    <form method="POST" action="src/action.php">
        <input type="hidden" name="action" value="report">
        <input type="hidden" name="id" value="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="flagModalLabel"><?php echo lang('report_file') ?></h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <i class="fa fa-exclamation-triangle fa-5x"></i><br>
                    <?php echo lang('report_file_text'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
                    <input type="submit" class="btn btn-danger" value="<?php echo lang('report'); ?>">
                </div>
            </div>
        </div>
    </form>
</div>

<div id="modalTerms" class="modal fade terms_tab_body" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="min-height: 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                echo $settings['terms_text'];;
                ?>
            </div>
        </div>
    </div>
</div>

<div id="modalAbout" class="modal fade about_tab_body" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="min-height: 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                echo $settings['about_text'];
                ?>
            </div>
        </div>
    </div>
</div>

<div id="modalLang" class="modal fade language_settings_tab_body" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="min-height: 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
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
        </div>
    </div>
</div>

<div id="modalContact" class="modal fade contact_body" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="min-height: 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="contact-form" style="position: relative;height: 450px;">
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
                    <div class="g-recaptcha" data-sitekey="<?php echo $settings['recaptcha_key']; ?>"></div>
                    <button class="btn btn-default"><?php echo lang('send') ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if(is_array($custom_tabs) && !empty($custom_tabs)) {
    foreach ($custom_tabs AS $key => $tab) {
        if($tab['type'] == 'inline')
        {
            echo '<div id="custom_' . $key . '" class="modal fade custom_' . $key . '_body" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content" style="min-height: 390px;">
                                <div class="modal-header" style="min-height: 50px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="overflow-x: auto;">
                                    <div style="position: relative;">';
            require_once APPPATH . 'plugins/' . $tab['plugin'] . '/' . $tab['view'];
            echo '				</div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }
}
?>
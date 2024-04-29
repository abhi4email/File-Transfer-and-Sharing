<!-- Upload box -->
<div class="upload-block">
    <div class="upload-block-inner">
        <div class="upload-block-content active" id="terms">
            <div>
                <lord-icon
                        src="assets/themes/<?php echo $settings['theme'] ?>/yyecauzv.json"
                        trigger="loop"
                        colors="primary:<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#0096f2'); ?>,secondary:<?php echo (!empty($settings['theme_color_secondary']) ? $settings['theme_color_secondary'] : '#d59f80'); ?>"
                        style="width:100%;height:250px">
                </lord-icon>

                <span class="description"><?php echo lang('accept_terms') ?><br><a href="#" id="openTerms"><?php echo lang('view_terms') ?></a></span>
            </div>

            <div class="button-block">
                <a class="button is-info is-rounded" href="handler/acceptterms?url=<?php echo urlencode(current_url()) ?>"><?php echo lang('accept') ?></a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document.body).on('click', '#openTerms', function(ev) {
        ev.preventDefault();
        Tabs.open('tab-terms');
    });
</script>
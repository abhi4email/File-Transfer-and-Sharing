<div class="upload-block">
    <div class="upload-block-inner">
        <?php if($settings['ad_1_enabled'] == 'true') : ?>
            <div class="mobile-ad-block">
                <?php echo $settings['ad_1_code']; ?>
            </div>
        <?php endif; ?>

        <div class="upload-block-content start-top active" id="download">
            <div class="top">
                <img src="assets/themes/<?php echo $settings['theme'] ?>/img/icons/upload-not-found.png" class="block-icon">

                <h1><?php echo lang('are_you_sure_delete'); ?></h1>
            </div>
            <div class="button-block">
                <form method="POST" style="width: 100%;display: inherit;justify-content: inherit;">
                    <input type="hidden" name="delete" value="yes">
                    <button class="button is-info is-rounded" type="submit"><?php echo lang('delete') ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
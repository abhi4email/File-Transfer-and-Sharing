<?php
if($settings['ad_1_enabled'] == 'true') :
    ?>
    <div class="ad-bottom">
        <?php echo $settings['ad_1_code']; ?>
    </div>
<?php
endif;
if($settings['ad_2_enabled'] == 'true') :
    ?>
    <div class="ad-sidebar">
        <?php echo $settings['ad_2_code']; ?>
    </div>
<?php
endif;
?>

<!-- Loading tools -->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/vegas.min.js?v=<?php echo $settings['version']; ?>"></script>
<script src="assets/themes/<?php echo $settings['theme'] ?>/js/progressbar.min.js"></script>
<script src="assets/themes/<?php echo $settings['theme'] ?>/js/lord-icon-2.0.2.js"></script>
<script src="assets/js/jquery.fileupload.js"></script>
<?php if(!empty($settings['recaptcha_key'])): ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
<?php endif; ?>

<!-- Inline JS variables -->
<script>
    var mobileVersion = "<?php echo ($mobile ? 'yes' : 'no'); ?>";
    var maxSize = <?php echo $settings['max_size']; ?>;
    var maxFiles = <?php echo $settings['max_files']; ?>;
    var maxSizeBytes = maxSize * 1024 * 1024;
    var maxChunkSize = <?php echo $settings['max_chunk_size']; ?>;
    var disallowedFiles = "<?php echo $settings['blocked_types']; ?>";
    var process_activate = false;
    var siteUrl = "<?php echo $settings['site_url']; ?>";
    var themeColor = "<?php echo (!empty($settings['theme_color']) ? $settings['theme_color'] : '#3e8ed0'); ?>";
    var themeColorSec = "<?php echo (!empty($settings['theme_color_secondary']) ? $settings['theme_color_secondary'] : '#3e8ed0'); ?>";

    $(document).ready(function() {
        var backgrounds = [
            <?php
            foreach($backgrounds AS $background) {
                $ext = pathinfo($background->src, PATHINFO_EXTENSION);
                echo '{ '.($ext == 'mp4' ? 'video: { src: "' . $background->src . '", mute: true, loop: false },' : 'src: "'.$background->src.'",') . ' clickurl: "'.$background->url.'", '.(!empty($background->duration) && $background->duration > 0 ? 'delay: '.($background->duration * 1000) : 'delay: '.($settings['bg_timer'] * 1000)) . '},';
            }
            ?>
        ];

        // Randomize backgrounds
        backgrounds.shuffle();

        $(".background").vegas({
            slides: backgrounds,
            transition: 'fade',
            preloadImage: true,
            timer: true,
            shuffle: true
        });
    });
</script>

<!-- Loading the javascript -->
<script src="assets/themes/<?php echo $settings['theme'] ?>/js/Sharify.js?v=<?php echo $settings['version']; ?>"></script>

<script>Form.pickShareOption('<?php echo $settings['default_sharetype'] ?>');</script>
<?php
if(isset($_GET['goto']))
    echo '<script>Tabs.open("'.str_replace('custom_', 'tab-', $_GET['goto']).'");</script>';
?>

<?php echo $settings['analytics']; ?>

<!-- Sharify V<?php echo $settings['version'] ?> -->
</body>
</html>
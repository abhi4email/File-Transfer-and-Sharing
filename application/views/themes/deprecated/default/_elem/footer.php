</div>
<?php
// Show ad when enabled
if($settings['ad_2_enabled'] == 'true' && !isset($noad)):
    ?>
    <div id="ad_2_div" style="margin: 420px auto 0 35px;">
        <?php echo $settings['ad_2_code']; ?>
    </div>
<?php
endif;
?>
<!-- End progress and succes div -->
</div>
</div>
</div>

<!-- Loading tools -->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.knob.min.js"></script>
<script src="assets/js/vegas.js"></script>
<script src="assets/js/jquery.fileupload.js"></script>
<?php if(!empty($settings['recaptcha_key'])): ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
<?php endif; ?>

<!-- Loading Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>

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

    $(document).ready(function() {
        var backgrounds = [
            <?php
            foreach($backgrounds AS $background) {
                $ext = pathinfo($background->src, PATHINFO_EXTENSION);
                echo '{ '.($ext == 'mp4' ? 'video: { src: "' . $background->src . '", mute: true, loop: false },' : 'src: "'.$background->src.'",') . ' clickurl: "'.$background->url.'", '.(!empty($background->duration) && $background->duration > 0 ? 'delay: '.($background->duration * 1000) : 'delay: '.($settings['bg_timer'] * 1000)) . '},';
            }
            ?>
        ];

        // Randomaze backgrounds
        backgrounds.shuffle();

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".background").vegas({
            slides: backgrounds
        });
    });
</script>

<!-- Loading javascript -->
<script src="assets/themes/<?php echo $settings['theme'] ?>/js/Sharify.js?v=<?php echo $settings['version']; ?>"></script>

<script>Form.pickShareOption('<?php echo $settings['default_sharetype'] ?>');</script>
<?php
if(isset($_GET['goto']))
    echo '<script>Pager.openSettings();Pager.openInlinePage("'.$_GET['goto'].'");</script>';
?>

<?php echo $settings['analytics']; ?>

<!-- Sharify V<?php echo $settings['version'] ?> -->
</body>
</html>
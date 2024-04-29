<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $settings['site_name']; ?> | <?php echo lang('login') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link href="<?php echo $settings['site_url'] . $settings['favicon_path']; ?>" rel="shortcut icon" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
    <link href="assets/css/vegas.min.css?v=<?php echo $settings['version']; ?>" rel="stylesheet">

    <!-- External libraries -->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/themes/<?php echo $settings['theme'] ?>/css/bulma.min.css">

    <link href="assets/themes/<?php echo $settings['theme'] ?>/css/style.css" rel="stylesheet">

    <!-- Javascript -->
    <script src="assets/themes/<?php echo $settings['theme'] ?>/js/jquery-3.6.0.min.js"></script>

    <?php if(!empty($settings['theme_color'])): ?>
        <!-- Style overwrite -->
        <style>.button.is-info, .upload-block .upload-form .radio-group .radio.selected { background: <?php echo $settings['theme_color'] ?> !important; color: <?php echo (!empty($settings['theme_color_text']) ? $settings['theme_color_text'] : '#fff'); ?> }</style>
    <?php endif; ?>
</head>
<body>
    <!-- background video -->
    <div class="background" id="background"></div>

    <div class="login-block">
        <form method="post">
            <img src="<?php echo $settings['logo_path'] ?>" class="logo">

            <?php if(isset($result) && !$result): ?>
                <div class="notification is-danger">
                    <?php echo lang('invalid_login') ?>
                </div>
            <?php endif; ?>

            <div class="field">
                <label class="label"><?php echo lang('login_email') ?></label>
                <div class="control">
                    <input class="input" type="text" name="email" placeholder="<?php echo lang('login_email') ?>">
                </div>
            </div>

            <div class="field">
                <label class="label"><?php echo lang('login_password') ?></label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="<?php echo lang('login_password') ?>">
                </div>
            </div>

            <?php if(!empty($settings['recaptcha_key'])): ?>
                <div class="g-recaptcha" data-sitekey="<?php echo $settings['recaptcha_key']; ?>"></div>
            <?php endif; ?>

            <div class="field has-text-right">
                <p class="control">
                    <button class="button is-info is-fullwidth"><?php echo lang('login') ?></button>
                </p>
            </div>
        </form>
    </div>

    <?php if(!empty($settings['recaptcha_key'])): ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php endif; ?>
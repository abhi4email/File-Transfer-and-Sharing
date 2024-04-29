<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="<?php echo $settings['site_desc']; ?>">
        <meta name="author" content="<?php echo $settings['site_name']; ?>">
        <meta name="keywords" content="<?php echo $settings['site_keywords']; ?>"/>

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

        <title><?php echo $settings['site_title']; ?></title>

        <base href="<?php echo $settings['site_url'] ?>">

        <!-- Favicon -->
        <link href="<?php echo $settings['site_url'] . $settings['favicon_path']; ?>" rel="shortcut icon" type="image/png">

        <!-- Loading Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Loading some custom styles -->
        <link href="assets/themes/<?php echo $settings['theme'] ?>/css/Sharify.css?v=<?php echo $settings['version']; ?>" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/vegas.min.css" rel="stylesheet">

        <?php
        if(isset($custom_css) && count($custom_css) > 0) {
            foreach ($custom_css as $css) {
                echo '<link href="' . $css . '" rel="stylesheet">';
            }
        }
        ?>

        <!-- Loading jQuery -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    </head>

    <body>
        <!-- background video -->
        <div class="background" id="background"></div>

        <!-- Dropzone overlay -->
        <div class="drop-overlay" id="drop-overlay"><p><?php echo lang('drop_files_here'); ?></p></div>

        <!-- Page content -->
        <div class="OuterDiv">
            <div class="MainOuter">
                <div class="MainMiddle">
                    <div id="errorDiv"></div>
                    <div class="MainContent">

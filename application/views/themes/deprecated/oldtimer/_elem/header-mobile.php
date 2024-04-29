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
    <link rel="shortcut icon" type="image/png" href="<?php echo $settings['site_url'] . $settings['favicon_path']; ?>">

    <!-- Loading Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading some custom styles -->
    <link href="assets/themes/<?php echo $settings['theme'] ?>/css/Sharify.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/vegas.min.css" rel="stylesheet">

    <!-- Loading jQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>var ismobile = true;</script>

    <!-- Custom styling for mobile phone -->
    <style>
        body {
            background: #FFF;
        }

        .main {
            width: 100%;
            height: 100%;
        }
        .MainContent {
            width: 100%;
            position: relative;
        }
        .FormContent {
            height: 300px;
            width: 95%;
        }
        /*.progressround {
            padding-top: 200px;
        }
        .progresssuccess {
            padding-top: 220px;
        }*/
        #downloadError {
            height: 300px;
            text-align: center;
        }
        #downloadSuccess {
            height: 250px;
        }
        .buttonSection {
            position: relative !important;
            width: 100% !important;
        }
        .buttonSection div {
            padding: 5px 0 !important;
        }
        .buttonSection div, .buttonSection div button {
            width: 100% !important;
            float: none !important;
        }
        .social {
            display: none;
        }
        .show-mobile {
            display: inline;
        }
    </style>
</head>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="<?php echo $settings['logo_path']; ?>" alt="Logo" style="max-height: 40px; margin-top: 10px; margin-left: 5px;"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="modal" data-target="#modalLang"><?php echo lang('change_language'); ?></a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerms"><?php echo lang('terms_service'); ?></a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalAbout"><?php echo lang('about_us'); ?></a></li>
                <?php if($settings['contact_enabled'] == 'true'): ?>
                    <li><a href="#" data-toggle="modal" data-target="#modalContact"><?php echo lang('contact'); ?></a></li>
                <?php endif; ?>
                <?php
                if(is_array($custom_tabs) && !empty($custom_tabs)) {
                    foreach ($custom_tabs AS $key => $tab) {
                        echo '<li><a '.($tab['type'] == 'url' ? 'href="'.base_url($tab['url']).'" '. ($tab['new_tab'] ? 'target="_blank"' : '') : 'data-toggle="modal" data-target="#custom_' . $key . '"').' class="settingsNav">' . lang($tab['translation']) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<body id="body">
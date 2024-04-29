<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin login">
    <meta name="author" content="Abhi">
    <meta name="keyword" content="">

    <title><?php echo $settings['site_name']; ?> | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/themes/<?php echo $settings['theme'] ?>/css/Sharify.css" rel="stylesheet">
    <link href="assets/css/admin/admin.css" rel="stylesheet">
    <link href="assets/css/admin/admin-responsive.css" rel="stylesheet">
    <link href="assets/css/vegas.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <script src="assets/js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <!-- background video -->
    <div class="background" id="background"></div>

    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST">
                <?php if(isset($result) && !$result): ?>
                    <div class="alert alert-danger" style="margin: 0;border-radius: 0;text-align: center;"><?php echo lang('invalid_login') ?></div>
                <?php endif; ?>

                <h2 class="form-login-heading"><?php echo lang('user_login') ?></h2>
                <div class="login-wrap">
                    <input type="text" id="email" name="email" class="form-control" placeholder="<?php echo lang('email') ?>" autofocus>
                    <br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="<?php echo lang('password') ?>">
                    <br>
                    <input type="submit" class="btn btn-theme btn-block" value="<?php echo lang('login') ?>">
                </div>
            </form>
        </div>
    </div>
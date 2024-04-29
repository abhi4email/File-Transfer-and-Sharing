<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $settings['site_name']; ?> - Admin panel">
    <meta name="author" content="Abhi">
    <meta name="keyword" content="">

    <title><?php echo $settings['site_name']; ?> - Admin Panel</title>

    <base href="<?php echo $settings['site_url'] ?>admin/">

    <link rel="shortcut icon" type="image/png" href="../<?php echo $settings['favicon_path']; ?>"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/css/tabler.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/css/tabler-vendors.min.css">
    <link href="../assets/admin/assets/css/dashboard.css" rel="stylesheet" />
    <link href="../assets/admin/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <link href="../assets/admin/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
</head>

<body class="antialiased">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <img src="<?php echo '../' . $settings['logo_path'] ?>" height="60" alt="">
            </div>
            <form class="card card-md" action="" method="post" autocomplete="off" data-bitwarden-watching="1">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>

                    <?php if(isset($login) && !$login): ?>
                        <div class="alert alert-danger" style="margin: 0;border-radius: 0;text-align: center;">Login incorrect</div>
                    <br>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                    </div>

                    <?php if(!empty($settings['recaptcha_key'])): ?>
                        <div class="g-recaptcha" data-sitekey="<?php echo $settings['recaptcha_key']; ?>"></div>
                    <?php endif; ?>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/js/tabler.min.js"></script>
    <script src="../assets/admin/assets/js/require.min.js"></script>
    <script src="../assets/admin/assets/js/dashboard.js"></script>
    <script src="../assets/admin/assets/plugins/charts-c3/plugin.js"></script>
    <script src="../assets/admin/assets/plugins/maps-google/plugin.js"></script>
    <script src="../assets/admin/assets/plugins/input-mask/plugin.js"></script>

    <?php if(!empty($settings['recaptcha_key'])): ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php endif; ?>

    <script>
        requirejs.config({
            baseUrl: '../assets/admin/'
        });
    </script>
</body>
</html>
<?php $total_checks = 0; ?>

<div class="text-center mb-4">
    <img src="assets/img/logo.png" height="60" alt="">
</div>
<div class="card card-md">
    <div class="card-body text-center py-4 p-sm-5">
        <h1>Welcome to Sharify!</h1>
        <p class="text-muted">A couple steps are needed to get you up and running so please follow along</p>
    </div>
    <div class="hr-text hr-text-center hr-text-spaceless">requirement checks</div>
    <div class="card-body">
        <?php if(!$database): ?>
            <h3 class="head text-center">Database credentials incorrect!</h3>
            <p class="narrow text-center">
                Sharify is unable to connect to your database<br>
                Please check if the database settings are correctly entered in the <code>application/config/database.php</code> file
                <br><br>
                <a href="" class="btn btn-success btn-outline-rounded green">I have added my credentials</a>
            </p>
        <?php else: ?>
            <p class="narrow text-center"><strong style="font-size: 20px;">Requirements:</strong><br>
                <?php if(function_exists('mysqli_connect')) { echo '<i class="fa fa-check"></i>'; $total_checks++; } else { echo '<i class="fa fa-times"></i>'; } ?> MySqli installed <br>
                <?php if(function_exists('curl_version')) { echo '<i class="fa fa-check"></i>'; $total_checks++; } else { echo '<i class="fa fa-times"></i>'; } ?> PHP Curl installed <br>
                <?php if(extension_loaded('zip')) { echo '<i class="fa fa-check"></i>'; $total_checks++; } else { echo '<i class="fa fa-times"></i>'; } ?> PHP ZIP installed <br>
                <?php if(file_exists(FCPATH . '/.htaccess')) { echo '<i class="fa fa-check"></i>'; $total_checks++; } else { echo '<i class="fa fa-times"></i>'; } ?> .htaccess file found <br>
            </p>
        <?php endif; ?>
    </div>
</div>
<div class="row align-items-center mt-3">
    <div class="col-4">
        <div class="progress">
            <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">25% Complete</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="btn-list justify-content-end">
            <?php if ($total_checks == 4) : ?>
                <a href="<?php echo $_SESSION['base_url'] ?>/install/step2" class="btn btn-primary">
                    Start
                </a>
            <?php else: ?>
                <a href="<?php echo $_SESSION['base_url'] ?>/install/step2" class="btn btn-danger" onclick="return confirm('Are you sure you want to proceed even though the requirements are not correct ?');">
                    Start
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
if(isset($error) && $error == 'connection') {
    echo '<div class="alert alert-danger" role="alert" style="margin-right: auto; margin-left: auto; width: 70%; text-align: center;">Sharify was unable to connect to the database please try again !</div>';
}
?>

<div class="text-center mb-4">
    <img src="assets/img/logo.png" height="60" alt="">
</div>
<div class="card card-md">
    <div class="card-body text-center py-4 p-sm-5">
        <h1 class="mt-5">Unable to connect</h1>
        <p class="text-muted">Sharify was unable to connect to your DB, please try again.</p>
    </div>
</div>
<div class="row align-items-center mt-3">
    <div class="col-4">
        <div class="progress">
            <div class="progress-bar" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">50% Complete</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="btn-list justify-content-end">
            <button type="submit" class="btn btn-primary">
                Go back
            </button>
        </div>
    </div>
</div>
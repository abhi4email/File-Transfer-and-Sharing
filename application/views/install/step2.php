<div class="text-center mb-4">
    <img src="assets/img/logo.png" height="60" alt="">
</div>
<form method="POST">
    <div class="card card-md">
        <div class="card-body text-center py-4 p-sm-5">
            <h1 class="mt-5">Purchase validation</h1>
            <p class="text-muted">Let's start by validating your purchase by entering your Sharify purchase code below.</p>
        </div>
        <div class="hr-text hr-text-center hr-text-spaceless">your data</div>
        <div class="card-body">
            <?php
            if(isset($error) && !empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '!</div>';
            }
            ?>
            <div class="mb-3">
                <label class="form-label">Your purchase code</label>
                <div class="input-group input-group-flat">
                    <input type="text" name="code" class="form-control ps-1" autocomplete="off" required="required">
                </div>
                <div class="form-hint">Don't know where to find your purchase code? Please give a look to this article: <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Can-I-Find-my-Purchase-Code-">here</a></div>
            </div>
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
                    Next
                </button>
            </div>
        </div>
    </div>
</form>
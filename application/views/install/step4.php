<div class="text-center mb-4">
    <img src="assets/img/logo.png" height="60" alt="">
</div>
<form method="POST">
    <div class="card card-md">
        <div class="card-body text-center py-4 p-sm-5">
            <h1 class="mt-5">Create admin user</h1>
            <p class="text-muted">Let's create an admin user that you can use to access your admin panel</p>
        </div>
        <div class="hr-text hr-text-center hr-text-spaceless">setup account</div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Admin email</label>
                <div class="input-group input-group-flat">
                    <input type="email" name="email" class="form-control ps-1" autocomplete="off" required="required">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Admin password</label>
                <div class="input-group input-group-flat">
                    <input type="password" name="password" class="form-control ps-1" autocomplete="off" required="required">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="col-4">
            <div class="progress">
                <div class="progress-bar" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <span class="visually-hidden">75% Complete</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="btn-list justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Create user
                </button>
            </div>
        </div>
    </div>
</form>
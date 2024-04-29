<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <br>
                    Home
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <?php if(!$this->adminlib->isUpToDate()) : ?>
            <div class="alert alert-danger" style="margin: 10px 0 20px 0;">
                <h2>New update available!</h2>
                A new update is available, go to your <a href="system">system page</a> to download and install.
                <br>
            </div>
        <?php endif; ?>
        <?php if (!is_writable(FCPATH . $settings['upload_dir'])) : ?>
            <div class="alert alert-danger" style="margin: 10px 0 20px 0;">
                <h2>Upload directory not writeable!</h2>
                It seems like the <code><?php echo FCPATH . $settings['upload_dir'] ?></code> directory is not writeable. Uploads on your site are likely to fail. Please make the <code><?php echo FCPATH . $settings['upload_dir'] ?></code> directory and the <code><?php echo FCPATH . $settings['upload_dir'] ?>temp/</code> writeable to allow uploads to work on your site.
                <br>
            </div>
        <?php endif; ?>
        <?php if (phpversion() >= '8.2') : ?>
            <div class="alert alert-danger" style="margin: 10px 0 20px 0;">
                <h2>Important! - Your PHP version is currently not supported!</h2>
                Sorry, but your PHP version (<?php echo phpversion() ?>) is currently not supported by Sharify, at the moment Sharify supports up to PHP 8.1.x<br>
                PHP 8.2 and higher are currently not supported and will cause issues with the frontend uploader. PHP 8.1.x is still actively updated and maintained until the end of 2024 so please use PHP 8.1.x until PHP 8.2 is supported by Sharify.
                <br>
            </div>
        <?php endif; ?>

        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_uploads'] ?></div>
                        <div class="text-muted mb-4">Total uploads</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_uploads_active'] ?></div>
                        <div class="text-muted mb-4">Active uploads</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_downloads'] ?></div>
                        <div class="text-muted mb-4">Total downloads</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_uploads_destroyed'] ?></div>
                        <div class="text-muted mb-4">Uploads destroyed</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_size'] ?></div>
                        <div class="text-muted mb-4">Total uploaded</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">&nbsp;</div>
                        <div class="h1 m-0"><?php echo $stats['total_size_download'] ?></div>
                        <div class="text-muted mb-4">Total downloaded</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-3">Using Storage <strong><?php echo $stats['total_size'] ?></strong></p>
                        <!--<div class="progress progress-separated mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 19%"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 9%"></div>
                        </div>
                        <div class="row">
                            <div class="col-auto d-flex align-items-center pe-2">
                                <span class="legend me-2 bg-primary"></span>
                                <span>Regular</span>
                                <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2 bg-info"></span>
                                <span>System</span>
                                <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2 bg-success"></span>
                                <span>Shared</span>
                                <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                            </div>
                            <div class="col-auto d-flex align-items-center ps-2">
                                <span class="legend me-2"></span>
                                <span>Free</span>
                                <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            System info
                        </h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-5">Site URL</dt>
                            <dd class="col-7"><?php echo $settings['site_url'] ?></dd>
                            <dt class="col-5">Sharify version</dt>
                            <dd class="col-7"><?php echo $settings['version'] ?></dd>
                            <dt class="col-5">PHP version</dt>
                            <dd class="col-7"><?php echo phpversion() ?></dd>
                            <dt class="col-5">Active theme</dt>
                            <dd class="col-7"><?php echo $settings['theme'] ?></dd>
                            <dt class="col-5">Active plugins</dt>
                            <dd class="col-7">
                                <?php
                                foreach ($plugins as $plugin) {
                                    echo $plugin['name'] . '<br>';
                                }
                                ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
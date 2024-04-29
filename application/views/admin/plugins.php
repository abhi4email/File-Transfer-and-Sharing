<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Installed plugins</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if(count($plugins) == 0) :
                            ?>
                            <p>No plugins found</p>
                            <?php
                        else:
                            ?>
                            <table class="table table-bordered table-striped table-condensed sortable">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Path</th>
                                    <th>Status</th>
                                    <th>Version</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($plugins AS $key => $plugin) {
                                    echo '<tr>';
                                    echo '<td>' . $key . '</td>';
                                    echo '<td>' . $plugin['name'] . '</td>';
                                    echo '<td><pre style="font-size: 11px; padding: 3px 10px;">application/plugins/' . $plugin['load'] . '/</pre></td>';
                                    echo '<td>Installed</td>';
                                    echo '<td>' . $plugin['version'] . '</td>';
                                    echo '<td>--</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Available plugins</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md">
                                    <div class="card-body text-center">
                                        <div class="text-uppercase font-weight-medium">Premium subscription<br>add-on</div>
                                        <div class="display-5 my-3">$ 19</div>
                                        <ul class="list-unstyled lh-lg">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Support for Paypal and Stripe
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Custom upload size, storage time and features for paid users
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Disable ads for paid users
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Multi user support
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Coupon codes support
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Fully translatable
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Free updates
                                            </li>
                                        </ul>
                                        <div class="text-center mt-4">
                                            <a href="https://codecanyon.net/item/Sharify-premium-subscription/13556620" target="_blank" class="btn btn-primary w-100">Install add-on</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md">
                                    <div class="card-body text-center">
                                        <div class="text-uppercase font-weight-medium">Sharify S3 add-on</div>
                                        <div class="display-5 my-3">$ 12</div>
                                        <ul class="list-unstyled lh-lg">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Unlimited file storage
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Connect to any S3 endpoint
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                AWS, Wasabi, Digitalocean, Backblaze B2 and more!
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Encrypted storage
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Free updates
                                            </li>
                                        </ul>
                                        <div class="text-center mt-4">
                                            <a href="https://codecanyon.net/item/amazon-s3-Sharify-online-file-sharing/12442659" target="_blank" class="btn btn-primary w-100">Install add-on</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md">
                                    <div class="card-body text-center">
                                        <div class="text-uppercase font-weight-medium">Sharify FTP add-on</div>
                                        <div class="display-5 my-3">$ 12</div>
                                        <ul class="list-unstyled lh-lg">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Store files on external FTP / SFTP server
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Authenticate with username, password and private key (RSA)
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Free updates
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Easy installation
                                            </li>
                                        </ul>
                                        <div class="text-center mt-4">
                                            <a href="https://codecanyon.net/item/ftp-Sharify-online-file-sharing/17702419" target="_blank" class="btn btn-primary w-100">Install add-on</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md">
                                    <div class="card-body text-center">
                                        <div class="text-uppercase font-weight-medium">Sharify Active Directory</div>
                                        <div class="display-5 my-3">$ 12</div>
                                        <ul class="list-unstyled lh-lg">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                LDAP support (V1, V2 and V3)
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Azure Active Directory support
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Option to specify any user attribute (LDAP)
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                                Free updates
                                            </li>
                                        </ul>
                                        <div class="text-center mt-4">
                                            <a href="https://codecanyon.net/item/active-directory-Sharify-online-file-transfer-and-sharing/41494925" target="_blank" class="btn btn-primary w-100">Install add-on</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
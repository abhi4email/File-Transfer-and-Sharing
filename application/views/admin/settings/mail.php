<?php require_once dirname(__FILE__) . '/header.php'; ?>
<div class="page-body margins">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <?php require_once dirname(__FILE__) . '/tabs.php'; ?>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="post">
                            <input type="hidden" name="save" value="1">
                            <div class="mb-3">
                                <label class="form-label">Email from (Name)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email_from_name" class="form-control" value="<?php echo $settings['email_from_name']; ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email from (E-Mail)</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email_from_email" class="form-control" value="<?php echo $settings['email_from_email']; ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Server</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="email_server" id="email_server" onchange="emailServer()">
                                        <option value="<?php echo $settings['email_server']; ?>" selected style="display:none;"><?php echo $settings['email_server']; ?></option>
                                        <option value="LOCAL">Local</option>
                                        <option value="SMTP">SMTP</option>
                                    </select>
                                </div>
                            </div>
                            <div id="smtpSection" <?php if($settings['email_server'] == 'LOCAL') { echo 'style="display: none;"'; } ?>>
                                <div class="mb-3">
                                    <label class="form-label">SMTP Host</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="smtp_host" class="form-control" value="<?php echo $settings['smtp_host']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SMTP Auth</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="smtp_auth">
                                            <option value="true">On</option>
                                            <option value="false">Off</option>
                                        </select>
                                    </div>
                                </div>
                                <script>$('select[name="smtp_auth"]').val("<?php echo $settings['smtp_auth'] ?>");</script>

                                <div class="mb-3">
                                    <label class="form-label">SMTP Port</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="smtp_port" class="form-control" value="<?php echo $settings['smtp_port']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SMTP Secure</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="smtp_secure">
                                            <option value="tls">TLS</option>
                                            <option value="ssl">SSL</option>
                                            <option value="none">NONE</option>
                                        </select>
                                    </div>
                                </div>
                                <script>$('select[name="smtp_secure"]').val("<?php echo $settings['smtp_secure'] ?>");</script>

                                <div class="mb-3">
                                    <label class="form-label">SMTP Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="smtp_username" class="form-control" value="<?php echo $settings['smtp_username']; ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SMTP Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="smtp_password" class="form-control" placeholder="SMTP Password (Leave empty if you do not want to change it)">
                                    </div>
                                </div>
                            </div>
                            <div id="localSection" <?php if($settings['email_server'] == 'SMTP') { echo 'style="display: none;"'; } ?>>
                                <div class="mb-3">
                                    <h4>You have selected "Local server" there are no more options when Local server has been selected</h4>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function emailServer() {
        var X = document.getElementById("email_server").value;
        if(X == 'LOCAL') {
            document.getElementById('smtpSection').style.display = "none";
            document.getElementById('localSection').style.display = "block";
        }
        if(X == 'SMTP') {
            document.getElementById('smtpSection').style.display = "block";
            document.getElementById('localSection').style.display = "none";
        }
    }
</script>
<?php require_once dirname(__FILE__) . '/header.php'; ?>
<div class="page-body margins">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <?php require_once dirname(__FILE__) . '/tabs.php'; ?>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="save" value="1">
                            <div class="mb-3">
                                <label class="form-label">Name on zip file</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_on_file" class="form-control" value="<?php echo $settings['name_on_file']; ?>">
                                    <i>The name on the downloaded zip files (E.g. <u>Sharify</u>-sg785ey.zip or <u>file</u>-82js87w.zip)</i> <p><b>WARNING:</b> By editing this name you won't be able to download old files anymore.</p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload ID length</label>
                                <div class="col-sm-10">
                                    <input type="number" min="5" max="100" name="upload_id_length" class="form-control" value="<?php echo $settings['upload_id_length']; ?>">
                                    <i>The length of the generated upload ID. E.g. 8 will be https://yourdomain.com/abcd1234</i>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password function enabled</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="password_enabled">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <i>Turns the password function on or off</i>
                                </div>
                            </div>
                            <script>$('select[name="password_enabled"]').val("<?php echo $settings['password_enabled'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Show "share type" selection option</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="share_enabled">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <i>Will show/hide the share option in the advanced section of the upload form, the "Default share type" will be used.</i>
                                </div>
                            </div>
                            <script>$('select[name="share_enabled"]').val("<?php echo $settings['share_enabled'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Default share type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="default_sharetype">
                                        <option value="mail">E-Mail</option>
                                        <option value="link">Link</option>
                                    </select>
                                    <i>The share type E-Mail or Link on page load</i>

                                </div>
                            </div>
                            <script>$('select[name="default_sharetype"]').val("<?php echo $settings['default_sharetype'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Show "Self-destruct" option</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="destruct_enabled">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <i>Will show/hide the "Self-destruct" option in the advanced section of the upload form, the "" will be used.</i><br>
                                    <i><b>Note!</b> This option is for enabling/disabling "Self-destruct". Self-destruct is a Sharify feature that will destroy files when all recipients have downloaded the file, so a recipient can only download the file once. Uploads are still destroyed when their expiration time is reached.</i>
                                </div>
                            </div>
                            <script>$('select[name="destruct_enabled"]').val("<?php echo $settings['destruct_enabled'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Default "Self destruct" option</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="default_destruct">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <i>Will set the default value of the "Enable self destruct" option to Yes or No. If the "Show destruct on download option" option is set to "No" then the above value will be used as default value.</i><br>
                                    <i><b>Note!</b> This option is for enabling/disabling "Self-destruct". Self-destruct is a Sharify feature that will destroy files when all recipients have downloaded the file, so a recipient can only download the file once. Uploads are still destroyed when their expiration time is reached.</i>
                                </div>
                            </div>
                            <script>$('select[name="default_destruct"]').val("<?php echo $settings['default_destruct'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Default recipient emails</label>
                                <div class="col-sm-10">
                                    <input type="text" name="default_email_to" class="form-control" value="<?php echo $settings['default_email_to'] ?>">
                                    <i>Default recipients of the uploads, this value can't be changed by the user. Use a comma <code>,</code> to add multiple options and append <code>[]</code> after each email to set the title.</i>
                                    E.g. <code>info@Abhi.com[Info - Abhi],support@Abhi.com[Support - Abhi]</code>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Enable auto-fill sender email</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="enable_sender_cookie">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <i>After the first upload the sender (email from) will be stored in a cookie and auto-filled on the next page visit.</i>
                                </div>
                            </div>
                            <script>$('select[name="enable_sender_cookie"]').val("<?php echo $settings['enable_sender_cookie'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Sender email verification</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="email_verify">
                                        <option value="false">Disabled</option>
                                        <option value="once">Once</option>
                                        <option value="always">Always</option>
                                    </select>
                                    <i>Send a code to the sender email address to verify the email is in use by the uploader. Once = Only ask to verify new email addresses, Always = Always ask for email verification</i>

                                </div>
                            </div>
                            <script>$('select[name="email_verify"]').val("<?php echo $settings['email_verify'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Available expire times</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="expire[]" multiple="multiple" style="min-height: 300px;">
                                        <option value="0">Do not expire</option>
                                        <optgroup label="Hours">
                                            <option value="3600">1 Hour</option>
                                            <option value="10800">3 Hours</option>
                                            <option value="18000">5 Hours</option>
                                            <option value="28800">8 Hours</option>
                                            <option value="36000">10 Hours</option>
                                            <option value="43200">12 Hours</option>
                                            <option value="50400">14 Hours</option>
                                            <option value="57600">16 Hours</option>
                                            <option value="64800">18 Hours</option>
                                            <option value="72000">20 Hours</option>
                                            <option value="79200">22 Hours</option>
                                        </optgroup>
                                        <optgroup label="Days">
                                            <option value="86400">1 Day</option>
                                            <option value="172800">2 Days</option>
                                            <option value="259200">3 Days</option>
                                            <option value="345600">4 Days</option>
                                            <option value="432000">5 Days</option>
                                            <option value="518400">6 Days</option>
                                        </optgroup>
                                        <optgroup label="Weeks">
                                            <option value="604800">1 Week</option>
                                            <option value="1209600">2 Weeks</option>
                                            <option value="1814400">3 Weeks</option>
                                        </optgroup>
                                        <optgroup label="Months">
                                            <option value="2592000">1 Month</option>
                                            <option value="5184000">2 Months</option>
                                            <option value="7776000">3 Months</option>
                                            <option value="10368000">4 Months</option>
                                            <option value="12960000">5 Months</option>
                                            <option value="15552000">6 Months</option>
                                            <option value="18144000">7 Months</option>
                                            <option value="20736000">8 Months</option>
                                            <option value="23328000">9 Months</option>
                                            <option value="25920000">10 Months</option>
                                            <option value="28512000">11 Months</option>
                                            <option value="31104000">12 Months</option>
                                        </optgroup>
                                    </select>
                                    <p><i>Time till a file gets destroyed</i><br><i>Select multiple values by selecting them while holding the CTRL or CMD key.</i></p>
                                </div>
                            </div>
                            <script>
                                $.each(("<?php echo $settings['expire'] ?>").split(","), function(i,e){
                                    $("select[name='expire[]'] option[value='" + e + "']").prop("selected", true);
                                });
                            </script>

                            <div class="mb-3">
                                <label class="form-label">Default expire time</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="default_expire">
                                        <option value="">No default</option>
                                        <?php
                                        $times = explode(',',$settings['expire']);
                                        foreach ($times AS $time) {
                                            echo "<option value='$time'>".secondsToTime($time)."</option>";
                                        }
                                        ?>
                                    </select>
                                    <i>Select the default expire time (If you've added new times and you're not seeing them in the dropdown above then first hit Save on the bottom of the page and check back here)</i>
                                </div>
                            </div>
                            <script>$('select[name="default_expire"]').val("<?php echo $settings['default_expire'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Max selected files</label>
                                <div class="col-sm-10">
                                    <input type="number" name="max_files" class="form-control" value="<?php echo $settings['max_files']; ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Max upload size <b>(MB)</b></label>
                                <div class="col-sm-10">
                                    <input type="number" name="max_size" class="form-control" value="<?php echo $settings['max_size']; ?>">
                                    <i>Maximum upload size in MB</i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Max chunk size <b>(MB)</b></label>
                                <div class="col-sm-10">
                                    <input type="number" name="max_chunk_size" class="form-control" value="<?php echo $settings['max_chunk_size']; ?>">
                                    <i><b>Please do not change this if you don't know what you're doing</b>. Maximum chunk size in MB (Files are being uploaded in chunks (broken into pieces on the client computer and put back together on your web-server)), this value will define the maximum allowed size of each chunk. Suggested value is something between 1 and 5 MB.</i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encrypt files (<a href="https://Abhi.zendesk.com/hc/en-us/articles/115001511049" target="_blank" style="color: blue;">More info</a>)</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="encrypt_files">
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                    <i><span style="color: red;">IMPORTANT !</span> you will need to have the PHP module " openssl " installed on your server. Files that are already on the server will be kept uncrypted only<br> new uploaded files will be encrypted, the uncrypted files will still be available for download. More information about the encryption feature can be found in </i><a href="https://Abhi.zendesk.com/hc/en-us/articles/115001511049" target="_blank" style="color: blue;">this article</a>
                                </div>
                            </div>
                            <script>$('select[name="encrypt_files"]').val("<?php echo $settings['encrypt_files'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Blocked file types</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="blocked_types" style="width: 100%; height: 100px;"><?php echo $settings['blocked_types']; ?></textarea>
                                    <i>Choose which file type(s) have to be blocked. (Split values with  a comma ',' and without any space between them, All file types can be found <a href="http://www.iana.org/assignments/media-types/media-types.xhtml">here</a>)</i>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File previews <span class="badge bg-secondary">New!</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="file_previews">
                                        <option value="true">Enabled</option>
                                        <option value="false">Disabled</option>
                                    </select>
                                    <i>This allows users to preview files on the download page and individually download each file instead of only downloading the ZIP. Note that both the individual files and ZIP file will be stored on your server/external storage so a single upload will actually be stored twice.</i>
                                </div>
                            </div>
                            <script>$('select[name="file_previews"]').val("<?php echo $settings['file_previews'] ?>");</script>

                            <div class="mb-3">
                                <label class="form-label">Upload directory</label>
                                <div class="col-sm-10">
                                    <input type="text" name="upload_dir" class="form-control" value="<?php echo $settings['upload_dir'] ?>">
                                    <i>Do not forget to add a "/" at the end</i>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
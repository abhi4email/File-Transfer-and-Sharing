<?php require_once dirname(__FILE__) . '/header.php'; ?>
<div class="page-body margins">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <?php require_once dirname(__FILE__) . '/tabs.php'; ?>
                    <div class="card-body">
                    <?php
                    if(isset($_GET['lang'])) :
                    ?>
                        <div style="float: right;">
                            <select id="langSelector" onchange="langSelector()">
                                <option selected="true" disabled="disabled">-- Select language --</option>
                                <?php
                                foreach($languages as $row)
                                {
                                    echo '<option value="' . strtolower($row->path) . '">' . $row->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <form class="form-horizontal style-form" method="post">
                            <input type="hidden" name="save" value="1">
                            <input type="hidden" name="lang" value="<?php echo $_GET['lang']; ?>">
                            <div class="mb-3">
                                <label class="form-label">E-Mail - Receivers</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="receiver_subject" placeholder="Receiver email subject" value="<?php echo $templates->getByTypeAndLanguage('receiver_subject', $_GET['lang'])['msg']; ?>"><br>
                                    <textarea name="receiver" class="form-control" style="width: 100%; height: 200px;"><?php echo $templates->getByTypeAndLanguage('receiver', $_GET['lang'])['msg'] ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-Mail - Sender</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sender_subject" placeholder="Sender email subject" value="<?php echo $templates->getByTypeAndLanguage('sender_subject', $_GET['lang'])['msg']; ?>"><br>
                                    <textarea name="sender" class="form-control" style="width: 100%; height: 200px;"><?php echo $templates->getByTypeAndLanguage('sender', $_GET['lang'])['msg']; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-Mail - Destroyed</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="destroyed_subject" placeholder="Receiver email subject" value="<?php echo $templates->getByTypeAndLanguage('destroyed_subject', $_GET['lang'])['msg']; ?>"><br>
                                    <textarea name="destroyed" class="form-control" style="width: 100%; height: 200px;"><?php echo $templates->getByTypeAndLanguage('destroyed', $_GET['lang'])['msg']; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-Mail - Downloaded</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="downloaded_subject" placeholder="Downloaded email subject" value="<?php echo $templates->getByTypeAndLanguage('downloaded_subject', $_GET['lang'])['msg']; ?>"><br>
                                    <textarea name="downloaded" class="form-control" style="width: 100%; height: 200px;"><?php echo $templates->getByTypeAndLanguage('downloaded', $_GET['lang'])['msg']; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-Mail - Verify email address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email_verify_subject" placeholder="Verify email subject" value="<?php echo $templates->getByTypeAndLanguage('email_verify_subject', $_GET['lang'])['msg']; ?>"><br>
                                    <textarea name="email_verify" class="form-control" style="width: 100%; height: 200px;"><?php echo $templates->getByTypeAndLanguage('email_verify', $_GET['lang'])['msg']; ?></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                        </form>
                    <?php

                    else:
                    ?>
                        <div class="mb-3">
                            <select id="langSelector" onchange="langSelector()" class="form-control">
                                <option selected="true" disabled="disabled">-- Select language --</option>
                                <?php
                                foreach($languages as $row)
                                {
                                    echo '<option value="' . strtolower($row->path) . '">' . $row->name . '</option>';
                                }
                                ?>
                            </select>
                            <p><i>Go to this page <a href="<?php echo $settings['site_url'] ?>admin/settings/language"><span class="label label-info">here</span></a> if you would like to add more language options.</i></p>
                        </div>
                    <?php
                    endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function langSelector()
    {
        var selectedLang = document.getElementById('langSelector').value;
        window.location.href = "<?php echo $settings['site_url'] ?>admin/settings/mailtemplates?lang="+selectedLang;
    }
</script>
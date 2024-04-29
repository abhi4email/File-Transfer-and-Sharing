<div id="uploadSettings" class="uploadSettings" style="display: none;">
    <div style="float: left; margin-left: 20px; margin-top: 7px; width: 130px;">
        <h4><?php echo $settings['site_name']; ?></h4><hr style="margin-bottom: 0px;">
        <ul style="list-style-type: none; padding-left: 0;">
            <li><a id="terms_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo $this->lang->line('terms_service') ?></a></li>
            <li><a id="about_tab" class="settingsNav" onclick="Pager.openInlinePage(this.id);"><?php echo $this->lang->line('about_us') ?></a></li>
        </ul>
    </div>
    <div class="settingsContent">
        <div style="float: right; padding-top: 5px; padding-right: 5px;">
            <i class="fa fa-times-circle-o" style="color: #716C6C; font-size: 25px; cursor: pointer; cursor: hand;" onclick="Pager.closeSettings();"></i>
        </div>
        <div class="settingsBody">
            <div id="terms_tab_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 360px; width: 90%;">
                <?php
                echo $settings['terms_text'];
                ?>
            </div>
            <div id="about_tab_body" class="settingsBodyContent" style="display: none; overflow: auto; height: 360px; width: 90%;">
                <?php
                echo $settings['about_text'];
                ?>
            </div>
        </div>
    </div>
    <div class="headerDivider"></div>
</div>

<div class="main" id="cookieDiv">

    <div style="width: 70%; margin: 50px auto;">
        <div class="progressImage"><i class="fa fa-globe fa-5x"></i></div>
        <div class="progressMessage">
            <p><?php echo $this->lang->line('accept_terms') ?></p>
        </div>

        <div style="text-align: center;">
            <p><a <?php echo ($mobile ? 'href="#" data-toggle="modal" data-target="#modalTerms"' : 'href="#" id="open_terms"') ?>"><?php echo $this->lang->line('view_terms') ?></a></p>
        </div>
        <?php echo ($mobile ? '<br><br>' : '') ?>
        <div class="buttonSection" style="width: 70%;">
            <a class="btn btn-default btn-block btn-sm" href="handler/acceptterms?url=<?php echo urlencode(current_url()) ?>"><i class="fa fa-check"></i> <?php echo $this->lang->line('accept') ?></a>
        </div>
    </div>
</div>

<script>
    $(document.body).on('click', '#open_terms', function(ev) {
        ev.preventDefault();
        Pager.openSettings();
        Pager.openInlinePage('terms_tab');
    });
</script>
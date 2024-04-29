<!-- Social buttons div -->
<div class="social" id="uploadDivSocial">
    <?php
    if(!empty($socials['facebook'])) :
        ?>
        <a href="<?php echo $socials['facebook'] ?>" class="btn btn-social-icon btn-facebook btn-sm" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php
    endif;
    if(!empty($socials['twitter'])) :
        ?>
        <a href="<?php echo $socials['twitter'] ?>" class="btn btn-social-icon btn-twitter btn-sm" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php
    endif;
    if(!empty($socials['tumblr'])) :
        ?>
        <a href="<?php echo $socials['tumblr'] ?>" class="btn btn-social-icon btn-tumblr btn-sm" target="_blank"><i class="fa fa-tumblr"></i></a>
        <?php
    endif;
    if(!empty($socials['google'])) :
        ?>
        <a href="<?php echo $socials['google'] ?>" class="btn btn-social-icon btn-google-plus btn-sm" target="_blank"><i class="fa fa-google"></i></a>
        <?php
    endif;
    if(!empty($socials['instagram'])) :
        ?>
        <a href="<?php echo $socials['instagram'] ?>" class="btn btn-social-icon btn-instagram btn-sm" target="_blank"><i class="fa fa-instagram"></i></a>
        <?php
    endif;
    if(!empty($socials['github'])) :
        ?>
        <a href="<?php echo $socials['github'] ?>" class="btn btn-social-icon btn-github btn-sm" target="_blank"><i class="fa fa-github"></i></a>
        <?php
    endif;
    if(!empty($socials['pinterest'])) :
        ?>
        <a href="<?php echo $socials['pinterest'] ?>" class="btn btn-social-icon btn-google-plus btn-sm" target="_blank"><i class="fa fa-pinterest"></i></a>
        <?php
    endif;
    ?>
</div>
<!-- End social buttons div -->
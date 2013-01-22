<footer>
    <hr>
    <div class="row well no_margin_left well_foot">
        <div class="container">
            <div class="span3 offset1">
                <h4>Informasi</h4>
                <ul>
                    <li>
                        <i class="icon-home icon-large" style="width: 0; padding-right: 28px;"></i>
                        <?php echo $profile['alamat'];?>
                    </li>
                    <li>
                        <i class="icon-phone icon-large" style="width: 0; padding-right: 28px;"></i>
                        <?php echo $profile['telepon'];?>
                    </li>
                    <li>
                        <i class="icon-envelope-alt icon-large" style="width: 0; padding-right: 28px;"></i>
                        <?php echo $profile['email'];?>
                    </li>
                </ul>
            </div>
            <div class="span5">
                <h4>Tentang Areakamera</h4>
                <?php echo $profile['tentang'];?>
            </div>
            <div class="span2">
                <h4>Social Network</h4>
                <ul>
                    <li>
                        <i class="icon-facebook-sign icon-large" style="width: 0; padding-right: 28px;"></i>
                        <a href="<?php echo $profile['facebook'];?>">Facebook</a>
                    </li>
                    <li>
                        <i class="icon-twitter-sign icon-large" style="width: 0; padding-right: 28px;"></i>
                        <a href="<?php echo $profile['twitter'];?>">Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <hr />
            <div class="span12 no_margin_left"><p class="copyright"><strong>areakamera.com</strong></a> copyright&copy;2012<div>
                </div>
            </div>
            </footer>
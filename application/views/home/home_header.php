<div class="container">
    <div class="row"><!-- start header -->
        <div class="span4 logo">
            <a href="<?php echo base_url();?>" title="Logo">                
                <img style="max-height: 100px;" src="<?php echo base_url();?>res/image/header/<?php echo $this->config->item('header_logo_image_name');?>">
            </a>
        </div>
        <div class="span8">
            <div class="row">
                <div class="span1">&nbsp;</div>
                <div class="span8 customer_service pull-right head-inf">
                    <p>
                        <?php echo $profile['alamat']; ?>
                        <i class="icon-home icon-large" style="width: 0; padding-right: 28px;"></i>
                    </p>
                    <p>
                        <?php echo $profile['telepon'] ?>
                        <i class="icon-phone icon-large" style="width: 0; padding-right: 28px;"></i>
                    </p>
                    <p>
                        <?php echo $profile['email'] ?>
                        <i class="icon-envelope-alt icon-large" style="width: 0; padding-right: 28px;"></i>
                    </p>
                </div>               
            </div>
            <br>            
        </div>
    </div><!-- end header -->
</div>
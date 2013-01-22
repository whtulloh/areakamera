<div class="container-fluid">
    <div class="row-fluid">

        <?php echo $this->load->view('admin/admin_content_sidebar'); ?>

        <noscript>
        <div class="alert alert-block span10">
            <h4 class="alert-heading">Warning!</h4>
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
        </noscript>

        <div id="content" class="span10">
            <!-- content starts -->			

            <div class="row-fluid">
                <div class="span12">
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_insert">Insert Barang</a> 
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update/<?php echo $items_single->item_id; ?>">Update Data Barang</a>
                </div>

            </div>

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Barang</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">
                        <h2><strong><?php echo $items_single->name;?></strong></h2>
                        <br>                        
                        <ul class="thumbnails" id="gallery">
                            <?php
                            $i = 0;
                            foreach ($items_images as $rows_images) {
                                if ($i == 0) {
                                    ?>
                                    <li class="span3">
                                        <a rel="gallery" href="<?php echo base_url(); ?>res/image/<?php echo $items_single->picture_path; ?>">
                                            <img alt="" src="<?php echo base_url(); ?>res/image/<?php echo $items_single->picture_path; ?>">
                                        </a>
                                    </li>

                                    <?php
                                    //dikosongin jika ngeloop image pertama
                                    //soalnya image pertama udah dipake di img atas
                                } else {
                                    ?>
                                    <li class="span1">
                                        <a rel="gallery" href="<?php echo base_url(); ?>res/image/<?php echo $rows_images->picture_path; ?>">
                                            <img src="<?php echo base_url(); ?>res/image/<?php echo $rows_images->picture_path; ?>" alt="">
                                        </a>
                                    </li>
                                    <?php
                                }
                                $i++;
                            }
                            ?>                       
                        </ul>      

                        <div class="span12">
                            <div class="span4">
                                <address>
                                    <?php
                                    foreach ($items_spec as $rows_spec) {
                                        ?>
                                        <strong><?php echo $rows_spec->name; ?></strong> 
                                        <span><?php echo $rows_spec->value; ?></span><br>
                                        <?php
                                    }
                                    ?>                                                        
                                </address>
                            </div>
                            <div class="span8">
                                <h3>
                                    <strong>Price: <?php echo "Rp" . number_format($items_single->price, 0, "", "."); ?></strong> <small>Discount: <?php echo $items_single->discount_value; ?>%</small><br><br>
                                </h3>
                            </div>                                        
                        </div>                        
                        <hr>
                        <div class="span9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#1" data-toggle="tab">Description</a></li>                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="1">
                                        <p><?php echo $items_single->description; ?></p>
                                    </div>                                                                
                                </div>
                            </div>
                        </div>                             
                    </div>
                </div>
            </div>

            <!-- content ends -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <hr>

</div><!--/.fluid-container-->        

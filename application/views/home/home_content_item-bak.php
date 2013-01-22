<div class="container">    
    <div class="row">
        <?php $this->load->view('home/home_content_sidebar'); ?>
        
        <div class="span9">
            <ul class="breadcrumb">
                <li>
                    <?php echo $items_category->name;?>
                </li>                
            </ul>
            <div class="row">
                <div class="span9">
                    <h1><?php echo $items_single->name;?></h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="span3">                                        
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

                </div>
                <div class="span6">
                    <div class="span6">
                        <address>
                            <?php 
                                foreach($items_spec as $rows_spec) {
                            ?>
                                    <strong><?php echo $rows_spec->name;?></strong> 
                                    <span><?php echo $rows_spec->value;?></span><br>
                            <?php
                                }
                            ?>                                                        
                        </address>
                    </div>
                    <div class="span6">
                        <h2>
                            <strong>Price: <?php echo "Rp".number_format($items_single->price,0,"",".");?></strong> <small>Discount: <?php echo $items_single->discount_value;?>%</small><br><br>
                        </h2>
                    </div>                                        
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="span9">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" data-toggle="tab">Description</a></li>
                            <li><a href="#2" data-toggle="tab">Related products</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <p><?php echo $items_single->description;?></p>
                            </div>                            
                            <div class="tab-pane" id="2">
                                <ul class="thumbnails related_products">
                                    <?php
                                    foreach ($items_related as $rows_related) {
                                        ?>
                                        <li class="span2">
                                            <div class="thumbnail">
                                                <a href="<?php echo base_url(); ?>home/item/<?php echo $rows_related->item_id; ?>""><img alt="" src="<?php echo base_url();?>res/image/<?php echo $rows_related->picture_path; ?>"></a>
                                                <div class="caption">
                                                    <a href="<?php echo base_url(); ?>home/item/<?php echo $rows_related->item_id; ?>""> <h5><?php echo $rows_related->name;?></h5></a>  Price: <?php echo $rows_related->price; ?><br><br>
                                                </div>
                                            </div>
                                        </li>                                    
                                        <?php
                                    }
                                    ?>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
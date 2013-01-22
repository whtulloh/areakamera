<div class="container">           
    <div class="row">        
        <?php $this->load->view('home/home_content_sidebar'); ?>        
        <div class="span9 popular_products">
            <ul class="breadcrumb">
                <li>
                    <?php 
                    //pengecekan isset jika user mencoba memasukkan url /home/store/
                    //pengecekan null jika user mencoba memasukkan url dengan category_id..
                    //yang tidak ada
                    if(isset($parent_name) && $parent_name != null) {
                        echo $parent_name->name;
                        echo "<span class=\"divider\">/</span>";
                    }
                    ?>
                    
                </li>
                
                <li>
                    <?php 
                    if(isset($category_name)) {
                        echo $category_name->name;
                    } 
                    ?>
                </li>
                
            </ul>
            
            <ul class="thumbnails">
                <?php echo $links; ?>
                <?php
                if ($items == null) {
                    ?>                    
                        <strong>item not found</strong>                    
                    <?php
                } else {
                    foreach ($items as $rows) {
                        ?>
                        <li class="span2">
                            <div class="thumbnail" style="height: 220px;">
                                <center><a href="<?php echo base_url(); ?>home/item/<?php echo $rows->item_id; ?>"><img alt="" src="<?php echo base_url(); ?>res/image/<?php echo $rows->picture_path_resize; ?>"></a></center>
                                <div class="caption">
                                    <a href="<?php echo base_url(); ?>home/item/<?php echo $rows->item_id; ?>"> <h5><?php echo $rows->name; ?></h5></a>  Price: <?php echo "Rp".number_format($rows->price,0,"",".");?><br><br>
                                </div>
                            </div>
                        </li>               
                        <?php
                    }
                }
                ?>
            </ul>
        </div>        

    </div>
</div>



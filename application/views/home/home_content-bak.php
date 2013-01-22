<div class="container">
    <div class="row">
        <div class="span12">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    $i = 0; //i digunakan untuk mengecek image pertama yg muncul.
                    //jika i == 0 maka class = active
                    //carousel butuh class active untuk menampilkan image pertama kali

                    foreach ($carousel as $rows) {
                        if ($i == 0) {
                            $i++;
                            ?>
                            <div class="item active">
                                <?php
                                if ($rows->item_link != '') {
                                    ?>
                                    <a href="<?php echo $rows->item_link; ?>"><img class="span12" src="<?php echo base_url() . "res/image/carousel/" . $rows->picture_path; ?>" style="margin: 0 auto; height: 300px; max-height: 300px;"></a>
                                    <?php
                                } else {
                                    ?>
                                    <img class="span12" src="<?php echo base_url() . "res/image/carousel/" . $rows->picture_path; ?>" style="margin: 0 auto; height: 300px; max-height: 300px;">
                                    <?php
                                }
                                ?>

                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="item">
                                <?php
                                if ($rows->item_link != '') {
                                    ?>
                                    <a href="<?php echo $rows->item_link; ?>"><img class="span12" src="<?php echo base_url() . "res/image/carousel/" . $rows->picture_path; ?>" style="margin: 0 auto;"></a>
                                    <?php
                                } else {
                                    ?>
                                    <img class="span12" src="<?php echo base_url() . "res/image/carousel/" . $rows->picture_path; ?>" style="margin: 0 auto;">
                                    <?php
                                }
                                ?>

                            </div>
                            <?php
                        }
                    }
                    ?>  
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
        </div>
    </div>
    <div class="row">
        
        <?php $this->load->view('home/home_content_sidebar');?>
        <div class="span7 popular_products">
            <h4 class="breadcrumb">Produk Terbaru</h4><br>
            <ul class="thumbnails">
                <?php
                if ($items_popular == null) {
                    ?>                    
                        <strong>item not found</strong>                    
                    <?php
                } else {
                    foreach ($items_popular as $rows) {
                        ?>
                        <li class="span2" style="float: left;">
                            <div class="thumbnail">
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
            
            <div class="article">
                <h4 class="breadcrumb">Artikel</h4>
                <?php
                foreach ($articles as $rows_article) {
                    ?>
                    <article class="home-article">
                        <?php $text = word_limiter($rows_article->content, 200); ?>
                        <header><a href="<?php echo base_url(); ?>home/artikel/single/<?php echo $rows_article->article_id; ?>"><?php echo $rows_article->title; ?></a></header>
                        <div>
                            <?php echo $text; ?>
                            <a href="<?php echo base_url(); ?>home/artikel/single/<?php echo $rows_article->article_id; ?>">continue reading..</a>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="span2">
            <div class="roe">
               <p class="breadcrumb">Informasi</p><br>   
               <ul>
                   <li>
                       <a href="<?php echo base_url();?>home/informasi">Tentang Kami</a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>home/cara_pembelian">Cara Pembelian</a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>home/garansi">Penjelasan Garansi</a>
                   </li>
               </ul>
            </div>        
            <br>
            <div class="roe">
                <p class="breadcrumb">Support</p><br>                                
                <a href=ymsgr:sendIM?<?php echo $profile['ym'];?>><img src="http://opi.yahoo.com/online?u=<?php echo $profile['ym'];?>&m=g&t=15"></a>                
            </div>  
            <br>
            <div class="roe" style="text-align: center;">
                <p class="breadcrumb">Pembayaran Via</p><br>                                
                <a href="<?php echo base_url();?>home/cara_pembelian"><img src="<?php echo base_url();?>res/image/payment1.jpg"></a>
            </div>  
        </div>
    </div>
</div>
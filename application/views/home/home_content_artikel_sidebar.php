<div class="span3">            
    <!-- start sidebar -->
    <ul class="breadcrumb">
        <li><strong>Kategori</strong></li>
    </ul>
    <div class="span3 product_list">
        <ul id="sample-menu-3" class="sf-menu sf-vertical sf-js-enabled sf-shadow">
            <?php
            foreach ($article_categories as $rows_article_categories) {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>home/artikel/kategori/<?php echo $rows_article_categories->article_category_id; ?>">
                        <?php echo $rows_article_categories->name; ?>
                    </a>
                </li>     
                <?php
            }
            ?>                                         
        </ul>
    </div>
    <div class="clear"></div>
    <ul class="breadcrumb">
        <li><strong>Artikel Terbaru</strong></li>
    </ul>
    <div class="span3 product_list">
        <ul id="sample-menu-3" class="sf-menu sf-vertical sf-js-enabled sf-shadow">
            <?php
            foreach ($article_terbaru as $rows_terbaru) {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>home/artikel/single/<?php echo $rows_terbaru->article_id; ?>">
                        <?php echo $rows_terbaru->title; ?>
                    </a>
                </li>     
                <?php
            }
            ?>                                                     
        </ul>
    </div>
    <div class="clear"></div>
    <ul class="breadcrumb">
        <li><strong>Komentar Terbaru</strong></li>
    </ul>
    <div class="span3 product_list">
        <ul id="sample-menu-3" class="sf-menu sf-vertical sf-js-enabled sf-shadow">
            <?php 
                foreach($comment_terbaru as $rows_comment_terbaru) {
            ?>
                    <li>
                        <a href="javascript:void(0)">
                            <?php
                                $text = word_limiter($rows_comment_terbaru->comment, 50);
                                echo $text;
                            ?>
                        </a>
                    </li>     
            <?php
                }
            ?>                                   
        </ul>
    </div>
</div> 
<div class="container">
    <div class="row">
        <?php echo $this->load->view('home/home_content_artikel_sidebar');?>       
        <div class="span9 popular_products">
            <h4 class="breadcrumb">List Artikel</h4><br>
            <div class="article">
                <?php
                foreach ($article_list as $rows_article) {
                    ?>                    
                    <article class="home-article">
                        <header><a href="<?php echo base_url(); ?>home/artikel/single/<?php echo $rows_article->article_id; ?>"><?php echo $rows_article->title; ?></a></header>
                        <div>
                            <?php $text = word_limiter($rows_article->content, 200); ?>
                            <?php echo $text; ?>
                            <a href="<?php echo base_url(); ?>home/artikel/single/<?php echo $rows_article->article_id; ?>">
                                Continue Reading..
                            </a>
                        </div>
                    </article> 
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>   
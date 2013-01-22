<div class="container">

    <div class="row">
        <?php $this->load->view('home/home_content_artikel_sidebar'); ?>        
        <div class="span9 popular_products">            
            <h4 class="breadcrumb"><?php echo $article_single->title; ?></h4><br>
            <div>
                <?php echo $article_single->content; ?>
            </div>
            <div class="clear"></div><br />
            <h4 class="breadcrumb">Kirim Komentar</h4><br>
            <div>
                <div class="span7 well no_margin_left">   
                    <?php 
                        if(isset($error)) {
                    ?>
                        <div class="alert alert-error">                        
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php
                        }
                    ?>
                    
                    <form action="<?php echo base_url();?>home/artikel/komentar" method="post">
                        <fieldset>
                            <div class="control-group">
                                <label for="name" class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your name" id="name" class="input-xlarge focused" name="name" value="<?php echo set_value('name');?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="email" class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your email" id="email" class="input-xlarge focused" name="email" value="<?php echo set_value('email');?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="komentar" class="control-label">Komentar</label>
                                <div class="controls">
                                    <textarea placeholder="Enter your komentar" id="komentar" class="input-xlarge span5" col="5" name="komentar" ><?php echo set_value('komentar');?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="captcha" class="control-label">Captcha for validation</label>
                                <div class="controls">
                                    <?php echo $cap_image;?>
                                    <div class="clearfix"></div>
                                    <input type="text" placeholder="Input the text you see in the image" id="captcha" class="input-large focused" name="captcha">
                                </div>
                            </div>
                                                        
                            <input type="hidden" name="article_id" value="<?php echo $article_single->article_id;?>">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
            <div class="article">
                <?php
                foreach ($comments as $rows_comment) {
                    ?>
                    <article class="comment">
                        <header><?php echo $rows_comment->name;?><span><?php echo $rows_comment->email;?></span></header>
                        <i>Berkomentar :</i>
                        <div>
                            <?php echo $rows_comment->comment; ?>
                        </div>
                    </article>

                    <?php
                }
                ?>           
            </div>
        </div>
    </div>
</div> 
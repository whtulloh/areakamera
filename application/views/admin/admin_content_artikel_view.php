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
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/artikel_insert">Artikel Insert</a> 
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/artikel_update/<?php echo $artikel->article_id;?>">Artikel Update</a> 
                </div>

            </div>

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Artikel</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">                          
                        <h2><?php echo $artikel->title; ?></h2>
                        <h4><?php echo $artikel->name; ?></h4>
                        <h4><?php echo $artikel->date; ?></h4>
                        <br>
                        <?php echo $artikel->content; ?>

                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <h4 class="breadcrumb">Komentar</h4>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal</th>   
                                    <th>Komentar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>   
                            <tbody>
                                <?php
                                foreach ($comments as $row) {
                                    $text = word_limiter($row->comment, 50);
                                    ?>
                                    <tr>                                                    
                                        <td class='center'><?php echo $row->name; ?></td>
                                        <td class="center"><?php echo $row->email; ?></td>  
                                        <td class='center'><?php echo $row->created_date; ?></td> 
                                        <td class='center'><?php echo $text; ?></td>  
                                                                                                                                                                                                                                         
                                        <td class="center">                                            
                                            <a class="btn btn-danger confirm-delete" href="<?php echo base_url(); ?>admin/artikel_comment_delete/<?php echo $row->comments_id; ?>/<?php echo $artikel->article_id;?>" onclick="return confirm('yakin?');">
                                                <i class="icon-trash icon-white"></i> 
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- content ends -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <hr>

</div><!--/.fluid-container-->        

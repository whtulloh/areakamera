<div class="container-fluid">
    <div class="row-fluid">

        <?php echo $this->load->view('admin/admin_content_sidebar');?>

        <noscript>
        <div class="alert alert-block span10">
            <h4 class="alert-heading">Warning!</h4>
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
        </noscript>

        <div id="content" class="span10">
            <!-- content starts -->						                        

            <div class="row-fluid">
                <?php
                if (isset($error)) {
                    if ($error == 'validation') {
                        ?>
                        <div class="alert alert-error">                            
                            <?php echo $this->upload->display_errors(); ?>
                        </div>
                        <?php
                    }else if ($error == 'ukuran') {
                        ?>
                        <div class="alert alert-error">                            
                            <strong>image harus berukuran 700x210</strong>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>           

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Header Logo</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">   
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/header_logo_upload" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label" for="fileInput">Pilih image untuk diupload</label>
                                <div class="controls">
                                    <input class="input-file uniform_on" id="fileInput" type="file" name="userfile">
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>                                                
                                </div>
                            </div>   
                        </form> 
                        
                        <div class="clearfix"></div>
                        
                        <h4>Logo Sekarang</h4>
                        <br>
                        <img src="<?php echo base_url();?>res/image/header/<?php echo $header_logo->content?>">
                    </div>
                </div>
            </div>


            <!-- content ends -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <hr>

</div><!--/.fluid-container-->

   
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
                                if ($error == 'pilihimage') {
                                    ?>
                                    <div class="alert alert-error">
                                        <?php echo "Kamu harus mengupload minimal satu image untuk mengupdate"; ?>                                        
                                    </div>
                                    <?php
                                } else if ($error == 'imageerror') {
                                    ?>
                                    <div class="alert alert-error">
                                        <?php echo $this->upload->display_errors(); ?>                                        
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                                               
                        <div class="row-fluid">
                            <div class="span12">
                                <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update_spec/<?php echo $item_id; ?>">Update Spec</a>                                 
                                <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update/<?php echo $item_id; ?>">Update Spesifikasi</a>                                 
                            </div>                                
                        </div>
                        
                        <div class="row-fluid">                            
                            <div class="box span12">
                                <div class="box-header well">
                                    <h2><i class="icon-info-sign"></i> Update Barang</h2>
                                    <div class="box-icon">                                        
                                        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                                    </div>
                                </div>
                                <div class="box-content">     
                                    <h4 class="muted">nb: Upload image baru untuk mengganti image yang lama. Image yang lama akan terhapus dan terganti dengan image yang diupload disini</h4>
                                    <br>
                                    <h4>Image Lama:</h4>
                                    <br>
                                    <?php
                                    $i = 1; //counter untuk memberi name di input image.
                                    foreach ($items_images as $rows_images) {
                                        ?>
                                        <img class="span2" src="<?php echo base_url(); ?>res/image/<?php echo $rows_images->picture_path; ?>">
                                        <?php
                                        $i++;
                                    }
                                    ?>                                      

                                    <div class="clearfix"></div>
                                    <br>
                                    <br>

                                    <h4>Upload image baru:</h4>
                                    <br>
                                    
                                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_update_image_olah/<?php echo $item_id; ?>" method="post" enctype="multipart/form-data">
                                        <fieldset>                                            
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Image 1</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" type="file" name="image1">
                                                </div>
                                            </div>                                                
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Image 2</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" type="file" name="image2">
                                                </div>
                                            </div>                                                
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Image 3</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" type="file" name="image3">
                                                </div>
                                            </div>                                        

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Submit</button>                                                
                                            </div>
                                        </fieldset>
                                    </form>
                                        
                                </div>
                            </div>
                        </div>

         
                        <!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>
		
	</div><!--/.fluid-container-->                
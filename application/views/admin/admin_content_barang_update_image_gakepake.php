
   
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
                            <div class="span12">
                                <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update_spec/<?php echo $item_id; ?>">Update Image</a>                                 
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
                                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_update_image_olah/<?php echo $item_id; ?>" method="post" enctype="multipart/form-data">
                                        <fieldset>                                            
                                            
                                        <?php
                                            $i = 1; //counter untuk memberi name di input image.
                                            foreach ($items_images as $rows_images) {
                                                ?>
                                                <div class="control-group">
                                                    <label class="control-label" for="file-input<?php echo $i; ?>">Image <?php echo $i;?></label>
                                                    <div class="controls">
                                                        <img class="span2" id="imgthumbnail<?php echo $i; ?>" src="<?php echo base_url(); ?>res/image/<?php echo $rows_images->picture_path; ?>">
                                                        <input class="input-file uniform_on" id="file-input<?php echo $i; ?>" type="file" name="image<?php echo $i;?>" value="<?php echo $rows_images->attachment_id; ?>">
                                                        <p id="imginfo<?php echo $i; ?>">&nbsp;&nbsp;pilih image untuk edit gambar</p>                                                                
                                                    </div>
                                                </div>    
                                                <?php
                                                $i++;
                                            }
                                            ?>   
                                            
                                            <?php
                                            //ini digunakan untuk menampilkan form image.. 
                                            //jika loop yang sebelumnya tidak sampai 3 gambar
                                            for ($j = $i; $j < 4; $j++) {
                                                ?>
                                                <div class="control-group">
                                                    <label class="control-label" for="file-input<?php echo $i; ?>">Image <?php echo $i;?></label>
                                                    <div class="controls">                                                        
                                                        <input class="input-file uniform_on" id="file-input<?php echo $i; ?>" type="file" name="image<?php echo $j;?>">                                                        
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                                    
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

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
                            <div class="box span12">
                                <div class="box-header well">
                                    <h2><i class="icon-info-sign"></i> Artikel Insert</h2>
                                    <div class="box-icon">                                        
                                        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                                    </div>
                                </div>
                                <div class="box-content">     
                                    <form class="form-horizontal" action="<?php echo base_url();?>admin/artikel_update_olah/<?php echo $artikel->article_id;?>" method="post">
                                        <fieldset>     
                                            <div class="control-group">
                                                <label class="control-label" for="selectError">Kategori</label>
                                                <div class="controls">
                                                    <select id="selectError" data-rel="chosen" name="idkategori">
                                                        <?php
                                                        foreach ($kategori as $row) {
                                                            if ($row->article_category_id == $artikel->article_category_id) {
                                                                ?>
                                                                <option selected="selected" value="<?php echo $row->article_category_id; ?>"><?php echo $row->name; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $row->article_category_id; ?>"><?php echo $row->name; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                                    
                                                            <?php
                                                        }
                                                        ?>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="date01">Judul</label>
                                                <div class="controls">
                                                    <input type="text" class="input-xlarge" name="judul" value="<?php echo $artikel->title;?>">
                                                </div>
                                            </div>      
                                            
                                            <div class="control-group">
                                                <label class="control-label" for="date01">Konten</label>
                                                <div class="controls">
                                                    <textarea name="konten">
                                                        <?php
                                                            echo $artikel->content;
                                                        ?>
                                                    </textarea>   
                                                </div>
                                            </div>
                                                        
                                            <script>
                                                CKEDITOR.replace( 'konten' );
                                            </script>   
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
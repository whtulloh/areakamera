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
                                    <h2><i class="icon-info-sign"></i> Update Barang</h2>
                                    <div class="box-icon">                                        
                                        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                                    </div>
                                </div>
                                <div class="box-content">     
                                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_update_primary_olah/<?php echo $items_single->item_id;?>" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <ul id="myTab" class="nav nav-tabs">
                                                <li class="active"><a href="#databarang" data-toggle="tab">Data Barang</a></li>
                                                <li><a href="#spesifikasi" data-toggle="tab">Spesifikasi</a></li>    
                                            </ul>
                                            
                                            <div id="myTabContent" class="tab-content">
                                                
                                                <!------------------------ 
                                                    DATA BARANG
                                                --------------------------->
                                                <div class="tab-pane fade in active" id="databarang">
                                                    <div class="control-group">
                                                        <label class="control-label" for="selectError">Nama Kategori</label>
                                                        <div class="controls">
                                                            <select id="selectError" data-rel="chosen" name="idkategori">
                                                                <?php
                                                                foreach ($kategori as $row) {
                                                                    if($row->category_id == $items_single->category_id) {
                                                                    ?>
                                                                        <option selected="selected" value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                                                    <?php
                                                                    }else {
                                                                        ?>                                                                    
                                                                        <option selected="selected" value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>                                                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="date01">Nama Barang</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" name="namabarang" value="<?php echo $items_single->name;?>">
                                                        </div>
                                                    </div>                                            
                                                    <div class="control-group">
                                                        <label class="control-label" for="date01">Diskon</label>
                                                        <div class="controls">
                                                            <input type="text" placeholder="ex: 20" class="input-small" name="diskon" value="<?php echo $items_single->discount_value;?>">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="date01">Garansi</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" name="garansi" value="<?php echo $items_single->guarantee_value;?>">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="date01">Harga</label>
                                                        <div class="controls">
                                                            <input type="text" placeholder="ex: 1500000" class="input" name="harga" value="<?php echo $items_single->price;?>">
                                                        </div>
                                                    </div>                       
                                                    <?php
                                                    $i = 1; //counter untuk memberi name di input image.
                                                    foreach ($items_images as $rows_images) {
                                                        ?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="file-input<?php echo $i;?>">Image 1</label>
                                                            <div class="controls">
                                                                <img class="span2" id="imgthumbnail<?php echo $i;?>" src="<?php echo base_url(); ?>res/image/<?php echo $rows_images->picture_path; ?>">
                                                                <input class="input-file uniform_on" id="file-input<?php echo $i;?>" type="file" name="image" value="<?php echo $rows_images->attachment_id;?>">
                                                                <p id="imginfo<?php echo $i;?>">&nbsp;&nbsp;pilih image untuk edit gambar</p>                                                                
                                                            </div>
                                                        </div>    
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>                                                                                                                                                                                                                                                

                                                    <div class="control-group">
                                                        <label class="control-label" for="date01">Deskripsi</label>
                                                        <div class="controls">
                                                            <textarea name="deskripsi">
                                                            <?php
                                                            if (isset($error)) {
                                                                echo set_value('deskripsi');     
                                                            } else {
                                                                echo $items_single->description;
                                                            }
                                                            ?>
                                                            </textarea>   
                                                        </div>
                                                    </div>
                                                
                                                    <script>
                                                        CKEDITOR.replace( 'deskripsi' );
                                                    </script>   
                                                </div>
                                                
                                                <!------------------------ 
                                                    SPESIFIKASI
                                                --------------------------->
                                                
                                                <div class="tab-pane fade" id="spesifikasi">  
                                                    <div class="span3" style="padding-bottom: 20px;">
                                                        <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/spesifikasi_insert">Tambah Spesifikasi</a>                                                     
                                                    </div>
                                                    <div class="clearfix"></div>
                                                        
                                                    <?php
                                                    
                                                    if ($items_spec->num_rows() > 0) {
                                                        $row2 = $items_spec->row();
                                                        foreach ($general_spec as $rows_spec) {
                                                            if ($rows_spec->spec_id == $row2->general_spec_id) {
                                                                ?>                                                        
                                                                <div class="control-group">
                                                                    <label class="control-label" for="date01"><?php echo $row2->name; ?></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="input-xlarge" name="<?php echo $row2->name; ?>" value="<?php echo $row2->value; ?>">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $row2 = $items_spec->next_row();
                                                            } else {
                                                                ?>                                                        
                                                                <div class="control-group">
                                                                    <label class="control-label" for="date01"><?php echo $rows_spec->name; ?></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="input-xlarge" name="<?php echo $rows_spec->name; ?>">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        foreach ($general_spec as $rows_spec) {
                                                            ?>
                                                            <div class="control-group">
                                                                <label class="control-label" for="date01"><?php echo $rows_spec->name; ?></label>
                                                                <div class="controls">
                                                                    <input type="text" class="input-xlarge" name="<?php echo $rows_spec->name; ?>">
                                                                </div>
                                                            </div>        
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                            
                                                            
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
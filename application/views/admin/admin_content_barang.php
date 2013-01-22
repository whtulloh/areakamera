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
                                <a class="btn btn-large btn-primary" href="<?php echo base_url();?>admin/barang_insert">Insert Barang</a> 
                            </div>

                        </div>
                        
                        <div class="row-fluid">                            
                            <div class="box span12">
                                <div class="box-header well">
                                    <h2><i class="icon-info-sign"></i> List Barang</h2>
                                    <div class="box-icon">                                        
                                        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                                    </div>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Kategori</th>
                                                <th>Nama</th>                                                     
                                                <th>Diskon</th>
                                                <th>Garansi</th>
                                                <th>Harga</th>   
                                                <th>Harga Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            <?php
                                            foreach ($barang as $row) {
                                                //$text = word_limiter($row->description, 50);
                                                ?>
                                                <tr>
                                                    <td class='center'>image</td>
                                                    <td class='center'><?php echo $row->cat_name; ?></td>
                                                    <td class='center'><?php echo $row->item_name; ?></td>                                                                                                        
                                                    <td class='center'><?php echo $row->discount_value; ?>%</td>
                                                    <td class='center'><?php echo $row->guarantee_value; ?></td>
                                                    <td class='center'><?php echo "Rp".number_format($row->price,0,"",".");?></td>
                                                    <td class='center'><?php echo "Rp".number_format($row->total_price,0,"",".");?></td>                                                                                                        
                                                    <td class="center">
                                                        <a class="btn btn-success" href="<?php echo base_url();?>admin/barang_view/<?php echo $row->item_id;?>">
                                                            <i class="icon-zoom-in icon-white"></i>  
                                                            Detail                                          
                                                        </a>
                                                        <a class="btn btn-info" href="<?php echo base_url();?>admin/barang_update/<?php echo $row->item_id;?>">
                                                            <i class="icon-edit icon-white"></i>  
                                                            Edit                                            
                                                        </a>
                                                        <a class="btn btn-danger confirm-delete" href="<?php echo base_url();?>admin/barang_delete/<?php echo $row->item_id;?>" onclick="return confirm('yakin?');">
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
                                        <div class="clearfix"></div>                                
                                </div>
                            </div>
                        </div>
 
                        <!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>
		
	</div><!--/.fluid-container-->        
 
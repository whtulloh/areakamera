
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
                                    <h2><i class="icon-info-sign"></i> Profile </h2>
                                    <div class="box-icon">                                        
                                        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                                    </div>
                                </div>
                                <div class="box-content">     
                                    
                                                                                                                                                                                                 
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Isi</th>                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            <?php 
                                                foreach($profile as $rows) {
                                            ?>                                                                                                
                                                <tr>                                                    
                                                    <td class='center'><?php echo $rows->name;?></td>
                                                    <td class='center'><?php echo $rows->content; ?></td>                                                                                                                                                                                                       
                                                    <td class="center"> 
                                                        <a class="btn btn-success confirm-delete" href="<?php echo base_url();?>admin/profile_update/<?php echo $rows->profile_id;?>">
                                                            <i class="icon-trash icon-white"></i> 
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger confirm-delete" href="<?php echo base_url();?>admin/profile_delete/<?php echo $rows->profile_id;?>" onclick="return confirm('yakin?');">
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
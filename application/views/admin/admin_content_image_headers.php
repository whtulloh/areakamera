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
                            <strong>image harus berukuran kurang dari 3000x3000</strong>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>           

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Carousel</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">   
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/image_header_upload" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label" for="fileInput">Pilih image untuk diupload</label>
                                <div class="controls">
                                    <input class="input-file uniform_on" id="fileInput" type="file" name="userfile"><span class="help-inline">Gunakan image dengan ukuran 700x210</span>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>                                                
                                </div>
                            </div>   
                        </form>                        
                        <div id="mycarousel" class="carousel slide" style="padding-bottom: 50px;">
                            <div class="carousel-inner">
                                <?php
                                $i = 0; //i digunakan untuk mengecek image pertama yg muncul.
                                        //carousel butuh class active untuk menampilkan image pertama kali
                                        //jika i == 0 maka class = active
                                foreach ($image_header_show as $rows) {
                                    if($i == 0) {
                                        $i++;
                                    ?>
                                    <div class="item active">
                                        <img src="<?php echo base_url() . "res/image/carousel/".$rows->picture_path; ?>" style="margin: 0 auto;">                                        
                                    </div>
                                    <?php                                    
                                    }else {
                                    ?>
                                    <div class="item">
                                        <img src="<?php echo base_url() . "res/image/carousel/".$rows->picture_path; ?>" style="margin: 0 auto;">                                         
                                    </div>
                                    <?php
                                    }
                                }
                                ?>                                                                
                            </div>
                            
                            <a class="carousel-control left" href="#mycarousel" data-slide="prev"></a>
                            <a class="carousel-control right" href="#mycarousel" data-slide="next"></a>
                        </div>                           
                        
                        
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th style="width: 200px;">Image</th>
                                    <th>Nama Image</th>
                                    <th>Item Link</th>
                                    <th>Show</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>   
                            <tbody>
                                <?php
                                foreach ($image_header as $row) {
                                    ?>
                                    <tr>
                                        <td class="center"><img style="width: 200px;" src="<?php echo base_url()?>res/image/carousel/<?php echo $row->picture_path;?>"></td>
                                        <td class='center'><?php echo $row->picture_path; ?></td>
                                        <td class="center"><?php echo $row->item_link; ?></td>
                                        <td class='center'><?php echo $row->status; ?></td>
                                            
                                        <td class="center">                                            
                                            <?php
                                            if ($row->status == 1) {
                                                ?>
                                                <a class="btn btn-info" href="<?php echo base_url(); ?>admin/image_header_update_show/<?php echo $row->image_header_id; ?>/0">
                                                    <i class="icon-edit icon-white"></i>  
                                                    Not Show                                         
                                                </a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-info" href="<?php echo base_url(); ?>admin/image_header_update_show/<?php echo $row->image_header_id; ?>/1">
                                                    <i class="icon-edit icon-white"></i>  
                                                    Show                                         
                                                </a>
                                                                
                                                <?php
                                            }
                                            ?>
                                                
                                            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/image_header_update_item_link/<?php echo $row->image_header_id; ?>/1">
                                                <i class="icon-edit icon-white"></i>  
                                                Link                                        
                                            </a>
                                            
                                            <a class="btn btn-danger confirm-delete" href="<?php echo base_url(); ?>admin/image_header_delete/<?php echo $row->image_header_id; ?>" onclick="return confirm('yakin?');">
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
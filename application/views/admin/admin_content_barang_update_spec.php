

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
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update_image/<?php echo $item_id; ?>">Update Image</a>                                 
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/barang_update/<?php echo $item_id; ?>">Update Data Barang</a>                                 
                </div>                                
            </div>

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Update Barang Spesifikasi</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">     
                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_update_spec_olah/<?php echo $item_id; ?>" method="post">
                            <fieldset>                                                                                                            
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
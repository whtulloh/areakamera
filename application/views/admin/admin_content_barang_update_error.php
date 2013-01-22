

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
                <?php
                if (isset($error)) {
                    if ($error == 'validation') {
                        ?>
                        <div class="alert alert-error">
                            <?php echo validation_errors(); ?>                                        
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            
            <div class="row-fluid">
                <div class="span12">
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/update_barang_image/<?php echo $item_id;?>">Update Image</a>                                 
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/update_barang_spec/<?php echo $item_id;?>">Update Spesifikasi</a>                                 
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
                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_update_olah/<?php echo $item_id; ?>" method="post" enctype="multipart/form-data">
                            <fieldset>                                            
                                <!------------------------ 
                                    DATA BARANG
                                --------------------------->
                                <div class="tab-pane fade in active" id="databarang">
                                    <div class="control-group">
                                        <label class="control-label" for="selectError">Nama Kategori</label>
                                        <div class="controls">
                                            <select id="selectError" class="kategoriparent" name="idkategoriparent">
                                                <?php
                                                foreach ($kategori_parent as $row) {
                                                    if ($row->category_id == $parent_id) {
                                                        ?>
                                                        <option selected="selected" value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    } else {
                                                        ?>                                                                    
                                                        <option value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>                                                        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="selectError">Kategori Child</label>
                                        <div class="controls">
                                            <select id="selectError" class="kategorichild" name="idkategorichild">
                                                <?php 
                                                foreach($kategori as $row2) {
                                                    if($row2->category_id == $items_single->category_id) {
                                                        ?>
                                                        <option selected="selected" value="<?php echo $row2->category_id; ?>"><?php echo $row2->name; ?></option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option value="<?php echo $row2->category_id; ?>"><?php echo $row2->name; ?></option>
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
                                            <input type="text" class="input-xlarge" name="namabarang" value="<?php echo set_value('namabarang'); ?>">
                                        </div>
                                    </div>                                            
                                    <div class="control-group">
                                        <label class="control-label" for="date01">Diskon</label>
                                        <div class="controls">
                                            <input type="text" placeholder="ex: 20" class="input-small" name="diskon" value="<?php echo set_value('diskon'); ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="date01">Garansi</label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge" name="garansi" value="<?php echo set_value('garansi'); ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="date01">Harga</label>
                                        <div class="controls">
                                            <input type="text" placeholder="ex: 1500000" class="input" name="harga" value="<?php echo set_value('harga'); ?>">
                                        </div>
                                    </div>                                                                                                                                                                                                                                                                                                                

                                    <div class="control-group">
                                        <label class="control-label" for="date01">Deskripsi</label>
                                        <div class="controls">
                                            <textarea name="deskripsi">
                                                <?php
                                                echo set_value('deskripsi');
                                                ?>
                                            </textarea>   
                                        </div>
                                    </div>

                                    <script>
                                        CKEDITOR.replace( 'deskripsi' );
                                    </script>   
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
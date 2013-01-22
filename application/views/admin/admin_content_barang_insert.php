

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
                    } else if ($error == 'pilihimage') {
                        ?>
                        <div class="alert alert-error">
                            <?php echo "Kamu harus mengupload minimal satu image"; ?>                                        
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
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Insert Barang</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">     
                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/barang_insert_olah" method="post" enctype="multipart/form-data">
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
                                            <label class="control-label" for="selectError">Kategori Parent</label>
                                            <div class="controls">
                                                <select id="selectError" class="kategoriparent" name="idkategoriparent">
                                                    <option selected="selected" value="">Pilih Kategori Parent</option>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($kategori_parent as $row) {
                                                        ?>                          
                                                        <option value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>                                                        
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="selectError">Kategori Child</label>
                                            <div class="controls">
                                                <select id="selectError" class="kategorichild" name="idkategorichild">
                                                    <option selected="selected"></option>                                                  
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
                                                <span class="help-inline">%</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="date01">Garansi</label>
                                            <div class="controls">
                                                <input type="text" placeholder="ex: Lifetime Warranty" class="input-xlarge" name="garansi" value="<?php echo set_value('garansi'); ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="date01">Harga</label>
                                            <div class="controls">
                                                <input type="text" placeholder="ex: 1500000" class="input" name="harga" value="<?php echo set_value('harga'); ?>">
                                            </div>
                                        </div>                                            
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

                                        <div class="control-group">
                                            <label class="control-label" for="date01">Deskripsi</label>
                                            <div class="controls">
                                                <textarea name="deskripsi">
                                                    <?php
                                                    if (isset($error)) {
                                                        echo set_value('deskripsi');
                                                    } else {
                                                        echo "bisa copas langsung saja semua isi deskripsi yang di mitrakamera disini";
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
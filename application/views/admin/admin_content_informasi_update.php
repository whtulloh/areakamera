
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
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Informasi Update</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">     
                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/informasi_update_olah" method="post">
                            <fieldset>                                        
                                <?php
                                foreach ($site as $rows) {
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label" for="date01"><?php echo $rows->name; ?></label>
                                        <div class="controls">
                                            <textarea name="<?php echo $rows->name; ?>">
                                                <?php
                                                if (isset($error)) {
                                                    echo set_value('deskripsi');
                                                } else {
                                                    echo $rows->content;
                                                }
                                                ?>
                                            </textarea>   
                                        </div>
                                    </div>

                                    <script>
                                        CKEDITOR.replace( '<?php echo $rows->name; ?>' );
                                    </script>   
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
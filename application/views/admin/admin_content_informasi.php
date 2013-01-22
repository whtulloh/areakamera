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
                    <a class="btn btn-large btn-primary" href="<?php echo base_url(); ?>admin/informasi_update">Informasi Update</a> 
                </div>

            </div>

            <div class="row-fluid">                            
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class="icon-info-sign"></i> Informasi</h2>
                        <div class="box-icon">                                        
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>                                        
                        </div>
                    </div>
                    <div class="box-content">

                        <ul id="myTab" class="nav nav-tabs">
                            <li><a href="#tentang" data-toggle="tab">Tentang Kami</a></li>
                            <li><a href="#cara" data-toggle="tab">Cara Pembelian</a></li>
                            <li><a href="#garansi" data-toggle="tab">Garansi</a></li>                            
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <?php
                            foreach ($site as $rows) {
                                if ($rows->site_id == 1) {
                                    ?>
                                    <div class="tab-pane fade" id="tentang">
                                        <p><?php echo $rows->content?></p>
                                    </div>
                                    <?php
                                }else if($rows->site_id == 2) {
                                    ?>
                                    <div class="tab-pane fade" id="cara">
                                        <p><?php echo $rows->content?></p>
                                    </div>
                                    <?php
                                }else if($rows->site_id == 3) {
                                    ?>
                                    <div class="tab-pane fade" id="garansi">
                                        <p><?php echo $rows->content?></p>
                                    </div>
                                    <?php
                                }
                            }
                            ?>                            
                        </div>
                    </div>
                </div>
            </div>        

            <!-- content ends -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <hr>

</div><!--/.fluid-container-->        

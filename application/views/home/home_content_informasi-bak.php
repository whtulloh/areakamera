<div class="container">  
    <div class="row">
        <?php $this->load->view('home/home_content_sidebar'); ?>
        <div class="span9">
            <div class="page-header">
                <h1>Informasi</h1>
            </div>
            <!-- Headings & Paragraph Copy -->
            <div class="row">
                <div class="span9">
                    <blockquote class="pull-right">
                        <p>Aku ingin mencintaimu dengan sederhana. Seperti isyarat yang tak pernah disampaikan awan kepada hujan. Yang menjadikannya tiada.</p>
                        <small>Sapardi</small>
                    </blockquote>
                </div>
                <div class="span9">
                    <h3 class="breadcrumb">Tentang Kami</h3>
                    <p>
                        <?php echo $profile['tentang'];?>
                    </p>
                </div>
                <div class="span9">
                    <h3 class="breadcrumb">Cara Pembelian</h3>
                    <p>
                        <?php echo $profile['cara'];?>
                    </p>
                </div>

                <div class="span9">
                    <h3 class="breadcrumb">Penjelasan Garansi</h3>
                    <p>
                        <?php echo $profile['garansi'];?>
                    </p>                    
                </div>
                
                <!-- Misc Elements -->
            </div>
        </div>
    </div>
</div>
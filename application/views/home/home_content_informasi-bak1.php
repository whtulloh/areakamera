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
                    <h3 class="breadcrumb">Tentang Kami</h3>
                    <p>
                        <?php echo $profile['tentang'];?>
                    </p>
                </div>                
                <!-- Misc Elements -->
            </div>
        </div>
    </div>
</div>
<div class="container">  
    <div class="row">
        <?php $this->load->view('home/home_content_sidebar'); ?>
        <div class="span9">
            <div class="page-header">
                <h1>Penjelasan Garansi</h1>
            </div>
            <!-- Headings & Paragraph Copy -->
            <div class="row">                
                <div class="span9">                    
                    <p>
                        <?php echo $profile['garansi'];?>
                    </p>
                </div>                
                <!-- Misc Elements -->
            </div>
        </div>
    </div>
</div>
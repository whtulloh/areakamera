<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>        
        <?php $this->load->view('home/home_head'); ?>
    </head>
    
    <body>
        <?php $this->load->view('home/home_header'); ?>
        <?php $this->load->view('home/home_navbar'); ?>
        
        <?php $this->load->view($content); ?>
        
        <?php $this->load->view('home/home_footer');?>
        <?php $this->load->view('home/home_js'); ?>
    </body>
</html>
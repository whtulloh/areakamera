<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/admin_head'); ?>
    </head>

    <body>
        <!-- topbar starts -->
        <?php $this->load->view('admin/admin_navigation');?>
        <!-- topbar ends -->
        <?php $this->load->view($content);?>

        <?php $this->load->view('admin/admin_js'); ?>

    </body>
</html>

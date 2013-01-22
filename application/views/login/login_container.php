<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/admin_head');?>
    </head>

<body>
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="row-fluid">
                <div class="span12 center login-header">
                    <h2>Welcome</h2>
                </div><!--/span-->
            </div><!--/row-->

            <div class="row-fluid">
                <div class="well span5 center login-box">
                    <div class="alert alert-info">
                        Please login with your Username and Password.
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>login/login_check" method="post">
                        <fieldset>
                            <div class="input-prepend" title="Username" data-rel="tooltip">
                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="admin" />
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password" data-rel="tooltip">
                                <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="admin123456" />
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="clearfix"></div>

                            <p class="center span5">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </p>
                        </fieldset>
                    </form>
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/fluid-row-->

    </div><!--/.fluid-container-->

    <?php $this->load->view('admin/admin_js');?>


</body>
</html>

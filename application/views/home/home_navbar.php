<div class="navbar">
    <div class="navbar-inner">
        <div class="container">            
            <div class="nav-collapse">
                <ul class="nav">                    
                    <li><a href="<?php echo base_url();?>home"><i class="icon-home icon-large"></i> HOME</a></li>
                    <li><a href="<?php echo base_url();?>home/informasi"><i class="icon-heart icon-large"></i> INFORMASI</a></li>
                    <li><a href="<?php echo base_url();?>home/produk"><i class="icon-shopping-cart icon-large"></i> PRODUK</a></li>
                    <li><a href="<?php echo base_url();?>home/artikel/list"><i class="icon-book icon-large"></i> ARTIKEL</a></li>             
                </ul>

                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <form class="navbar-search" action="<?php echo base_url();?>home/search_temp" method="post">
                        <input type="text" class="search-query span2" placeholder="Search" name="search">
                        <button class="btn btn-primary btn-small search_btn" type="submit">Go</button>
                    </form>
                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div>
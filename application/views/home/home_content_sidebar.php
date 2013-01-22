<div class="span3">            
    <!-- start sidebar -->
    <ul class="breadcrumb">
        <li>Produk</li>
    </ul>
    
    <div class="span3 product_list">
        <ul id="sample-menu-3" class="sf-menu sf-vertical sf-js-enabled sf-shadow">
            <?php
            foreach ($categories as $rows) {

                if ($rows->parent_id == 0) {
                    echo "<li> ";
                    echo "  <a href='#' class=\"active\">" . $rows->name . "</a>";
                    echo "  <ul>";
                    foreach ($categories as $rows2) {
                        if ($rows2->parent_id == $rows->category_id) {
                            echo "<li><a href=\"". base_url()."home/produk/kategori/".$rows2->category_id."\">" . $rows2->name . "</a></li>";
                        }
                    }
                    echo "  </ul>";
                    echo "</li>";
                }
            }
            ?>                        
        </ul>
    </div><!-- end sidebar -->		
</div>
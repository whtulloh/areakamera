<?php
class Items_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
        
    /*
     * FUNCTION UNTUK HOME
     */
    //disitu digunakan distinct dan group by item_attachments.item_id..
    //gunanya untuk mengambil satu saja items yang punya beberapa image.
    function items_get_popular() {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id and popular = 1 
            group by item_attachments.item_id");
        return $query->result();
    }   
    
    //newest items diambil dari item_id descending.
    //soalnya setiap masukin item baru, item_id akan terus terincrement
    //otomatis item_id yang paling besar adalah yang terakhir diinputkan atau sama dengan yg terbaru
    function items_get_newest() {        
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id 
            group by item_attachments.item_id order by items.item_id desc limit 9");
        return $query->result();
    }
    
    /*
     * FUNCTION UNTUK SINGLE VIEW ITEM
     */
    //function ini sekalian ngambil image dari item_attachments
    //gunanya ngambil image buat nampilin gambar gede di single view item nya.
          
    function items_get_single($item_id) {
        $query = $this->db->query("select distinct * from items, item_attachments 
            where items.item_id = item_attachments.item_id 
            and items.item_id = " . $item_id . " group by item_attachments.item_id");
        return $query->row();
    }  
    
    //digunakan di admin/barang_update
    function items_get_single_for_admin($item_id) {
        $query = $this->db->query("select distinct *, 
            (select name from categories as c2 where c2.category_id = c1.parent_id) as parent_name,
            items.name as item_name 
            from items, item_attachments, categories as c1 
            where items.item_id = item_attachments.item_id 
            and c1.category_id = items.category_id 
            and items.item_id = ". $item_id . " 
            group by item_attachments.item_id");
        return $query->row();
    }  
    
    function items_get_images($item_id) {
        $query = $this->db->query("select * from item_attachments 
            where item_id = " . $item_id);
        return $query->result();
    }
    
    function items_get_general_specs($item_id) {
        $query = $this->db->query("select * from items, items_has_specifications, general_specifications 
            where items.item_id = items_has_specifications.item_id 
            and items_has_specifications.spec_id = general_specifications.spec_id 
            and general_specifications.general_spec = 1 
            and items.item_id = " . $item_id);
        return $query->result();
    }
        
    
    function items_get_items_related($item_id) {
        $result_single = $this->items_get_single($item_id);        
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id and category_id = ". $result_single->category_id . " 
            group by item_attachments.item_id 
            order by items.item_id desc 
            limit 4");
        return $query->result();
    }
    
    /*
     * FUNCTION UNTUK VIEW ITEM BY CATEGORY
     */
    
    //untuk breadcrumb
    function items_get_category_name($item_id) {
        $this->load->model('categories_model');
        $result = $this->items_get_single($item_id);        
        return $this->categories_model->categories_get_single($result->category_id);
    }
    
    //untuk breadcrumb juga
    function items_get_by_category($category_id) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id and popular = 1 
            and items            
            group by item_attachments.item_id");
    }
    
    //untuk pagination
    function items_get_total_by_category($category_id) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id  
            and items.category_id = " . $category_id .            
            " group by item_attachments.item_id");        
        return $query->num_rows();
    }
    
    function items_get_by_category_limit($category_id, $limit, $start) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id  
            and items.category_id = " . $category_id .            
            " group by item_attachments.item_id limit ".$start.",".$limit);                
        
        //echo $sql;
        
        if($query->num_rows() > 0) {
            //echo $query->num_rows();
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
            
        }
        //echo "hehe";
        return false;
    }
    
    /*
     * FUNCTION UNTUK VIEW PRODUK ALL (NAVBAR MENU)
     */
    
        //untuk pagination
    function items_get_total() {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id              
            group by item_attachments.item_id
            order by items.item_id desc");        
        return $query->num_rows();
    }
    
    function items_get_limit($limit, $start) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id            
            group by item_attachments.item_id 
            order by items.item_id desc 
            limit ".$start.",".$limit);                
        
        //echo $sql;
        //echo $query->num_rows()."oy";
        if($query->num_rows() > 0) {
            //echo $query->num_rows();
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
            
        }
        //echo "hehe";
        return false;
    }    
    
    /*
     * FUNCTION UNTUK SEARCH
     */
    
    //untuk pagination    
    function items_get_search_total($search) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id 
            and items.name like '%" . $search . "%' 
            group by item_attachments.item_id");
        return $query->num_rows();
    }
    
    //untuk pagination
    function items_get_search_limit($search, $limit, $start) {
        $query = $this->db->query("select distinct * from item_attachments, items 
            where items.item_id = item_attachments.item_id 
            and items.name like '%" . $search . "%' 
            group by item_attachments.item_id limit ".$start.",".$limit);
        
        if($query->num_rows() > 0) {
            //echo $query->num_rows();
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
            
        }
        //echo "hehe";
        return false;
    }
    
    /*
     *  FUNCTION UNTUK ADMIN
     */
    
    //untuk view all barang di menu barang pertama kali
    function items_get_all() {
        $query = $this->db->query("select distinct *, categories.name as cat_name, items.name as item_name from item_attachments, items, categories  
            where items.item_id = item_attachments.item_id 
            and items.category_id = categories.category_id 
            group by item_attachments.item_id 
            order by items.item_id desc");
        return $query->result();
    }          
    
    function items_insert($idcategory, $name, $description, $discount, $guarantee, $price) {        
        if($discount != null || $discount != 0) {
            $percent_value = ($discount / 100) * $price;
            $total_price = $price - $percent_value;
            echo "masuk diskon";
        }else {
            $total_price = $price;
            echo "tidak masuk diskon";
        }
        
        echo $total_price;
        
        $data = array(
            'name' => $name,
            'description' => $description,
            'discount_value' => $discount,
            'guarantee_value' => $guarantee,
            'price' => $price,
            'total_price' => $total_price,
            'category_id' => $idcategory            
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('items', $data);
        
        return $this->db->insert_id();
    }
    
    function items_update($item_id, $idcategory, $name, $description, $discount, $guarantee, $price) {        
        if($discount != null || $discount != 0) {
            $percent_value = ($discount / 100) * $price;
            $total_price = $price - $percent_value;
            //echo "masuk diskon";
        }else {
            $total_price = $price;
            //echo "tidak masuk diskon";
        }
        
        //echo $total_price;
        
        $data = array(
            'name' => $name,
            'description' => $description,
            'discount_value' => $discount,
            'guarantee_value' => $guarantee,
            'price' => $price,
            'total_price' => $total_price,
            'category_id' => $idcategory            
        );
                
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('item_id', $item_id);
        $this->db->update('items', $data);                
    }
    
    //untuk barang_view
    function items_get_with_general_spec($item_id) {
        $query = $this->db->query("select * from items_has_specifications, items, general_specifications where 
            items.item_id = items_has_specifications.item_id and 
            items_has_specifications.spec_id = general_specifications.spec_id and 
            items.item_id = ". $item_id);
        
        return $query->result();
    }
    
    //ini untuk barang update
    function items_get_with_general_spec_2($item_id) {
        $query = $this->db->query("select *, general_specifications.spec_id as general_spec_id, general_specifications.name as general_spec_name from items_has_specifications, items, general_specifications where 
            items.item_id = items_has_specifications.item_id and 
            items_has_specifications.spec_id = general_specifications.spec_id and 
            items.item_id = ". $item_id);
        
        return $query;
        
    }
    
    function items_delete($item_id) {
        $this->db->delete('items', array('item_id' => $item_id));
    }
    
//    function items_insert_general_specs($item_id, $params=array()) {
//        print_r($params);
//    }
}
?>

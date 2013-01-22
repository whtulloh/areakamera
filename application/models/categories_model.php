<?php

class Categories_model extends CI_Model {
    function __construct() {
        parent::__construct();        
    }
    
    //untuk sidebar dan tabel kategori admin
    function categories_get_all() {
        $query = $this->db->get('categories');
        return $query->result();       
    }        
    
    //untuk 
    function categories_get_single($category_id) {    
        //echo "yang single";
        $query = $this->db->query("select * from categories where category_id = " . $category_id);   
        if ($query->num_rows() > 0) {
            return $query->row();
        }        
    }
    
    function categories_get_children($parent_id) {
        $query = $this->db->query("select * from categories where parent_id = ". $parent_id);
        //echo $query->num_rows();
        return $query->result();
    }
    
    function categories_get_parent($category_id) {        
        //echo "yang parent";
        $query = $this->db->query("select * from categories where category_id = " . $category_id);
        if($query->num_rows() > 0) {
            $row = $query->row();        
            //echo $row->parent_id;
            return $this->categories_get_single($row->parent_id);     
        }else {
            return 0;
        }        
    }
        
    //digunakan ketika admin insert kategori child 
    function categories_get_all_parent() {
        $query = $this->db->query("select * from categories where parent_id = 0");
        return $query->result();
    }
    
    function categories_insert_parent($name) {
        $data = array(
            'name' => $name,
            'parent_id' => 0,            
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('categories', $data);
    }
    
    function categories_insert_child($name, $parent_id) {
        $data = array(
            'name' => $name,
            'parent_id' => $parent_id
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('categories', $data);
    }
    
    function categories_update_parent($category_id, $name) {
        $data = array(
            'name' => $name,           
        );
                
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
    }
    
    function categories_update_child($category_id, $name, $parent_id) {
        $data = array(
            'name' => $name,           
            'parent_id' => $parent_id
        );
                
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
    }
    
    function categories_delete($category_id) {
        $single = $this->categories_get_single($category_id);
        $all = $this->categories_get_all();
        
        if($single->parent_id == 0) {
            foreach($all as $row) {
                if($row->parent_id == $single->category_id) {
                    $this->db->delete('categories', array('category_id' => $row->category_id));
                }
            }
            
            $this->db->delete('categories', array('category_id' => $category_id));                        
        }else {
            $this->db->delete('categories', array('category_id' => $category_id));
        }
        
    }
    
    //digunakan ketika insert barang
    //mengambil kategori yang parent_id nya != 0
    function categories_get_not_parent() {
        $query = $this->db->query("select * from categories where parent_id <> 0");
        return $query->result();
    }
    
    
        
}

?>

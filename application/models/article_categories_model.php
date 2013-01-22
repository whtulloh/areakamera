<?php

class Article_categories_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function article_categories_get() {
        $query = $this->db->get('article_categories');
        return $query->result();
    }
    
    function article_categories_get_single($article_category_id) {
        $query = $this->db->query('select * from article_categories where article_category_id = '. $article_category_id);
        return $query->row();
    }
    
    function article_categories_insert($namakategori) {
        $data = array(
            'name' => $namakategori
        );
        
        $this->db->insert('article_categories', $data);
    }
    
    function article_categories_update($article_category_id, $name) {
        $data = array(            
            'name' => $name
        );
        
        $this->db->where('article_category_id', $article_category_id);
        $this->db->update('article_categories', $data);
    }
    
    function article_categories_delete($article_category_id) {
        $this->db->delete('article_categories', array('article_category_id' => $article_category_id));
    }
}

?>

<?php
class Articles_model extends CI_Model {
    function __construct() {
        parent::__construct();        
        //$this->load->helper('text');
    }
    
    //get untuk di home
    function articles_get() {
        $query = $this->db->query("select * from articles order by article_id desc limit 3");        
        return $query->result();
    }
    
    //get di article list
    function articles_get_list() {
        $query = $this->db->query("select * from articles order by article_id desc");        
        return $query->result();
    }
    
    //untuk artikel sidebar
    function articles_get_newest() {
        $query = $this->db->query("select * from articles order by article_id desc limit 5");   
        return $query->result();
    }
    
    function articles_get_single($article_id) {
        
        $query = $this->db->query("select *, articles.created_date as date from articles, article_categories where 
            articles.article_category_id = article_categories.article_category_id and
            article_id = ". $article_id);
        return $query->row();
    }
    
    function articles_get_by_category($article_category_id) {
        $query = $this->db->query("select * from articles 
            where article_category_id = ". $article_category_id . " 
            order by article_id desc");        
        return $query->result();
    }
    
    //untuk list artikel di admin
    function articles_get_list_with_category() {
        $query = $this->db->query("select *, articles.created_date as date from articles, article_categories where 
            articles.article_category_id = article_categories.article_category_id 
            order by articles.article_id desc");        
        return $query->result();
    }
    
    function articles_insert($title, $content, $category_id) {
        $data = array(
            'title' => $title,
            'content' => $content,
            'article_category_id' => $category_id
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('articles', $data);
    }
    
    function articles_update($article_id, $title, $content, $category_id) {
        $data = array(
            'title' => $title,
            'content' => $content,
            'article_category_id' => $category_id
        );
        
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('article_id', $article_id);
        $this->db->update('articles', $data);
    }
    
    function articles_delete($artikel_id) {
        $this->db->delete('articles', array('article_id' => $artikel_id));
    }
    
    
//    function articles_truncate($word_ke_berapa, $text) {        
//        $text = word_limiter($text, $word_ke_berapa);
//        return $text;
//    } 
}
?>

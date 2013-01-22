<?php
class Comments_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function comments_get($article_id) {
        $query = $this->db->query("select * from comments where article_id = ".$article_id. " 
            order by comments_id desc");        
        return $query->result();
    }
    
    function comments_get_newest() {
        $query = $this->db->query("select * from comments order by comments_id desc limit 3");
        return $query->result();
    }
    
    function comments_insert($artikel_id, $name, $email, $komentar) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'comment' => $komentar,
            'article_id' => $artikel_id,            
        );                
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('comments', $data);
    }
    
    function comments_delete($comment_id) {
        $this->db->delete('comments', array('comments_id' => $comment_id));
    }
}
?>

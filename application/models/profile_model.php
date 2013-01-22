<?php
class Profile_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function profile_get() {
        $query = $this->db->get('profile');
        return $query->result();
    }
    
    
    
    function profile_insert($name, $content) {
        $data = array(
            'name' => $name,
            'content' => $content
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('profile', $data);
    } 
    
    function profile_get_single($profile_id) {
        $query = $this->db->query('select * from profile where profile_id = '.$profile_id);
        return $query->row();
    }
    
    function profile_update($profile_id, $name, $content) {
        $data = array(
            'name' => $name,
            'content' => $content
        );
                
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('profile_id', $profile_id);
        $this->db->update('profile', $data);
    }
    
    function profile_delete($profile_id) {
        $this->db->delete('profile', array('profile_id' => $profile_id));
    }
    function site_get() {
        $query = $this->db->get('site');
        return $query->result();
    }
    
    function site_get_single($name){
        $query = $this->db->query("select * from profile where name = '" . $name. "'");
        return $query->row();
    }
    
    function site_update($site_id, $content) {
        $data = array(
            'content' => $content
        );
        
        $this->db->set('updated_date', 'NOW()', FALSE);        
        $this->db->where('site_id', $site_id);
        $this->db->update('site', $data);
    }
    
    function site_get_header_logo() {
        $query = $this->db->query("select * from site where name = 'header_logo'");
        return $query->row();
    }
    
    function site_header_logo_update_content($imagename){
        $data = array(
            'content' => $imagename
        );
        
        $this->db->where('name', 'header_logo');
        $this->db->update('site', $data);
    }
}
?>

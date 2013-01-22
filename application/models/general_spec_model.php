<?php
class General_spec_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function general_spec_get() {
        $query = $this->db->get('general_specifications');
        return $query->result();
    }        
    
    function general_spec_get_num_rows() {
        $query = $this->db->get('general_specifications');
        return $query->num_rows();
    }
    
    function general_spec_check_edit($old, $new) {
        
    }
    
    function general_spec_insert($nama) {
        $data = array(
            'name' => $nama,
            'general_spec' => 1,
            'parent_id' => 0
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('general_specifications', $data);
    }
       
        
}
?>

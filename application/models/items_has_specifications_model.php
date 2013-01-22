<?php
class Items_has_specifications_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function items_has_specifications_insert($item_id, $spec_id, $value) {
        $data = array(
            'item_id' => $item_id,
            'spec_id' => $spec_id,
            'value' => $value
        );
        
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->insert('items_has_specifications', $data);
    }
    
    function items_has_specifications_update($specs_item_id, $value) {        
        $data = array(                        
            'value' => $value
        );
                
        $this->db->set('updated_date', 'NOW()', FALSE);
        $this->db->where('specs_item_id', $specs_item_id);
        $this->db->update('items_has_specifications', $data);
    }
    
    function items_has_specifications_check($item_id, $name, $value) {
        $query = $this->db->query("select * from items_has_specifications, general_specifications where 
            items_has_specifications.spec_id = general_specifications.spec_id 
            and items_has_specifications.item_id = " . $item_id );
        
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
    function items_has_specifications_get_num_rows($item_id) {
        $query = $this->db->query("select * from items_has_specifications, general_specifications where 
            items_has_specifications.spec_id = general_specifications.spec_id 
            and items_has_specifications.item_id = " . $item_id);
        
        return $query->num_rows();
    }
    
    function items_has_specifications_delete($item_id) {
        $this->db->delete('items_has_specifications', array('item_id' => $item_id));
    }
}
?>

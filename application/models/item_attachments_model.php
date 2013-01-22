<?php

class Item_attachments_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function item_attachments_insert($item_id, $image_data) {
        foreach($image_data as $rows) {
            $data = array(
                'item_id' => $item_id,
                'picture_path' => $rows[0],
                'picture_path_resize' => $rows[1]
            );
            
            $this->db->set('created_date', 'NOW()', FALSE);
            $this->db->set('updated_date', 'NOW()', FALSE);
            $this->db->insert('item_attachments', $data);         
        }
    }
    
    function item_attachments_update($item_attachment_id, $item_id, $image_data) {
        foreach($image_data as $rows) {
            $data = array(
                'item_id' => $item_id,
                'picture_path' => $rows[0],
                'picture_path_resize' => $rows[1]
            );
                        
            $this->db->set('updated_date', 'NOW()', FALSE);
            $this->db->where('attachment_id', $item_attachment_id);
            $this->db->update('item_attachments', $data);
        }
    }
    
    function item_attachments_delete($item_id) {
        $this->db->delete('item_attachments', array('item_id' => $item_id));
    }
    
    
}

?>

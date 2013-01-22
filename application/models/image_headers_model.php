<?php

class image_headers_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function image_headers_get_image() {
        $query = $this->db->query("select * from image_headers where status = 1");
        return $query->result();
    }

    function image_headers_get() {
        $query = $this->db->get('image_headers');
        return $query->result();
    }   

    function image_headers_insert($imagename) {
        $data = array(
            'picture_path' => $imagename,
            'status' => 1
        );

        $this->db->insert('image_headers', $data);
    }

    function image_headers_update_status($id_image, $show) {
        $data = array(
            'status' => $show
        );

        $this->db->where('image_header_id', $id_image);
        $this->db->update('image_headers', $data);
    }

    function image_headers_delete($id_image) {
        $this->db->delete('image_headers', array('image_header_id' => $id_image));
    }
    
    function image_headers_get_item_link($id_image) {
        $query = $this->db->query("select * from image_headers where image_header_id = ". $id_image);
        return $query->row();
    }
    
    function image_headers_set_item_link($id_image, $item_link) {
        $data = array(
            'item_link' => $item_link
        );
        
        $this->db->where('image_header_id', $id_image);
        $this->db->update('image_headers', $data);
    }


}

?>

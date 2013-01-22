<?php

class Carousel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function carousel_get() {
        $query = $this->db->get('image_headers');
        return $query;
    }

    function carousel_get_all() {
        $query = $this->db->query("select * from image_headers where image_headers.status = 1");
        return $query;
    }

    function insertImage($imagename) {
        $data = array(
            'picture_path' => $imagename,
            'status' => 1
        );

        $this->db->insert('image_headers', $data);
    }

    function carousel_update_status($id_image, $show) {
        $data = array(
            'status' => $show
        );

        $this->db->where('id_image', $id_image);
        $this->db->update('carousel', $data);
    }

    function deleteImage($id_image) {
        $this->db->delete('carousel', array('id_image' => $id_image));
    }

}

?>

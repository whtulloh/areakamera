<?php

class Upload_image_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function upload_image($form_name) {
        //pengecekan untuk image upload
        $this->load->library('upload');
        $config['upload_path'] = './res/image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '5000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        //sukses digukanan untuk mengecek image yang telah berhasil dimasukkan
        $sukses = 0;
        for ($i = 1; $i < 4; $i++) {
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image' . $i)) {
                if ($_FILES['image' . $i]['error'] == UPLOAD_ERR_NO_FILE) {
                    //disini tidak dilakukan apa-apa 
                    //lewat
                } else {    //disini untuk error yang selain no file
                    $data['error'] = 'imageerror';
                    $data['general_spec'] = $this->general_spec_model->general_spec_get();
                    $data['kategori'] = $this->categories_model->categories_get_not_parent();
                    $data['content'] = 'admin/admin_content_barang_insert';
                    $this->load->view('admin/admin_container', $data);
                    break;
                }
            } else {    //disini upload sukses. dibuat thumbnail                   
                $upload_data = $this->upload->data();
                $thumbnail = $upload_data['raw_name'] . '_thumb' . $upload_data['file_ext'];
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './res/image/' . $upload_data['file_name'];
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 150;
                $config2['height'] = 150;

                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();

                //$filename = $upload_data['file_name'];
                //$thumbname = $filename.'_thumb';
                $image_data[] = array($this->input->post('image' . $i), $upload_data['file_name'], $thumbnail);
                $sukses += 1;
            }
        }
    }

    function upload_thumbnail($file_raw_name, $file_ext) {
        $thumbnail = $file_raw_name . '_thumb' . $file_ext;
        $config2['image_library'] = 'gd2';
        $config2['source_image'] = './res/image/' . $upload_data['file_name'];
        $config2['create_thumb'] = TRUE;
        $config2['maintain_ratio'] = TRUE;
        $config2['width'] = 150;
        $config2['height'] = 150;

        $this->load->library('image_lib', $config2);
        $this->image_lib->resize();
    }

}

?>

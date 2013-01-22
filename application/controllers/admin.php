<?php
class Admin extends CI_Controller {
    private $the_user;
    
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");     
        
        if ($this->ion_auth->is_admin()) {
            //Put User in Class-wide variable
            $this->the_user = $this->ion_auth->user()->row();

            //Store user in $data
            $data->the_user = $this->the_user;

            //Load $the_user in all views
            $this->load->vars($data);
        }else {
            redirect('login');
        }
        
        $this->load->model('categories_model');
        $this->load->model('items_model');
        $this->load->model('general_spec_model');
        $this->load->model('items_has_specifications_model');
        $this->load->model('item_attachments_model');
        $this->load->model('articles_model');
        $this->load->model('article_categories_model');
        $this->load->model('comments_model');
        $this->load->model('image_headers_model');
        $this->load->model('profile_model');        
        $this->load->helper('array');
        $this->load->helper('text');
        
        
    }
    
    function index() {
//        $data['content'] = 'admin/admin_content_dashboard';
//        $this->load->view('admin/admin_container', $data);
        $this->barang();
    }
    
    function logout() {
        $this->ion_auth->logout(); 
        redirect('login');
    }
    
    /*
     * KATEGORI
     */
    function kategori() {
        $data['kategori'] = $this->categories_model->categories_get_all();
        $data['content'] = 'admin/admin_content_kategori';
        $this->load->view('admin/admin_container', $data);
    }
    
    //KATEGORI PARENT
    function kategori_insert_parent() {
        $data['content'] = 'admin/admin_content_kategori_insert_parent';
        $this->load->view('admin/admin_container', $data);
    }
    
    function kategori_insert_parent_olah() {
        if($_POST) {
            $this->form_validation->set_rules('namakategori', 'Nama Kategori', 'required');
            $namakategori = $this->input->post('namakategori');
            
            if($this->form_validation->run()) {
                $this->categories_model->categories_insert_parent($namakategori);
                redirect('admin/kategori');
            }else {
                $data['error'] = 'validation';
                $data['content'] = 'admin/admin_content_kategori_insert_parent';
                $this->load->view('admin/admin_container', $data);
            }
        }else {
            redirect('admin/kategori');
        }
    }
    
    function kategori_update_parent($category_id) {
        $data['kategori_parent'] = $this->categories_model->categories_get_single($category_id);
        $data['content'] = 'admin/admin_content_kategori_update_parent';
        $this->load->view('admin/admin_container', $data);
    }
    
    function kategori_update_parent_olah() {
        if ($_POST) {
            $this->form_validation->set_rules('namakategori', 'Nama Kategori', 'required');
            $namakategori = $this->input->post('namakategori');
            $category_id = $this->input->post('idkategori');

            if ($this->form_validation->run()) {
                $this->categories_model->categories_update_parent($category_id, $namakategori);
                redirect('admin/kategori');
            } else {
                $data['error'] = 'validation';
                $data['content'] = 'admin/admin_content_kategori_insert_parent';
                $this->load->view('admin/admin_container', $data);
            }
        } else {
            redirect('admin/kategori');
        }
    }
    
    //KATEGORI CHILD
    function kategori_insert_child() {
        $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
        $data['content'] = 'admin/admin_content_kategori_insert_child';
        $this->load->view('admin/admin_container', $data);
    }
    
    function kategori_insert_child_olah() {
        if ($_POST) {
            $this->form_validation->set_rules('namakategorichild', 'Nama Kategori', 'required');
            $idkategoriparent = $this->input->post('namakategoriparent');   //yang di send dari form adalah id nya
            $namakategorichild = $this->input->post('namakategorichild');
            
            if ($this->form_validation->run()) {
                $this->categories_model->categories_insert_child($namakategorichild, $idkategoriparent);
                redirect('admin/kategori');
            } else {
                $data['error'] = 'validation';
                $data['content'] = 'admin/admin_content_kategori_insert_child';
                $this->load->view('admin/admin_container', $data);
            }
        } else {
            redirect('admin/kategori');
        }
    }
    
    function kategori_update_child($category_id) {
        $data['kategori_child'] = $this->categories_model->categories_get_single($category_id);
        $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
        $data['content'] = 'admin/admin_content_kategori_update_child';
        $this->load->view('admin/admin_container', $data);
    }
    
    function kategori_update_child_olah() {
        if ($_POST) {
            $this->form_validation->set_rules('namakategorichild', 'Nama Kategori', 'required');
            $idkategoriparent = $this->input->post('namakategoriparent');   //yang di send dari form adalah id nya
            $namakategorichild = $this->input->post('namakategorichild');
            $idkategorichild = $this->input->post('idkategorichild');
            
            if ($this->form_validation->run()) {
                $this->categories_model->categories_update_child($idkategorichild, $namakategorichild, $idkategoriparent);
                redirect('admin/kategori');
            } else {
                $data['error'] = 'validation';
                $data['content'] = 'admin/admin_content_kategori_insert_child';
                $this->load->view('admin/admin_container', $data);
            }
        } else {
            redirect('admin/kategori');
        }
    }
    
    function kategori_delete($category_id) {
        $this->categories_model->categories_delete($category_id);
        redirect('admin/kategori');
    }
    
    /*
     * BARANG
     */
    
    function barang() {
        $data['barang'] = $this->items_model->items_get_all();
        $data['content'] = 'admin/admin_content_barang';
        $this->load->view('admin/admin_container', $data);
    }
    
    function barang_insert() {
        $data['general_spec'] = $this->general_spec_model->general_spec_get();
        $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
        $data['kategori'] = $this->categories_model->categories_get_not_parent();
        $data['content'] = 'admin/admin_content_barang_insert';
        $this->load->view('admin/admin_container', $data);
    }
    
    function child_query() {
        if ($_POST['id']) {            
            $id = $_POST['id'];
            $result = $this->categories_model->categories_get_children($id);
            //echo $result->num_rows();
            foreach($result as $row) {
                $id = $row->category_id;
                $data = $row->name;
                echo '<option value="' . $id . '">' . $data . '</option>';
            }
        }
    }
    
    function barang_insert_olah() {
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');        
        $this->form_validation->set_rules('diskon', 'Diskon', 'required');
        $this->form_validation->set_rules('garansi', 'Garansi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('idkategorichild', 'Kategori Child', 'required');
                
        $spec = $this->general_spec_model->general_spec_get();  
        //$general_spec = array();
        foreach($spec as $rows) {
            if($this->input->post($rows->name)) {                                                       
                //$general_spec[$rows->spec_id] = $this->input->post($rows->name);                               
                $general_spec[] = array($rows->spec_id, $this->input->post($rows->name));
            }  
        }
        
        //pengecekan untuk image upload
        $this->load->library('upload'); 
        $config['upload_path'] = './res/image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '5000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';                     
        
        /*
         * DISINI PENGECEKAN ERRORNYA
         * yang pertama dicek apakah sudah diisi semua belum fieldnya
         * yang kedua adalah image sudah masuk atau belom
         * yang ketiga pengecekan apakah file nya sudah sesuai standard atau belom
         */
        
        //yang pertama
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = 'validation';
            $data['general_spec'] = $this->general_spec_model->general_spec_get();
            $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
            $data['kategori'] = $this->categories_model->categories_get_not_parent();
            $data['content'] = 'admin/admin_content_barang_insert';
            $this->load->view('admin/admin_container', $data);
        } else {
            //variable masuk digunakan untuk mengecek apakah sudah ada image yang masuk atau belum.
            //user wajib mengupload minimal satu image, jika tidak, maka akan terjadi error.
            //
            //yang kedua.
            $masuk = 0;
            //$error_counter = 0;
            for($i = 1; $i < 4; $i++) {
                if($_FILES['image'.$i]['error'] == UPLOAD_ERR_OK) {
                    $masuk += 1;
                }
            }
            
            if($masuk == 0) {
                $data['error'] = 'pilihimage';
                $data['general_spec'] = $this->general_spec_model->general_spec_get();
                $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
                $data['kategori'] = $this->categories_model->categories_get_not_parent();
                $data['content'] = 'admin/admin_content_barang_insert';
                $this->load->view('admin/admin_container', $data);                
            } else {
                //yang ketiga
                
                //sukses digukanan untuk mengecek image yang telah berhasil dimasukkan
                $sukses = 0;
                for ($i = 1; $i < 4; $i++) {
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image' . $i)) {
                        if ($_FILES['image' . $i]['error'] == UPLOAD_ERR_NO_FILE) {
                            //disini tidak dilakukan apa-apa                            
                        } else {    //disini untuk error yang selain no file
                            $data['error'] = 'imageerror';
                            $data['general_spec'] = $this->general_spec_model->general_spec_get();
                            $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
                            $data['kategori'] = $this->categories_model->categories_get_not_parent();
                            $data['content'] = 'admin/admin_content_barang_insert';
                            $this->load->view('admin/admin_container', $data);
                            break;
                        }
                    } else {                        
                        $upload_data = $this->upload->data();
                        $thumbnail = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = './res/image/'.$upload_data['file_name'];                        
                        $config2['create_thumb'] = TRUE;
                        $config2['maintain_ratio'] = TRUE;
                        $config2['width'] = 150;
                        $config2['height'] = 150;
                        
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->resize();
                        
                        //$filename = $upload_data['file_name'];
                        //$thumbname = $filename.'_thumb';
                        $image_data[] = array($upload_data['file_name'], $thumbnail);
                        $sukses += 1;                                                						                        									
                    }
                }

                //jika image yang diupload user sama sudah terupload semua
                if ($sukses == $masuk) {
                    $categori_id = $this->input->post('idkategorichild');                    
                    $namabarang = $this->input->post('namabarang');
                    $diskon = $this->input->post('diskon');
                    $garansi = $this->input->post('garansi');
                    $harga = $this->input->post('harga');
                    $deskripsi = $this->input->post('deskripsi');                    
                    $item_insert_id = $this->items_model->items_insert($categori_id, $namabarang, $deskripsi, $diskon, $garansi, $harga);
                    
                    if (isset($general_spec)) {
                        foreach ($general_spec as $rows) {                           
                            //rows[0] adalah spec_id
                            //rows[1] adalah value
                            //didapat dari general_spec diatas
                            $this->items_has_specifications_model->items_has_specifications_insert($item_insert_id, $rows[0], $rows[1]);
                        }
                    }
                                        
                   $this->item_attachments_model->item_attachments_insert($item_insert_id, $image_data);
                    
                   redirect('admin/barang');
                }
                
            }
        }        
    }
    
    function barang_view($item_id) {
        $data['items_single'] = $this->items_model->items_get_single($item_id);
        $data['items_spec'] = $this->items_model->items_get_with_general_spec($item_id);
        $data['items_images'] = $this->items_model->items_get_images($item_id);
        $data['content'] = 'admin/admin_content_barang_view';
        $this->load->view('admin/admin_container', $data);
    }
    
    function barang_update($item_id) {
        $data['items_single'] = $this->items_model->items_get_single_for_admin($item_id);
        //$data['items_spec'] = $this->items_model->items_get_with_general_spec_2($item_id);
        //$data['items_images'] = $this->items_model->items_get_images($item_id);
        
        //$data['general_spec'] = $this->general_spec_model->general_spec_get();
        $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();
        
        $data['kategori'] = $this->categories_model->categories_get_children($data['items_single']->parent_id);
        $data['content'] = 'admin/admin_content_barang_update';
        $this->load->view('admin/admin_container', $data);        
    }
    
    function barang_update_olah($item_id) {
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('diskon', 'Diskon', 'required');
        $this->form_validation->set_rules('garansi', 'Garansi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $categori_id = $this->input->post('idkategorichild');
        $namabarang = $this->input->post('namabarang');
        $diskon = $this->input->post('diskon');
        $garansi = $this->input->post('garansi');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');

        if($this->form_validation->run()) {
            $this->items_model->items_update($item_id, $categori_id, $namabarang, $deskripsi, $diskon, $garansi, $harga);            
            redirect('admin/barang_view/'.$item_id);
        } else {
            $data['error'] = 'validation';
            $data['item_id'] = $item_id;
            //$parent_id = set_value('idkategoriparent');
            $data['parent_id'] = $this->input->post('idkategoriparent');
            $data['kategori_parent'] = $this->categories_model->categories_get_all_parent();                    
            $data['kategori'] = $this->categories_model->categories_get_children($data['parent_id']);
            $data['content'] = 'admin/admin_content_barang_update_error';
            $this->load->view('admin/admin_container', $data);
        }
    }
    
    function barang_update_spec($item_id) {
        $data['item_id'] = $item_id;
        $data['general_spec'] = $this->general_spec_model->general_spec_get();
        $data['items_spec'] = $this->items_model->items_get_with_general_spec_2($item_id);
        $data['content'] = 'admin/admin_content_barang_update_spec';
        $this->load->view('admin/admin_container', $data);
    }
    
    //idenya adalah didelete semua dulu berdasarkan item_id,
    //kemudian diinsertkan lagi seperti pada fungsi insert barang
    function barang_update_spec_olah($item_id) {                      
        if($this->items_has_specifications_model->items_has_specifications_get_num_rows($item_id) > 0) {
            $this->items_has_specifications_model->items_has_specifications_delete($item_id);
        } 
                
        $spec = $this->general_spec_model->general_spec_get();          
        foreach($spec as $rows) {
            if($this->input->post($rows->name)) {                                                                       
                $general_spec[] = array($rows->spec_id, $this->input->post($rows->name));
                //echo $this->input->post($rows->name);
            }  
        }                
                
        if (isset($general_spec)) {
            foreach ($general_spec as $rows) {
                //rows[0] adalah spec_id
                //rows[1] adalah value
                //didapat dari general_spec diatas
                $this->items_has_specifications_model->items_has_specifications_insert($item_id, $rows[0], $rows[1]);
            }
        }
        
        redirect('admin/barang_view/'.$item_id);
    }
    
    function barang_update_image($item_id) {
        $data['item_id'] = $item_id;    
        $data['items_images'] = $this->items_model->items_get_images($item_id);
        $data['content'] = 'admin/admin_content_barang_update_image';
        $this->load->view('admin/admin_container', $data);
    }
    
    function barang_update_image_olah($item_id) {                                
        $masuk = 0;
        //$error_counter = 0;
        for ($i = 1; $i < 4; $i++) {
            if ($_FILES['image' . $i]['error'] == UPLOAD_ERR_OK) {
                $masuk += 1;
            }
        }

        if ($masuk == 0) {
            $data['error'] = 'pilihimage';
            $data['item_id'] = $item_id;    
            $data['items_images'] = $this->items_model->items_get_images($item_id);            
            $data['content'] = 'admin/admin_content_barang_update_image';
            $this->load->view('admin/admin_container', $data);
        } else {
            //yang ketiga
            //sukses digukanan untuk mengecek image yang telah berhasil dimasukkan

            $this->load->library('upload');
            $config['upload_path'] = './res/image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = FALSE;
            $config['max_size'] = '5000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            
            $sukses = 0;
            for ($i = 1; $i < 4; $i++) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image' . $i)) {
                    if ($_FILES['image' . $i]['error'] == UPLOAD_ERR_NO_FILE) {
                        //disini tidak dilakukan apa-apa                            
                    } else {    //disini untuk error yang selain no file
                        $data['error'] = 'imageerror';
                        $data['item_id'] = $item_id;    
                        $data['items_images'] = $this->items_model->items_get_images($item_id);
                        $data['content'] = 'admin/admin_content_barang_update_image';
                        $this->load->view('admin/admin_container', $data);
                        break;
                    }
                } else {
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
                    $image_data[] = array($upload_data['file_name'], $thumbnail);
                    $sukses += 1;
                }
            }
            
            if($sukses == $masuk) {
                $this->item_attachments_model->item_attachments_delete($item_id);
                $this->item_attachments_model->item_attachments_insert($item_id, $image_data);
                redirect('admin/barang_view/'.$item_id);
            }
            
        }
    }
    
    function barang_delete($item_id) {
        $this->items_model->items_delete($item_id);
        redirect('admin/barang');
    }
    
    function spesifikasi_insert() {
        $data['content'] = 'admin/admin_content_spesifikasi_insert';
        $this->load->view('admin/admin_container', $data);
    }
    
    function spesifikasi_insert_olah() {
        $this->form_validation->set_rules('namaspec', 'Nama Spesifikasi', 'required');
        $nama = $this->input->post('namaspec');
        if($this->form_validation->run()) {
            $this->general_spec_model->general_spec_insert($nama);
            redirect('admin/barang_insert');
        }else {
            $data['error'] = 'validation';
            $data['content'] = 'admin/admin_content_spesifikasi_insert';
            $this->load->view('admin/admin_container', $data);
        }
    }
    
    function artikel() {
        $data['artikel'] = $this->articles_model->articles_get_list_with_category();
        $data['content'] = 'admin/admin_content_artikel';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_insert() {
        $data['kategori'] = $this->article_categories_model->article_categories_get();
        $data['content'] = 'admin/admin_content_artikel_insert';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_insert_olah() {
        $this->form_validation->set_rules('judul', "Judul", 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');
        $category_id = $this->input->post('idkategori');
        
        if($this->form_validation->run()) {
            $this->articles_model->articles_insert($judul, $konten, $category_id);
            redirect('admin/artikel');
        }else {
            $data['error'] = 'validation';
            $data['kategori'] = $this->article_categories_model->article_categories_get();
            $data['content'] = 'admin/admin_content_artikel_insert';
            $this->load->view('admin/admin_container', $data);
        }        
    }
    
    function artikel_view($artikel_id) {
        $data['artikel'] = $this->articles_model->articles_get_single($artikel_id);
        $data['comments'] = $this->comments_model->comments_get($artikel_id);        
                        
        $data['content'] = 'admin/admin_content_artikel_view';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_update($artikel_id) {
        $data['kategori'] = $this->article_categories_model->article_categories_get();
        $data['artikel'] = $this->articles_model->articles_get_single($artikel_id);        
                        
        $data['content'] = 'admin/admin_content_artikel_update';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_update_olah($artikel_id) {
        $this->form_validation->set_rules('judul', "Judul", 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('idkategori', 'Kategori', 'required');
        
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');
        $category_id = $this->input->post('idkategori');
        
        if($this->form_validation->run()) {
            $this->articles_model->articles_update($artikel_id, $judul, $konten, $category_id);
            redirect('admin/artikel');
        }else {
            $data['error'] = 'validation';
            $data['kategori'] = $this->article_categories_model->article_categories_get();
            $data['artikel'] = $this->articles_model->articles_get_single($artikel_id);  
            $data['content'] = 'admin/admin_content_artikel_update_error';
            $this->load->view('admin/admin_container', $data);
        }        
    }
    
    function artikel_delete($artikel_id) {
        $this->articles_model->articles_delete($artikel_id);
        redirect('admin/artikel');
    }
    
    function artikel_comment_delete($comment_id, $article_id) {
        $this->comments_model->comments_delete($comment_id);
        redirect('admin/artikel_view/'.$article_id);
    }
    
    function artikel_kategori() {
        $data['artikel_kategori'] = $this->article_categories_model->article_categories_get();
        $data['content'] = 'admin/admin_content_artikel_kategori';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_kategori_insert() {
        $data['content'] = 'admin/admin_content_artikel_kategori_insert';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_kategori_insert_olah() {
        $this->form_validation->set_rules('namakategori', 'Nama Kategori', 'required');
        $namakategori = $this->input->post('namakategori');
        
        if($this->form_validation->run()) {
            $this->article_categories_model->article_categories_insert($namakategori);
            redirect('admin/artikel_kategori');
        }else {
            $data['error'] = 'validation';
            $data['content'] = 'admin/admin_content_artikel_kategori_insert';
            $this->load->view('admin/admin_container', $data);
        }
    }
    
    function artikel_kategori_update($article_category_id) {
        $data['artikel_kategori_single'] = $this->article_categories_model->article_categories_get_single($article_category_id);
        $data['content'] = 'admin/admin_content_artikel_kategori_update';
        $this->load->view('admin/admin_container', $data);
    }
    
    function artikel_kategori_update_olah($article_category_id) {
        $this->form_validation->set_rules('namakategori', 'Nama Kategori', 'required');
        $namakategori = $this->input->post('namakategori');

        if ($this->form_validation->run()) {
            $this->article_categories_model->article_categories_update($article_category_id, $namakategori);
            redirect('admin/artikel_kategori');
        } else {
            $data['error'] = 'validation';
            $data['content'] = 'admin/admin_content_artikel_kategori_update';
            $this->load->view('admin/admin_container', $data);
        }
    }
    
    function artikel_kategori_delete($article_category_id) {
        $this->article_categories_model->article_categories_delete($article_category_id);
        redirect('admin/artikel_kategori');
    }
    
    function profile() {
        $data['profile'] = $this->profile_model->profile_get();
        $data['content'] = 'admin/admin_content_profile';
        $this->load->view('admin/admin_container', $data);
    }
    
//    function profile_insert() {
//        $data['content'] = 'admin/admin_content_profile_insert';
//        $this->load->view('admin/admin_container', $data);
//    }
//    
//    function profile_insert_olah() {
//        $this->form_validation->set_rules('nama', 'Nama', 'required');
//        $this->form_validation->set_rules('isi', 'Isi', 'required');
//        
//        $nama = $this->input->post('nama');
//        $isi = $this->input->post('isi');
//        
//        if($this->form_validation->run()) {
//            $this->profile_model->profile_insert($nama, $isi);
//            redirect('admin/profile');
//        }else {
//            $data['error'] = 'validation';
//            $data['content'] = 'admin/admin_content_profile_insert';
//            $this->load->view('admin/admin_container', $data);
//        }
//    }
    
    function profile_update($profile_id) {
        $data['profile'] = $this->profile_model->profile_get_single($profile_id);
        $data['content'] = 'admin/admin_content_profile_update';
        $this->load->view('admin/admin_container', $data);
    }
    
    function profile_update_olah($profile_id) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        $nama = $this->input->post('nama');
        $isi = $this->input->post('isi');

        if ($this->form_validation->run()) {
            $this->profile_model->profile_update($profile_id, $nama, $isi);
            redirect('admin/profile');
        } else {
            $data['error'] = 'validation';
            $data['content'] = 'admin/admin_content_profile_update';
            $this->load->view('admin/admin_container', $data);
        }
    }
    
    function profile_delete($profile_id) {
        $this->profile_model->profile_delete($profile_id);
        redirect('admin/profile');
    }
    
    function informasi() {
        $data['site'] = $this->profile_model->site_get();
        $data['content'] = 'admin/admin_content_informasi';
        $this->load->view('admin/admin_container', $data);
    }
    
    function informasi_update() {
        $data['site'] = $this->profile_model->site_get();
        $data['content'] = 'admin/admin_content_informasi_update';
        $this->load->view('admin/admin_container', $data);
    }
    
    function informasi_update_olah() {
        $this->form_validation->set_rules('tentang_kami', "Tentang Kami", 'required');
        $this->form_validation->set_rules('cara_pembelian', 'Cara Pembelian', 'required');
        $this->form_validation->set_rules('garansi', 'Garansi', 'required');
        
        $tentang = $this->input->post('tentang_kami');
        $cara = $this->input->post('cara_pembelian');
        $garansi = $this->input->post('garansi');
        
        if($this->form_validation->run()) {
            $site = $this->profile_model->site_get();
            foreach($site as $rows) {
                if($rows->site_id == 1) {
                    $this->profile_model->site_update($rows->site_id, $tentang);
                }else if($rows->site_id == 2) {
                    $this->profile_model->site_update($rows->site_id, $cara);
                }else if($rows->site_id == 3) {
                    $this->profile_model->site_update($rows->site_id, $garansi);
                }                
            }
            
            redirect('admin/informasi');
        }
    }
    
    function image_header() {
        $data['image_header_show'] = $this->image_headers_model->image_headers_get_image();
        $data['image_header'] = $this->image_headers_model->image_headers_get();        
        $data['content'] = 'admin/admin_content_image_headers';
        $this->load->view('admin/admin_container', $data);
    }
    
    function image_header_upload() {
        $config['upload_path'] = './res/image/carousel/';//base_url().'resources/img/barang/';//
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        
        if($this->upload->do_upload() == FALSE) {
            $data['error'] = 'validation';            
            $data['image_header_show'] = $this->image_headers_model->image_headers_get_image();
            $data['image_header'] = $this->image_headers_model->image_headers_get();
            $data['content'] = 'admin/admin_content_image_headers';
            $this->load->view('admin/admin_container', $data);//        
        }else {            
            $upload_data = $this->upload->data();    
            $imagename = $upload_data['file_name'];
            $this->image_headers_model->image_headers_insert($imagename);
            $data['error'] = 'sukses';          
            redirect('admin/image_header');
        }
    }
    
    function image_header_delete($id_image) {
        $this->image_headers_model->image_headers_delete($id_image);
        redirect('admin/image_header');
    }
    
    function image_header_update_show($id_image, $show) {        
        if($show >= 0 && $show <= 1) {            
            $this->image_headers_model->image_headers_update_status($id_image, $show);
            redirect('admin/image_header');
        }else {
            redirect('admin/image_header');
        }
    }
    
    function image_header_update_item_link($id_image) {
        $data['item_link'] = $this->image_headers_model->image_headers_get_item_link($id_image);
        $data['content'] = 'admin/admin_content_image_header_item_link_insert';
        $this->load->view('admin/admin_container', $data);
    }
    
    function image_header_update_item_link_olah() {
        if($this->input->post('idimage')) {
            $image_id = $this->input->post('idimage');
            $item_link = $this->input->post('itemlink');
            $this->image_headers_model->image_headers_set_item_link($image_id, $item_link);
            redirect('admin/image_header');
        }else {
            redirect('admin/image_header');
        }
    }
    
    function header_logo() {
        $data['header_logo'] = $this->profile_model->site_get_header_logo();
        $data['content'] = 'admin/admin_content_header_logo';
        $this->load->view('admin/admin_container', $data);
    }
    
    function header_logo_upload() {
        $config['upload_path'] = './res/image/header/';//base_url().'resources/img/barang/';//
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        
        if($this->upload->do_upload() == FALSE) {
            $data['error'] = 'validation';            
            $data['header_logo'] = $this->profile_model->site_get_header_logo();
            $data['content'] = 'admin/admin_content_header_logo';
            $this->load->view('admin/admin_container', $data);        
        }else {            
            $upload_data = $this->upload->data();    
            $imagename = $upload_data['file_name'];
            $this->profile_model->site_header_logo_update_content($imagename);
            redirect('admin/header_logo');
        }
    }
    
 
    
}
?>

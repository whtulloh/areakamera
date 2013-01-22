<?php

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->model('items_model');
        $this->load->model('image_headers_model');
        $this->load->model('articles_model');
        $this->load->model('comments_model');
        $this->load->model('article_categories_model');
        $this->load->model('profile_model');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('breadcrumb');
        $this->load->helper('captcha');   
        $this->config->load('myconfig');
        $image_name = $this->profile_model->site_get_header_logo();
        $this->config->set_item('header_logo_image_name', $image_name->content);
        
    }
    
    function index() {
        $data['carousel'] = $this->image_headers_model->image_headers_get_image();
        $data['items_popular'] = $this->items_model->items_get_newest();
        $data['categories'] = $this->categories_model->categories_get_all();
        $data['articles'] = $this->articles_model->articles_get();
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content';        
        $this->load->view('home/home_container', $data);
    }        
    
    function item($item_id = 0) {
        $data['items_single'] = $this->items_model->items_get_single($item_id);
        if ($data['items_single'] == null) {
            redirect('page_not_found');
        } else {
            $data['items_images'] = $this->items_model->items_get_images($item_id);
            $data['items_spec'] = $this->items_model->items_get_general_specs($item_id);
            $data['items_category'] = $this->items_model->items_get_category_name($item_id);
            $data['items_related'] = $this->items_model->items_get_items_related($item_id);
            $data['categories'] = $this->categories_model->categories_get_all();
            $data['profile'] = $this->get_data_profile();
            $data['content'] = 'home/home_content_item';
            $this->load->view('home/home_container', $data);
        }
    }
    
    function informasi() {
        $data['categories'] = $this->categories_model->categories_get_all();
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_informasi';
        $this->load->view('home/home_container', $data);
    }
    
    function cara_pembelian() {
        $data['categories'] = $this->categories_model->categories_get_all();
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_cara_pembelian';
        $this->load->view('home/home_container', $data);
    }
    
    function garansi() {
        $data['categories'] = $this->categories_model->categories_get_all();
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_garansi';
        $this->load->view('home/home_container', $data);
    }
    
    //$category_id = 0 agar jika url tidak terisi parameter.. 
    //akan memberikan nilai 0 pada category_id
    function produk_kategori($category_id=0) {
        //force to int biar ngk error.
        $category_id = (int)$category_id;  
        
        //untuk styling pagination
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
                
        $config['base_url'] = base_url().'home/produk/kategori/'.$category_id;
        $config['total_rows'] = $this->items_model->items_get_total_by_category($category_id);        
        $config['per_page'] = 8;
        $config['uri_segment'] = 5;
        
        $this->pagination->initialize($config); 

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['items'] = $this->items_model->items_get_by_category_limit($category_id, $config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        //end untuk pagination     
                       
        //ini untuk breadcrumb
        $this->config->load('breadcrumb');        
        $data['category_name'] = $this->categories_model->categories_get_single($category_id);
        $data['parent_name'] = $this->categories_model->categories_get_parent($category_id);
        
        $data['categories'] = $this->categories_model->categories_get_all();        
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_produk_kategori';
        $this->load->view('home/home_container', $data);
    } 
    
    function produk() {        
        //untuk styling pagination
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
                
        $config['base_url'] = base_url().'home/produk/';
        $config['total_rows'] = $this->items_model->items_get_total();        
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        
        //echo $this->items_model->items_get_total();
        $this->pagination->initialize($config); 

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['items'] = $this->items_model->items_get_limit($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        //end untuk pagination     
                             
        //echo $this->items_get_limit($config["per_page"], $page);
        $data['categories'] = $this->categories_model->categories_get_all();       
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_produk';
        $this->load->view('home/home_container', $data);
    }
    
    function search_temp() {
        $search = $this->input->post('search');    
        $search = urlencode($search);
        //echo $search;
        redirect('home/search/'.$search.'/');
//        if($this->input->post('search')) {
//            $search = $this->input->post('search');
//        }else {
//            $search = "kosongan";
//        }        
    }
    
    //inisialisasi digunakan agar ketika parameter kosong,
    //akan terisi nilai "kosongan"
    function search($search="kosongan") {           
        //echo $search;
        //untuk styling pagination
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
                
        $config['base_url'] = base_url().'home/search/'.$search;
        $search = urldecode($search);
        $config['total_rows'] = $this->items_model->items_get_search_total($search);        
        $config['per_page'] = 8;
        $config['uri_segment'] = 4;
        
        $this->pagination->initialize($config); 

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['items'] = $this->items_model->items_get_search_limit($search, $config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        //end untuk pagination     
                                       
        $data['categories'] = $this->categories_model->categories_get_all();    
        $data['profile'] = $this->get_data_profile();
        $data['content'] = 'home/home_content_search';
        $this->load->view('home/home_container', $data);        
    }
    
    function artikel_list() {
        $data['article_list'] = $this->articles_model->articles_get_list();
        
        //for sidebar
        $data['article_categories'] = $this->article_categories_model->article_categories_get();
        $data['article_terbaru'] = $this->articles_model->articles_get_newest();
        $data['comment_terbaru'] = $this->comments_model->comments_get_newest();
        
        $data['content'] = 'home/home_content_artikel_list';
        $data['profile'] = $this->get_data_profile();
        $this->load->view('home/home_container', $data);
    }
    
    function artikel_list_category($category_id) {
        $data['article_list'] = $this->articles_model->articles_get_by_category($category_id);
        
        //for sidebar
        $data['article_categories'] = $this->article_categories_model->article_categories_get();
        $data['article_terbaru'] = $this->articles_model->articles_get_newest();
        $data['comment_terbaru'] = $this->comments_model->comments_get_newest();
        
        $data['content'] = 'home/home_content_artikel_list';
        $data['profile'] = $this->get_data_profile();
        $this->load->view('home/home_container', $data);
    }
    
    function artikel_single($artikel_id) {
        $data['article_single'] = $this->articles_model->articles_get_single($artikel_id);
        $data['comments'] = $this->comments_model->comments_get($artikel_id);
        
        //for sidebar
        $data['article_categories'] = $this->article_categories_model->article_categories_get();
        $data['article_terbaru'] = $this->articles_model->articles_get_newest();
        $data['comment_terbaru'] = $this->comments_model->comments_get_newest();
                
        $data['cap_image'] = $this->make_captcha();
        $data['content'] = 'home/home_content_artikel_single';
        $data['profile'] = $this->get_data_profile();
        $this->load->view('home/home_container', $data);
    }
    
    
    function artikel_komentar_olah() {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_check_captcha');
                
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
        $artikel_id = $this->input->post('article_id');
        
        if($this->form_validation->run()) {
            //echo $artikel_id;
            $this->comments_model->comments_insert($artikel_id, $name, $email, $komentar);
            redirect('home/artikel/single/'.$artikel_id);
        } else {
            $data['error'] = 'validation';
            
            $data['article_single'] = $this->articles_model->articles_get_single($artikel_id);
            $data['comments'] = $this->comments_model->comments_get($artikel_id);

            //for sidebar
            $data['article_categories'] = $this->article_categories_model->article_categories_get();
            $data['article_terbaru'] = $this->articles_model->articles_get_newest();
            $data['comment_terbaru'] = $this->comments_model->comments_get_newest();
            
            $data['cap_image'] = $this->make_captcha();
            $data['content'] = 'home/home_content_artikel_single';
            $data['profile'] = $this->get_data_profile();
            $this->load->view('home/home_container', $data);
        } 
    
    }
           
    function make_captcha() {
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'img_width' => 200,
            'img_height' => 60,
        );

        $cap = create_captcha($vals);

        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);

        return $cap['image'];
    }
    
    function check_captcha($str) {
        // First, delete old captchas
        $expiration = time() - 7200; // Two hour limit
        $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($str, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        
        if ($row->count > 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'captcha yang kamu masukkan SALAHHHH! tolol');
            return false;
        }
    }
    
    
    function get_data_profile() {
        $result = $this->profile_model->profile_get();
        foreach($result as $rows) {
            if($rows->name == 'alamat') {
                $alamat = $rows->content;
            }else if($rows->name == 'telepon'){
                $telepon = $rows->content;
            }else if($rows->name == 'email'){
                $email = $rows->content;
            }else if($rows->name == 'ym') {
                $ym = $rows->content;
            }else if($rows->name == 'facebook') {
                $facebook = $rows->content;
            }else if($rows->name == 'twitter') {
                $twitter = $rows->content;
            }
        }
        $result = $this->profile_model->site_get();
        foreach($result as $rows) {
            if($rows->name == 'tentang_kami') {
                $tentang = $rows->content;
            }else if($rows->name == 'cara_pembelian') {
                $cara = $rows->content;
            }
            else if($rows->name == 'garansi') {
                $garansi = $rows->content;
            }
        }
        $data = array(
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email,
            'ym' => $ym,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'tentang' => $tentang,
            'cara' => $cara,
            'garansi' => $garansi
        );
        
        return $data;
    }
    
    function page_not_found() {
        echo "page not found";
    }
}
?>

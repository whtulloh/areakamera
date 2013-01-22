<?php
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
                
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");     
        
        if($this->ion_auth->logged_in()) {
            redirect('admin');
        }
    }
    
    function login_form() {
        $this->load->view('login/login_container');
    }
       
    
    function login_check() {        
        if ($_POST) {   //clean public facing app input
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            
            if ($this->form_validation->run()) {
                //Ion_Auth Login fun
                if ($this->ion_auth->login($username, $password)) {

                    //capture the user
                    $user = $this->ion_auth->user()->row();

                    //redirect($user->group . '/home');
                    redirect('admin');

                    /* redirect to the proper home
                      controller using the user
                      groups as folder names */
                } else {

                    // set error flashdata
                    $this->session->set_flashdata(
                            'error', 'Your login attempt failed.'
                    );

                    $data['error'] = 'wrong';
                    $this->load->view('login/login_container', $data);
                }
            }else {
                $data['error'] = 'validation';
                $this->load->view('login/login_container', $data);
            }
            
            
        }else {
            redirect('/');        
        }           
    }
    
            
}
?>

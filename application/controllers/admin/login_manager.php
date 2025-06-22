<?php

class Login_manager extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       // $this->load->library('cart');
        // $this->load->helper('string');
        //

    }

    public function index()
    {
        $this->load->view('admin/login/login');
    }

     public function logout()
     {   //$this->cart->destroy();
         $this->session->unset_userdata('logged_in');
         session_destroy();

         redirect('admin/login_manager');
     }


    public function sign_in()
    {
        $this->load->helper('url');

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $encryptpass= md5($this->input->post('password'));
        $form_get = array(
            'username' => $this->input->post('username'),
            'password' => $encryptpass,

        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login/login');
        } else {
            $this->load->model('signin');

            $data_get['login_data'] = $this->signin->get_username($form_get['username'], $form_get['password']);
            if ($data_get['login_data']) {
                foreach ($data_get['login_data'] as $row) {
                    $data_array = array(
                        'username' => $row['admin_name'],
                        'logged_in' => 'yes'
                    );
                }
                //print_r($data_array);die;
                $this->session->set_userdata($data_array);
                redirect('admin/category_manager');

            }
            $this->session->set_flashdata('message', 'Invalid username or password');
            redirect('admin/login_manager');
        }
    }


}
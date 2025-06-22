<?php

class Login_manager extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('category');
        $this->load->model('shopping_model');
        $this->load->library('cart');
        // $this->load->helper('string');
        //

    }

    public function index()
    {
        $result['data']=$this->category->get_category_list();
        $result['product']=$this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = 'no';
        $result['title'] = "Login | Voguish-villa";
        $this->load->view('header',$result);
        $this->load->view('user/login/login');
        $this->load->view('footer');

    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->cart->destroy();
        redirect('homepage_controller');
    }

    public function sign_up()
    {
        $this->load->helper('url');

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('number', 'number', 'required');

        $name=strtolower($this->input->post('name'));

        $form_get = array(
            'name' => $name,
            'password' => md5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'phone_no' => $this->input->post('number'),
            'gender' => $this->input->post('gender')
        );

        if ($this->form_validation->run() === FALSE) {
            ////signup gareko person ko name pathauna baaki
            $result['data']=$this->category->get_category_list();
            $result['product']=$this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['title'] = "Login | Voguish-villa";
            $result['logged_in'] = 'no';
            $this->load->view('header',$result);
            $this->load->view('user/login/login');
            $this->load->view('footer');

        } else {
            $this->load->model('signin');
            $result['logged_in'] = 'yes';

            $user['user']=$this->signin->sign_up($form_get,$form_get['email']);
            if($user['user']){
                $data_array = array(
                    'user_id' => $user['user']['user_id'],
                    'username' => $user['user']['name'],
                    'logged_in' => 'yes'
                );

                $this->session->set_userdata($data_array);
                redirect('homepage_controller/user_loggedin');

            }else{
                $this->session->set_flashdata('message', 'Could not sign up. Try again !!!!');
                redirect('user/login_manager');

            }

        }
    }

    public function sign_in()
    {
        $this->load->helper('url');

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $encryptpass= md5($this->input->post('password'));
        $form_get = array(
            'name' => $this->input->post('name'),
            'password' => $encryptpass,
            'email' => $this->input->post('email')
        );

        if ($this->form_validation->run() === FALSE) {
            $result['data']=$this->category->get_category_list();
            $result['product']=$this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['title'] = "Login | Voguish-villa";
            $result['logged_in']="no";
            $this->load->view('header',$result);
            $this->load->view('user/login/login');
            $this->load->view('footer');
        } else {
            $this->load->model('signin');

            $data_get['login_data'] = $this->signin->username($form_get['email'], $form_get['password']);
            if ($data_get['login_data']) {
                foreach ($data_get['login_data'] as $row) {
                    $data_array = array(
                        'user_id' => $row['user_id'],
                        'username' => $row['name'],
                        'logged_in' => 'yes'
                    );
                }

                $this->session->set_userdata($data_array);
                redirect('homepage_controller/user_loggedin');

            }
            $this->session->set_flashdata('message', 'Could not sign in. Try again !!!!');
            redirect('user/login_manager');
        }
    }


}
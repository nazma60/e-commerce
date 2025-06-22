<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
        $this->load->model('billing_model');


    }

    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = "no";
        }
        $result['data'] = $this->category->get_category_list();

        $result['title'] = "Contact Us | Voguish-villa";
        $this->load->view('header', $result);
        $this->load->view('contact-us_view');
        $this->load->view('footer');}
    public function save(){

        $customer = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
        );
        // And store user imformation in database.
        $res=$this->billing_model->add_contact($customer);
        if ($res){
            echo ("success!");
        }



    } }
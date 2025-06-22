<?php

class Brand_items extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('shopping_model');
        $this->load->model('category');

    }

    public function view()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');

        } else {
            $result['logged_in'] = 'no';
        }
        $id = $this->uri->segment(3);
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_array_id($id);
        $result['brands'] = $this->shopping_model->get_brand_list();
        $result['brands_details'] = $this->shopping_model->get_brand($id);
        $result['image_item'] = $this->shopping_model->get_images_list();


        $result['title'] = $result['brands_details']['name'];
        $this->load->view('header', $result);
        $this->load->view('brand_products');
        $this->load->view('footer');
    }

    }
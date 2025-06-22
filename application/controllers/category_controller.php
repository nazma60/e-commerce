<?php
class Category_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
        $this->load->model('shopping_model');
    }

    public function parent_menu(){
        if ($this->session->userdata('logged_in'))
        {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');

        }else{
            $result['logged_in'] = 'no';
        }
        $menu_id = $this->uri->segment(3);
        $result['categories'] = $this->category->get_subcategory($menu_id);
        $result['cat_list'] = $this->category->get_category($menu_id);
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['brands'] = $this->shopping_model->get_brand_list();
        $result['image_item'] = $this->shopping_model->get_images_list();


        $result['title'] = $result['cat_list']['name'];
        $this->load->view('header', $result);
        $this->load->view('parent_menuview');
        $this->load->view('footer');
    }
    public function child_menu(){
        if ($this->session->userdata('logged_in'))
        {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');

        }else{
            $result['logged_in'] = 'no';
        }
        $id = $this->uri->segment(3);
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_array_cat_id($id);
        $result['brands'] = $this->shopping_model->get_brand_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['details'] = $this->category->get_category($id);

        $result['title'] = $result['details']['name'];
        $this->load->view('header', $result);
        $this->load->view('child_menuview');
        $this->load->view('footer');
    }

}
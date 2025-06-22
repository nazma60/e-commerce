<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
        $this->load->model('shopping_model');
        $this->load->model('search_model');
    }

    public function search_result()
    {
        if (isset($_GET) && isset($_GET['query'])) {
            $result['results'] = $this->search_model->getSearchResult($_GET['query']);
            if ($this->session->userdata('logged_in')) {

                $result['user_id'] = $this->session->userdata('user_id');
                $result['name'] = $this->session->userdata('username');
                $result['logged_in'] = $this->session->userdata('logged_in');

            } else {
                $result['logged_in'] = 'no';
            }

            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['data'] = $this->category->get_category_list();
            $result['brands'] = $this->shopping_model->get_brand_list();
            $result['image_item'] = $this->shopping_model->get_images_list();


            $result['title'] = 'Search Results';
            $this->load->view('header', $result);
            $this->load->view('search');
            $this->load->view('footer');

        }
    }

    public function product_search()
    {
        if (isset($_GET) && isset($_GET['query'])) {
            $result = $this->search_model->getSearchResult($_GET['query']);
            if ($result > 0) {
                foreach ($result as $pr) {
                    $arr_result[] = $pr->name;
                    echo json_decode($arr_result);
                }
            }
        }
    }

}
<?php
class Orders extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('shopping_model');

    }

    public function index()
    {
        $result['order'] = $this->shopping_model->get_customer_list();
        $this->load->view('admin/header', $result);
        $this->load->view('admin/orders/view_order');
        $this->load->view('admin/footer');
    }


}
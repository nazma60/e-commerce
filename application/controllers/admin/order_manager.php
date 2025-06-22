<?php

class Order_manager extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('order_model');
        $this->load->model('category');

    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $result['name'] = $this->session->userdata('username');
            $result['orders'] = $this->order_model->get_order_list();
            $result['user_details'] =  $this->order_model->get_user_list();

//print_r($result['orders'] );die;
            $this->load->view('admin/header', $result);
            $this->load->view('admin/orders/view_order');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }
    public function orderdetails(){
        if ($this->session->userdata('logged_in')) {
            $id=$this->uri->segment(4);
            $result['id']=$id;
            $result['name'] = $this->session->userdata('username');
            $result['orderdetails'] = $this->order_model->get_orderdetailsbyid($id);
            $result['orders'] = $this->order_model->get_order_list();
            $result['product_details'] =  $this->order_model->get_product_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/orders/view_orderdetails');
            $this->load->view('admin/footer');
        } else {  $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }}
    public function ship(){
        if ($this->session->userdata('logged_in')) {
            /*$id=$this->uri->segment(4);*/
            $result['name'] = $this->session->userdata('username');
            $id=$this->input->post('order_no');

            $new=array(
                'shipping_date' => date('Y-m-d'),
                'shipping_status'=>"shipped",
            );

            // And store user imformation in database.
           $shipped= $this->order_model->update_order($id,$new);
//$result['ship_info']=$this->order_model->get_ship_list();
if ($shipped){
            redirect('admin/order_manager');}}

        else {  $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }}

    public function view_shipped_products(){
        if ($this->session->userdata('logged_in')) {
            /*$id=$this->uri->segment(4);*/
            $result['name'] = $this->session->userdata('username');

            // And store user imformation in database.
           // $shipped= $this->order_model->update_order($id,$new);

$result['ship_info']=$this->order_model->get_ship_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/orders/view_shipping_details');
            $this->load->view('admin/footer');}
        else {  $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }}
    public function view_pending_products(){
        if ($this->session->userdata('logged_in')) {
            /*$id=$this->uri->segment(4);*/
            $result['name'] = $this->session->userdata('username');
            $result['ship_info']=$this->order_model->get_pending();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/orders/view_shipping_details');
            $this->load->view('admin/footer');}
        else {  $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }}
    public function add()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $result['brands'] = array(
                'id' => '',
                'name' => '',
            );
            $this->load->view('admin/header', $result);
            $this->load->view('admin/brands/add_edit_brand');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }
    public function add_brands()
    {
        if ($this->session->userdata('logged_in')) {
            $value= $this->input->post('id');
            $id =  $this->input->post('id');
            $data=array (
                'name'=> $this->input->post('brand_name')
            );

        }
        if ($id=="") {
            $result = $this->shopping_model->brand_add($data);//pass value to model function
            $this->session->set_flashdata('message', 'Brand has been added');
        }else {
            $result = $this->shopping_model->brand_update($data,$id);
            $this->session->set_flashdata('message', 'Brand has been updated');
        }
        if ($result) {

            redirect('admin/brand_manager');
        }

        else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }

    }
    public function edit()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $id = $this->uri->segment(4);
            $result['brands'] = $this->shopping_model->get_brand($id);
            $this->load->view('admin/header',$result);
            $this->load->view('admin/brands/add_edit_brand');
            $this->load->view('admin/footer');


        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');

        }
    }
    public function delete()
    {
        if ($this->session->userdata('logged_in')) {
            $id = $this->uri->segment(4);

            $result = $this->shopping_model->brand_delete($id);//pass value to model function

            $this->session->set_flashdata('message', 'Your Product has been deleted');
            redirect('admin/brand_manager');
        } else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }
}
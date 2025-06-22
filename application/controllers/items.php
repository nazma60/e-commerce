<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form','url'));
        $this->load->model('category');
        $this->load->model( 'items_model', 'Item' );
        $this->load->model('shopping_model');
        $this->load->library( 'Paypal_Lib' );
        $data['site_name'] = $this->config->item( 'site_name' );
        $this->load->vars( $data );

    }
    public function index() {
        $data['page_title'] = 'All Items';
        $data['items'] = $this->Item->get_all();
        $this->load->view( 'header', $data );
        $this->load->view( 'items/index', $data );
        $this->load->view( 'footer', $data );
    }
  /*  public function details() { // ROUTE: item/{name}/{id}
        $id = $this->uri->segment( 3 );
        $item = $this->Item->get( $id );

        if ( ! $item ) {
            $this->session->set_flashdata( 'error', 'Item not found.' );
            redirect( 'items' );
        }

        $data['page_title'] = $item->name;
        $data['item'] = $item;


        $this->load->view( 'header', $data );
        $this->load->view( 'items/details', $data );
        $this->load->view( 'footer', $data );
    }*/
    public function purchase() { // ROUTE: purchase/{name}/{id}
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['data'] = $this->category->get_category_list();
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');

            $result['title'] = "Complete Payment| Voguish-villa";

        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }

        $id = $this->uri->segment( 3 );
        $item = $this->Item->get_order_id( $id );

        if ( ! $item ) {
            $this->session->set_flashdata( 'error', 'Order not found.' );
            redirect( 'items' );
        }

        $this->form_validation->set_rules( 'email', 'Email', 'required|valid_email|max_length[127]' );

        if ( $this->form_validation->run() ) {
            $email = $this->input->post( 'email' );

            $key = md5( $id . time() . $email . rand() );
            $this->Item->setup_payment( $item->serial, $email, $key );

            $this->load->library( 'Paypal_Lib' );
            $this->paypal_lib->add_field( 'business', $this->config->item( 'paypal_email' ));
            $this->paypal_lib->add_field( 'return', site_url( 'paypal/success' ) );
            $this->paypal_lib->add_field( 'cancel_return', site_url( 'paypal/cancel' ) );
            //$this->paypal_lib->add_field( 'notify_url', site_url( 'paypal/ipn' ) ); //

            $this->paypal_lib->add_field( 'item_name', $item->serial );
            $this->paypal_lib->add_field( 'item_number', '1' );
            $this->paypal_lib->add_field( 'amount', $item->Sum );

            $this->paypal_lib->add_field( 'custom', $key );

            redirect( $this->paypal_lib->paypal_get_request_link() );
        }

        $result['page_title'] = 'Billing Success' ;
        $result['item'] = $item;
        //print_r($this->paypal_lib->paypal_get_request_link());die;
        //$payer_email = $this->paypal_lib->ipn_data['payer_email'];
        /*if ($this->paypal_lib->validate_ipn()) {
            $this->Item->confirm_payment($key);
        }*/
        $this->load->view( 'header', $result );
        $this->load->view( 'items/purchase' );
        $this->load->view( 'footer' );
    }

}
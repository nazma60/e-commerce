<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
        $this->load->model('billing_model');
        $this->load->library('cart');
        $this->load->model('shopping_model');

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
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['title'] = "View products | Voguish-villa";
            $this->load->view('header', $result);
            $this->load->view('products_view');
            $this->load->view('footer');


    }

    /* public function user_loggedin()
     {
         $result['user_id'] = $this->session->userdata('user_id');
         $result['name'] = $this->session->userdata('username');
         $result['logged_in'] = $this->session->userdata('logged_in');
         $result['data'] = $this->category->get_category_list();
         $result['product'] = $this->shopping_model->get_product_list_array();
         $result['image_item'] = $this->shopping_model->get_images_list();
         $result['title'] = "View products | Voguish-villa";
         $this->load->view('header', $result);
         $this->load->view('products_view');
         $this->load->view('footer');
     }
 */

    public function display_cart()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['data'] = $this->category->get_category_list();
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');
            $result['cart'] = $this->cart->contents();

            $result['title'] = "View cart | Voguish-villa";
            $this->load->view('header', $result);
            $this->load->view('shopping_view');
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }


    }

    public function add()
    {
        // Set array for send data.
        $color_size=$this->input->post('color_size');
        $result_explode = explode('/', $color_size);
        $product_id=$this->input->post('id');
        $result_explode['2']=$product_id;
        $result['color_size_qty']=$this->shopping_model->get_qty_color_size($result_explode);
        $available=$result['color_size_qty']['quantity'];
        //print_r($available);die;
        if ($available==0){$this->session->set_flashdata('message', 'Product not available!');
        redirect('single_product/details/'.$product_id);}else{
        $insert_data = array(
            'user_id' => $this->input->post('user_id'),
            'id' => $product_id,
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'cover_image' => $this->input->post('cover_image'),
            'qty_id' =>$result['color_size_qty']['id'],
            'avl_qty'=>$result['color_size_qty']['quantity'],
            'qty' => 1

        );


        $this->cart->insert($insert_data);

        // This function add items into cart.

//print_r( $this->cart->contents());die;
        // This will show insert data in cart.
        redirect('shopping/display_cart');
    }}

    public function remove($rowid)
    {
        // Check rowid value.
        if ($rowid === "all") {
            // Destroy data which store in  session.
            $this->cart->destroy();
            redirect('shopping');
        } else {
            // Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            // Update cart data, after cancle.
            $this->cart->update($data);
        }

        // This will show cancle data in cart.
        redirect('shopping/display_cart');
    }

    public function update_cart()
    {
        if ($this->session->userdata('logged_in')) {
            $user_id = $this->session->userdata('user_id');
            // $result['data'] = $this->category->get_category_list();
            // $result['product'] = $this->shopping_model->get_product_list_array();
            // $result['image_item'] = $this->shopping_model->get_images_list();
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');

            $result['title'] = "View cart | Voguish-villa";


        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }

        // Recieve post values,calcute them and update
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {

            $rowid = $cart['rowid'];
            $cover_image = $cart['cover_image'];
            //print_r($cart['avl_qty']);die;
           // print_r($cart['qty']);print_r(Helllllllllllp);print_r($cart['avl_qty']);die;
if ($cart['qty']<=$cart['avl_qty']){
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
//print_r($cart);die;
            $data = array(

                'rowid' => $rowid,

                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );

            $this->cart->update($data);
    redirect('shopping/display_cart');

        }   else{$this->session->set_flashdata('message', 'Please decrease your quantity!');
            redirect('shopping/display_cart');}}
    }

    public function billing_view()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['data'] = $this->category->get_category_list();
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');
            $result['cart']=$this->cart->contents();

            $result['title'] = "Confirm details | Voguish-villa";
            $this->load->view('header', $result);
            $this->load->view('billing_view');
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }
        // Load "billing_view".

    }

    public function save_order()
    {
        if ($this->session->userdata('logged_in')) {

            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');
            $result['data'] = $this->category->get_category_list();
            $result['title'] = "Order done | Voguish-villa";
            $user_id = $this->input->post('user_id');
            $grand_total = $this->input->post('sum');
            $customer = array(
                'phone_no' => $this->input->post('phone'),
                'city' => $this->input->post('city'),
                'town' => $this->input->post('town'),
                'postalcode' => $this->input->post('postalcode'),
                'address_detail' => $this->input->post('addressdetail'),
                'email' => $this->input->post('email'),


            );
            // And store user imformation in database.
            $this->billing_model->add_customer($user_id, $customer);

            $order = array(
                'order_date' => date('Y-m-d'),
                'customer_id' => $user_id,
                'Sum' => $grand_total
            );

            $ord_id = $this->billing_model->add_order($order);

            $result['order_id']=$ord_id;
//print_r($this->billing_model->add_order($order));die;
            //print_r($this->cart->contents());die;
       if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                    $order_detail = array(

                        'product_id' => $item['id'],
                        'order_id' => $ord_id,
                        'quantity' => $item['qty'],
                        'price' => $item['price']
                    );
                    $this->billing_model->add_order_detail($order_detail);
                    // Insert product imformation with order detail, store in cart also store in database.

                endforeach;
            endif;
           foreach ($cart as $product){
               $quantity=$product['avl_qty']-$product['qty'];
               $data=array(
                   'quantity'=>$quantity
               );
               $id=$product['qty_id'];
               $this->shopping_model->colors_update($data,$id);
           }

            $this->cart->destroy();

            // After storing all imformation in database load "billing_success".
            $this->load->view('header', $result);
            $this->load->view('billing_success');
            $this->load->view('footer');


        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }
        // This will store all values which inserted  from user.

    }
}
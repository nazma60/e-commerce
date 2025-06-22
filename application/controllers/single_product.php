<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Single_product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('shopping_model');
        $this->load->model('category');
        $this->load->model('items_model');
        $this->load->model('billing_model');
        $this->load->model('recommend_model');
        $this->load->library('cart');
        $this->load->helper(array('form', 'url'));

    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $data['user_id'] = $this->session->userdata('user_id');
            $data['name'] = $this->session->userdata('username');
            $data['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = 'no';
        }

        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['brands'] = $this->shopping_model->get_brand_list();

        $this->load->view('header', $data);
        $this->load->view('products_view');
        $this->load->view('footer');


        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        $this->load->view('header', $data);
        $this->load->view('products_view');
        $this->load->view('footer');
    }

    public function details()
    { // ROUTE: item/{name}/{id}
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['useremail']=$this->shopping_model->get_user($result['user_id']);

        } else {
            $result['logged_in'] = 'no';
            $result['useremail']=NULL;
        }



        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['data'] = $this->category->get_category_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['title'] = "Product Details | Voguish-villa";
        $result['brands'] = $this->shopping_model->get_brand_list();

        $id = $this->uri->segment(3);

        $result['items'] = $this->shopping_model->get_product_list_id($id);
        $result['brands_details'] = $this->shopping_model->get_brand($result['items']->brand_id);
        $result['color_items'] = $this->shopping_model->get_color_list($id);

        $result['review'] = $this->shopping_model->get_review_byid($id);
        foreach ($result['review'] as $key => $review) {
            $result['users'][$key] = $this->shopping_model->get_user_byid($review['user_id']);
        }

        if (!$result) {
            $this->session->set_flashdata('error', 'Item not found.');
            redirect('product_details');
        }

        $this->load->view('header', $result);
        $this->load->view('view_product_details');
        $this->load->view('footer');
    }

    public function review_product()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['data'] = $this->category->get_category_list();
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['logged_in'] = $this->session->userdata('logged_in');
            $result['name'] = $this->session->userdata('username');
            $result['useremail']=$this->shopping_model->get_user($result['user_id']);
            $result['title'] = "Product Review | Voguish-villa";


        } else {
            $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
            redirect('user/login_manager');
        }
        $id = $this->uri->segment(3);
        $result['review'] = $this->shopping_model->get_review_byid($id);
        $result['user'] = $this->shopping_model->get_user_byid($id);
        $result['item'] = $this->shopping_model->get_product_listbyid($id);

        $current_user = $result['user_id'];

        $connection = mysqli_connect('localhost', 'root', '', 'db_voguish-villa');

        $data = array(
            'date' => date('Y-m-d'),
            /* 'time'=>time('')*/
            'user_id' => $this->input->post('user_id'),
            'product_id' => $id,
            'email' => $this->input->post('email'),
            'rating' => $this->input->post('rating'),
            'review' => $this->input->post('textreview'));

        $user_product = $this->shopping_model->getUserProduct($current_user);

        $flag = false;

        foreach ($user_product as $user_product_temp) {
            if ($id == $user_product_temp['product_id']) {
                $flag = true;
            }
        }

        if ($flag) {
            $result = $this->shopping_model->review_update($data);//pass value to model function

        } else {
            $result = $this->shopping_model->review_add($data);//pass value to model function

        }

        $data = $this->recommend_model->getRating($current_user, $id);



        foreach ($data as $dataTemp) {
            $other_itemID = $dataTemp['ItemID'];
            $rating_difference = $dataTemp['rating_difference'];
            if (count($this->shopping_model->getItemID1($id, $other_itemID)) > 0) {
                $this->shopping_model->getUdpateItem($id, $other_itemID, $rating_difference);
                if ($id != $other_itemID) {
                    $this->shopping_model->getUdpateItem1($id, $other_itemID, $rating_difference);
                }
            } else {
                $this->shopping_model->getInsert($id, $other_itemID, $rating_difference);
                if ($id != $other_itemID) {
                    $this->shopping_model->getInsert1($id, $other_itemID, $rating_difference);
                }
            }
        }
        if ($result) {
            redirect('homepage_controller');
        }
    }

    public function wishlist()
    { // ROUTE: item/{name}/{id}

        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = 'no';
            $this->session->set_flashdata('message', 'You are not signed in to add the product in wishlist. Please try again !!!!');
            redirect('user/login_manager');

        }
        $user_id = $this->session->userdata('user_id');

        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['data'] = $this->category->get_category_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['title'] = "Wishlist | Voguish-villa";

        $id = $this->uri->segment(3);

//print_r($this->uri->segment(3));die;
        $result['items'] = $this->shopping_model->get_product_listid($id);
//print_r($result['items']);die;
        if (!$result) {
            $this->session->set_flashdata('error', 'Item not found.');
            redirect('product_details');
        }

        $this->load->view('header', $result);
        $this->load->view('user/wishlist');
        $this->load->view('footer');
    }
    public function addtowishlist()

    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = 'no';
            $this->session->set_flashdata('message', 'You are not signed in to add the product in wishlist. Please try again !!!!');
            redirect('user/login_manager');

        }

        $datas = array(
            'name' => $this->input->post('productname'),
            'user_id' => $this->input->post('user_id'),
            'product_id' => $this->input->post('id'),
            'price' => $this->input->post('price'));//pass category name to model category

        $wishlist = $datas;
        $wishlist = $this->shopping_model->wishlistadd($datas);
        $user_id = $this->session->userdata('user_id');

        $result['mywishlist'] = $this->shopping_model->get_wishlist_listarray($user_id);
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['data'] = $this->category->get_category_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['title'] = "Wishlist | Voguish-villa";

        $id = $this->uri->segment(3);


        $result['items'] = $this->shopping_model->get_product_listid($id);

        if (!$result) {
            $this->session->set_flashdata('error', 'Item not found.');
            redirect('product_details');
        }

        if($wishlist)
        {
            $this->session->set_flashdata('message', 'Product has been added into your wishlists');
            redirect('single_product/mywishlist');
            //          $this->session->set_flashdata('message', 'You are not signed in to add the product in wishlist. Please try again !!!!');

        }


    }
    public function mywishlist()
    {

        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = 'no';
            $this->session->set_flashdata('message', 'You are not signed in to view your wishlists . Please  login  !!!!');
            redirect('user/login_manager');

        }
        $user_id = $this->session->userdata('user_id');
        $result['mywishlist'] = $this->shopping_model->get_wishlist_listarray($user_id);
        $result['product'] = $this->shopping_model->get_product_list_array();

        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['data'] = $this->category->get_category_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['title'] = "MyWishlist | Voguish-villa";

        $id = $this->uri->segment(3);


        $result['items'] = $this->shopping_model->get_product_listid($id);

        if (!$result) {
            $this->session->set_flashdata('error', 'Item not found.');
            redirect('product_details');
        }
        $full = $result['mywishlist'];
        if(!$full)
        {

            $this->load->view('header', $result);
            $this->load->view('user/emptywishlist');
            $this->load->view('footer');
        } else {
            $this->load->view('header', $result);
            $this->load->view('user/mywishlist');
            $this->load->view('footer');

        }
    }
    public function addfromwishlist()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
            $id = $this->uri->segment(3);
            $color_size=$this->input->post('color_size');
            $result_explode = explode('/', $color_size);
            $product_id=$this->input->post('id');
            $result_explode['2']=$product_id;
            $result['color_size_qty']=$this->shopping_model->get_qty_color_size($result_explode);
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
            $user_id = $this->session->userdata('user_id');
            $cartfromwishlist = $this->cart->insert($insert_data);
            if ($cartfromwishlist)
            {
                $delete = $this->items_model->product_deletewishlist($id,$user_id);
                if($delete)
                {
                    $this->session->set_flashdata('message', 'Product has been deleted from wishlist ');

                    redirect('shopping/display_cart');

                }
            }    }else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('user/login_manager');
        }

    }


    public function delete_from_wishlist()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
        } else {
            $result['logged_in'] = 'no';
            $this->session->set_flashdata('message', 'You are not signed in to add the product in wishlist. Please try again !!!!');
            redirect('user/login_manager');

        }
        $result['mywishlist'] = $this->shopping_model->get_wishlist_list_array();

        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['data'] = $this->category->get_category_list();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['title'] = "MyWishlist | Voguish-villa";

        $id = $this->uri->segment(4);


        $result['items'] = $this->shopping_model->get_product_listid($id);

        if (!$result) {
            $this->session->set_flashdata('error', 'Item not found.');
            redirect('product_details');
        }
        $delete = $this->items_model->product_delete_wishlist($id);
        if($delete){
            $this->session->set_flashdata('message', 'Product has been deleted from wishlist');

            redirect('single_product/mywishlist');
        }
    }
    public function delete_product_from_wishlist()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
            $id = $this->uri->segment(3);
            $user_id = $this->session->userdata('user_id');
            $delete = $this->items_model->product_deletewishlist($id,$user_id);
            $this->session->set_flashdata('message', 'Product has been deleted from wishlist ');
            if($delete)
            {
                redirect('single_product/mywishlist');

            }
        }else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('user/login_manager');
        }
    }

    public function delete_all_from_wishlist()
    {
        if ($this->session->userdata('logged_in')) {
            $result['user_id'] = $this->session->userdata('user_id');
            $result['name'] = $this->session->userdata('username');
            $result['logged_in'] = $this->session->userdata('logged_in');
            $id = $this->uri->segment(3);
            $user_id = $this->session->userdata('user_id');
            $delete = $this->items_model->clear_my_wishlist($user_id);
            $this->session->set_flashdata('message', 'Your wishlists has been cleared ');
            if($delete)
            {
                redirect('single_product/mywishlist');

            }
        }else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('user/login_manager');
        }
    }
}

<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('shopping_model');
        $this->load->model('category');

    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $result['name'] = $this->session->userdata('username');
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['category'] = $this->category->get_category_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/product/view_product');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }

    public function add_product_form()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $result['category'] = $this->category->get_category_list();
            $result['brands'] = $this->shopping_model->get_brand_list();
            $result['product_item'] = (object)array(
                'id' => '',
                'name' => '',
                'quantity' => '',
                'price'=>'',
                'brand_id'=>'',
                /*'discount' => '',*/
                'description' => ''
            );
            $this->load->view('admin/header', $result);
            $this->load->view('admin/product/add_new_product');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }

    public function edit_product()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $id = $this->uri->segment(4);
            $result['image_item'] = $this->shopping_model->get_images($id);
            $result['product_item'] = $this->shopping_model->get_product_list_id($id);

            $result['brands'] = $this->shopping_model->get_brand_list();
            $result['category'] = $this->category->get_category_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/product/add_new_product');
            $this->load->view('admin/footer');


        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');

        }
    }
    public function add_colors(){
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $result['category'] = $this->category->get_category_list();
            $id = $this->uri->segment(4);
            $result['product_item'] = $this->shopping_model->get_product_list_id($id);
            $this->load->view('admin/header', $result);
            $this->load->view('admin/product/add_new_colors');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }
    public function edit_colors(){
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $id = $this->uri->segment(4);
            $result['color_item'] = $this->shopping_model->get_color_list_id($id);
            $result['product_item'] = $this->shopping_model->get_product_list_id($id);
            $result['category'] = $this->category->get_category_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/product/add_new_colors');
            $this->load->view('admin/footer');


        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');

        }
    }
    public function submit()
    {
        $id = $this->input->post('id');
        $type =  $this->input->post('type');
        $colors = $this->input->post('color');
        $sizes = $this->input->post('size');
        $qtys = $this->input->post('qty');
        foreach($colors as $a=>$color){
            foreach($sizes as $b=>$size){
                if($a==$b){
                    foreach($qtys as $c=>$qty){
                        if($b==$c){
                            if($type[$a] == 'add') {
                                $data = array(
                                    'product_id' => $id,
                                    'color' => $color,
                                    'size' => $size,
                                    'quantity' => $qty
                                );
                                $result = $this->shopping_model->colors_add($data);
                            }else{
                                $data = array(
                                    'product_id' => $id,
                                    'color' => $color,
                                    'size' => $size,
                                    'quantity' => $qty
                                );
                                $result = $this->shopping_model->colors_update($data,$type[$a]);
                            }
                        }
                    }
                }
            }
        }
        $this->session->set_flashdata('message', 'Product Details addded.');
        redirect('admin/product');

    }

    public function add_product()
    {
        if ($this->session->userdata('logged_in')) {
            $topic['name'] = $this->session->userdata('username');
            $file_name = $_FILES['cover_image']['name'];
            if($file_name == ''){
                $file_name=$this->input->post('cover_image');
            }
            $name = './images/'.$file_name;
            $result = move_uploaded_file($_FILES['cover_image']['tmp_name'], $name);
            foreach ($_FILES['files']['name'] as $image) {
                if ($image == "") {
                    $this->load->helper('url');
                    $slug = url_title($this->input->post('name'), 'dash', TRUE);

                    /*$this->form_validation->set_rules('name', 'name', 'required');
                    $this->form_validation->set_rules('color', 'color', 'required');
                    $this->form_validation->set_rules('qty', 'qty', 'required');
                    $this->form_validation->set_rules('discount', 'discount', 'required');*/

                    /*if ($this->form_validation->run() === FALSE) {
                        $topic = array('topic' => 'form', 'value' => 1);

                        $this->load->view('admin/header', $topic);
                        $this->load->view('admin/product/add_new_product');
                        $this->load->view('admin/footer');

                    } else {*/

                        $ids = array('id' => $this->input->post('id'));
                        $id = $ids['id'];
                        $data = array(
                            'name' => $this->input->post('product_name'),
                            'slug' => $slug,
                            'cover_image' => $file_name,
                            'brand_id'=>$this->input->post('product_brand'),
                            'price'=>$this->input->post('price'),
                            /*'discount' => $this->input->post('product_dis'),*/
                            'cat_id' => $this->input->post('cat_id'),
                            'description' => $this->input->post('product_des'),
                            'timestamp'=>time()

                        );

                        if ($id == "") {
                            $id=$this->shopping_model->product_add($data);
                            redirect('admin/product/add_colors/'.$id);

                        } else {
                            $this->shopping_model->update_product($data, $id);
                            redirect('admin/product/edit_colors/'.$id);
                    }
                } else {

                    $this->load->helper('url');

                    $slug = url_title($this->input->post('title'), 'dash', TRUE);

                    $ids = array('id' => $this->input->post('id'));
                    $id = $ids['id'];


                    $this->load->library('upload');

                    $this->upload->initialize(array(
                        "file_name" => array(),
                        "upload_path" => './images/',
                        "allowed_types" => 'gif|jpg|jpeg|png'
                    ));
                        $data = array(
                            'name' => $this->input->post('product_name'),
                            'slug' => $slug,
                            'cover_image' => $file_name,
                            'brand_id'=>$this->input->post('product_brand'),
                            'price'=>$this->input->post('price'),
                            /*'discount' => $this->input->post('product_dis'),*/
                            'cat_id' => $this->input->post('cat_id'),
                            'description' => $this->input->post('product_des'),
                            'timestamp'=>time()

                        );


                        if (!$this->upload->do_multi_upload("files")) {
                            $error = array('error' => $this->upload->display_errors());
                            $error_msg = $error['error'];
                            $this->session->set_flashdata('message', $error_msg);
                            redirect('admin/product/add_product_form');

                        } else {
                            $images = $this->upload->get_multi_upload_data();
                            if ($id == "") {

                                $id = $this->shopping_model->product_add($data);
                                foreach ($images as $image_name) {
                                    $data_image = array(
                                        'product_id' => $id['id'],
                                        'image' => $image_name['file_name'],
                                    );
                                    $this->shopping_model->set_image($data_image);

                                }
                                redirect('admin/product/add_colors/'.$id['id']);
                            } else {
                                $this->shopping_model->update_product($data, $id);
                                foreach ($images as $image_name) {
                                    $data_image = array(
                                        'product_id' => $id,
                                        'image' => $image_name['file_name'],

                                    );

                                    $this->shopping_model->set_image($data_image);
                                }
                                redirect('admin/product/edit_colors/'.$id);
                            }
                        }
                    }
            }
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');

        }

    }

    public function delete_image()
    {
        if ($this->session->userdata('logged_in')) {
            $image_name = $this->uri->segment(4);
            unlink('images/' . $image_name);
            $delete = $this->shopping_model->delete_image($image_name);
            if ($delete) {
                echo "Success";
            } else {
                echo "Error";
            }
        } else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }

    public function delete_product()
    {
        if ($this->session->userdata('logged_in')) {
            $id = $this->uri->segment(4);

            $result = $this->shopping_model->product_delete($id);//pass value to model function

            $this->session->set_flashdata('message', 'Your Product has been deleted');
            redirect('admin/product');
        } else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }

    public function featured_product()
    {
        if ($this->session->userdata('logged_in')) {
            $id = $this->uri->segment(4);
            $result = $this->shopping_model->get_product_list_id($id);//pass value to model function
            if ($result->featured == 'no') {
                $status = array(
                    'featured' => 'yes'
                );
            } else {
                $status = array(
                    'featured' => 'no'
                );
            }
            $this->shopping_model->update_product($status, $id);
            $this->session->set_flashdata('message', 'Your Product status has been changed');
            redirect('admin/product');
        } else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }

}

<?php

class Brand_manager extends CI_Controller
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
            $result['brands'] = $this->shopping_model->get_brand_list();
            $this->load->view('admin/header', $result);
            $this->load->view('admin/brands/view_brand');
            $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }
    public function add()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $result['brands'] = array(
                'id' => '',
                'name' => '',
                'description'=>''
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
                    'name'=> $this->input->post('brand_name'),
                    'description'=>$this->input->post('description')
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
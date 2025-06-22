<?php

class Category_manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in'))
        {
            $username['name'] = $this->session->userdata('username');
            $this->load->view('admin/header',$username);
            $this->load->view('admin/admin_page');
            $this->load->view('admin/footer');
        } else {

         $this->session->set_flashdata('message', 'You are not logged in.Please log in');
         redirect('admin/login_manager');
         }
    }

    public function add_category_form()
    {
        if ($this->session->userdata('logged_in'))
        {
        $result['category'] = $this->category->get_category_list();
        $result['name'] = $this->session->userdata('username');
        $result['type'] = "new";
        $this->load->view('admin/header',$result);
        $this->load->view('admin/category/add_new_category');
        $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }
    }


    public function cat_table()
    {
         if ($this->session->userdata('logged_in'))
         {
             $result['name'] = $this->session->userdata('username');
             $result['category'] = $this->category->get_category_list();

             $this->load->view('admin/header', $result);
             $this->load->view('admin/category/view_category');
             $this->load->view('admin/footer');
        } else {

            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/login_manager');
        }

    }

    public function add_category()
    {
        if ($this->session->userdata('logged_in')) {
            $value= $this->input->post('cat_id');
            $id =  $this->input->post('id');
            if ($value=="root") {
                $data = array(
                    'name' => $this->input->post('category_name'),
                    'parent_id' => '0'
            ); //pass category name to model category

            }
            else
            {
                $data=array (
                    'name'=> $this->input->post('category_name'),
                    'parent_id'=>$this->input->post('cat_id')
                );

            }
            if ($id=="") {
                $result = $this->category->category_add($data);//pass value to model function
            }else {
                $result = $this->category->category_update($data,$id);
            }
            if ($result) {
                redirect('admin/category_manager/cat_table');
            }

        } else {
             $this->session->set_flashdata('message', 'You are not logged in.Please log in');
             redirect('admin/login_manager');
         }

    }


    public function edit_category()
    {
        if ($this->session->userdata('logged_in')) {
            $result['name'] = $this->session->userdata('username');
            $id = $this->uri->segment(4);
            $result['category_details'] = $this->category->get_category($id);
            $result['category'] = $this->category->get_category_list();
            $this->load->view('admin/header',$result);
            $this->load->view('admin/category/add_new_category');
            $this->load->view('admin/footer');


         } else {

             $this->session->set_flashdata('message', 'You are not logged in.Please log in');
             redirect('admin/login_manager');

         }
    }


    public function delete_image()
    {
        //if ($this->session->userdata('logged_in')) {
        $image_name = $this->uri->segment(4);
        unlink('images/' . $image_name);
        $delete = $this->category->delete_image($image_name);
        if ($delete) {
            echo "Success";
        } else {
            echo "Error";
        }
        /*} else {
            $this->session->set_flashdata('message', 'You are not logged in.Please log in');
            redirect('admin/news_manager/login');
        }*/
    }

    public function set_flag()
    {
        //if ($this->session->userdata('logged_in')) {
        $id = $this->uri->segment(4);
        $name = $this->uri->segment(5);
        $result['news'] = $this->news->get_news_item($id);
        if ($result['news'][$name] == "on") {
            $data = array(
                $name => "off"
            );
            $set_news = $this->news->publish_news($id, $data);
        } else {
            $data = array(
                $name => "on"
            );
            $set_news = $this->news->publish_news($id, $data);
        }
        if ($set_news) {
            echo "Success";

        } else {
            echo "Error";
        }
        /* } else {
             $this->session->set_flashdata('message', 'You are not logged in.Please log in');
             redirect('admin/news_manager/login');
         }*/
    }

    public function set_publish()
    {
        //if ($this->session->userdata('logged_in')) {
        $id = $this->uri->segment(4);
        $result['news'] = $this->news->get_news_item($id);
        $data = array(
            'publish' => 'off'
        );
        $set_news = $this->news->publish_news($id, $data);
        $a = array(
            'status' => 'Success',
            'action' => 'off'
        );
        if ($set_news) {
            echo json_encode($a);
        } else {
            echo "Error";
        }
        /* } else {
             $this->session->set_flashdata('message', 'You are not logged in.Please log in');
             redirect('admin/news_manager/login');
         }*/
    }


    public function delete_category()
    {
        if ($this->session->userdata('logged_in')) {
            $id = $this->uri->segment(4);
            $this->category->category_delete($id);
            $this->session->set_flashdata('message', 'Category Deleted ');
            redirect('admin/category_manager/cat_table');

        }else {
             $this->session->set_flashdata('message', 'You are not logged in.Please log in');
             redirect('admin/login_manager');
         }
    }


}

<?php

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('shopping_model');
        $this->load->model('category'); 
        $this->load->model('items_model');
        $this->load->model('signin');

             $this->load->model('billing_model');
        $this->load->library('cart');
        $this->load->helper(array('form', 'url'));
    
    }

    public function index()
    {if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Account settings | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }
 //$user_id  = $this->session->userdata('user_id');
 //$just = $this->input->post('user_id');
        
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['brands'] = $this->shopping_model->get_brand_list();

        $user_id = $this->session->userdata('user_id');     
         $result['user'] = $this->category->get_user_listid($user_id);
         $id = $this->uri->segment(3);
           
        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        $this->load->view('header', $result);
        $this->load->view('user/myaccount');
        $this->load->view('footer');
    }

public function password()

{
    if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Password | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }

     
        $user_id = $this->session->userdata('user_id');     
         $result['user'] = $this->category->get_user_listid($user_id);
         $id = $this->uri->segment(3);
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
       // $result['image_item'] = $this->shopping_model->get_images_list();
        // $result['brands'] = $this->shopping_model->get_brand_list();
     //   $result['user'] = $this->category->get_user_listid();
         
       // $result['user'] = $this->

        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        $this->load->view('header', $result);
        $this->load->view('user/password');
        $this->load->view('footer');
    }
 /*   public function change_password()
    {
           if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Password | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }
        $result['items'] = $this->shopping_model->get_product_list();
             
        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        $user_id = $this->session->userdata('user_id');     
        // $result['user'] = $this->category->get_user_listid($user_id);
         //$id = $this->uri->segment(3);
        
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
       // $result['image_item'] = $this->shopping_model->get_images_list();
        // $result['brands'] = $this->shopping_model->get_brand_list();
      //  $result['user'] = $this->category->get_user_listid();
       //   $user_id  = $this->uri->segment(3);
       $real = $this->input->post('realpassword');
        $old = $this->input->post('oldpassword');
        $new = $this->input->post('newpassword');
        
        $conform = $this->input->post('conformpassword');
            if ($real === $old)
         {
            if($new === $conform)
            {

             $datas = array(
            'address' => $this->input->post('newpassword'));
              $change = $this->shopping_model->update_password($datas, $newpassword);
                if($change)
                        {
                            redirect('user/account');
                        } 

                        else            
                        {
                            $this->load->view('header', $result);
                            $this->load->view('user/password');
                            $this->load->view('footer');
                        }
            }

                        else            
                        {
                            $this->load->view('header', $result);
                            $this->load->view('user/password');
                            $this->load->view('footer');
                        }

        }
         
    
        }

        */

public function account_info()
{
     if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Password | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }
     $user_id = $this->session->userdata('user_id');     
   
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
       // $result['image_item'] = $this->shopping_model->get_images_list();
        // $result['brands'] = $this->shopping_model->get_brand_list();
          $result['user'] = $this->category->get_user_listid($user_id);
        $user_id  = $this->uri->segment(3);
         
       // $result['user'] = $this->

        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        $this->load->view('header', $result);
        $this->load->view('user/account_infos');
        $this->load->view('footer');
      }


  public function modifypassword(){
    if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Account settings | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }
 //$user_id  = $this->session->userdata('user_id');
 //$just = $this->input->post('user_id');
        
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['brands'] = $this->shopping_model->get_brand_list();
        $user_id = $this->session->userdata('e-mail');
echo $user_id;
        $user_id = $this->session->userdata('user_id');     
         $result['user'] = $this->category->get_user_listid($user_id);
         $id = $this->uri->segment(3);
           
        $result['page_title'] = 'All Items';

        $result['items'] = $this->shopping_model->get_product_list();
        
    $result['title'] = 'Change Password';
    $sessionData = $this->session->userdata('logged_in');
   //$result['user_id'] = $sessionData['user_id'];
    //$result['username'] = $sessionData['username'];
   //     $result['type'] = $sessionData['type'];

  $this->load->view('header', $result);
    $this->load->view('change_password');
    $this->load->view('footer');
  }


  public function change(){
    if ($this->session->userdata('logged_in')) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['name'] = $this->session->userdata('username');

        $result['title'] = "Account settings | Voguish-villa";


    } else {
        $this->session->set_flashdata('message', 'You are not signed in. Please try again !!!!');
        redirect('user/login_manager');
    }
 //$user_id  = $this->session->userdata('user_id');
 //$just = $this->input->post('user_id');
        
        // $result['data'] = $this->category->get_category_list();
        //$result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['brands'] = $this->shopping_model->get_brand_list();

        $user_id = $this->session->userdata('user_id');     
         $result['user'] = $this->category->get_user_listid($user_id);
         $id = $this->uri->segment(3);
           
        $result['page_title'] = 'All Items';

    $this->form_validation->set_rules('old_password', 'Password', 'trim|required|xss_clean');
    $this->form_validation->set_rules('newpassword', 'New Password', 'required|matches[re_password]');
    $this->form_validation->set_rules('re_password', 'Retype Password', 'required');
    if($this->form_validation->run() == FALSE){
       $result['title'] = 'Change Password';
        $sessionData = $this->session->userdata('logged_in');
       // $result['user_id'] = $sessionData['id'];
    //    $result['username'] = $sessionData['username'];
      //  $result['type'] = $sessionData['type'];

        $this->load->view('header', $result);
        $this->load->view('change_password');
        $this->load->view('footer');
    }else{
      $query = $this->items_model->checkOldPass($this->input->post('old_password'));
      if($query){
        $query1 = $this->items_model->saveNewPass($this->input->post('newpassword'));
        if($query1){


          redirect('user/account/account');
        }else{
          redirect('user/account/modifypassword');
        }
      }

    }
  }
  public function modify_account()
  {

            // Including Validation Library
       
        $this->load->library('form_validation');
        // Displaying Errors In Div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     
        $this->load->helper('url');
     
        $_POST = array();
       

        
        // Validation For Name Field
        $this->form_validation->set_rules('named', 'Username', 'required|min_length[5]|max_length[15]');
        // Validation For Email Field
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // Validation For Address Field
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[5]|max_length[50]');
        // Validation For Telephone No Field
        $this->form_validation->set_rules('phone_no', 'TelePhone No', 'required');
        // Validation For City Field
        $this->form_validation->set_rules('city', 'City', 'required|min_length[5]|max_length[500]');
        // Validation For Town Field
        $this->form_validation->set_rules('town', 'Town', 'required|min_length[5]|max_length[500]');
        // Validation For Postal Code Field
        $this->form_validation->set_rules('postalcode', 'Postal Code', 'required');
        
        
        //    $name=strtolower($this->input->post('name'));

                    $form_get = array(
            'name' => $this->input->post('name'),
  //          'password' => $this->input->post('password'),
          'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
        
            'phone_no' => $this->input->post('phone_no'),
            'city' => $this->input->post('city'),
            'town' => $this->input->post('town'),
            'postalcode' => $this->input->post('postalcode'),
      
      //      'gender' => $this->input->post('gender')
        
        );
if ($this->form_validation->run() == FALSE) {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['name'] = $this->session->userdata('username');
        $result['logged_in'] = $this->session->userdata('logged_in');
//  

     $user_id = $this->session->userdata('user_id');     
        $result['user'] = $this->category->get_user_listid($user_id);
        
            ////signup gareko person ko name pathauna baaki
            $result['data']=$this->category->get_category_list();
            $result['product']=$this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['title'] = "Login | Voguish-villa";
            $result['logged_in'] = 'yes';
            $this->load->view('header',$result);
            $this->load->view('user/account_infos',$result);
            $this->load->view('footer',$result);

        } else
        { $this->load->model('signin');

            $data_get['login_data'] = $this->signin->username($form_get['email'], $form_get['password']);
            if ($data_get['login_data']) {
                foreach ($data_get['login_data'] as $row) {
                    $data_array = array(
                        'user_id' => $row['user_id'],
                        'username' => $row['name'],

                        'logged_in' => 'yes'
                    );
                }

                $this->session->set_userdata($data_array);
                redirect('homepage_controller/user_loggedin');
}


  }




}
}

   
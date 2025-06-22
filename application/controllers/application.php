<?php
class Application extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('shopping_model');

    }
    function index()
    {
    $data[title]="Search|Voguish-villa";
        $data['extraHeadContent']='<script type="text/javascript" src="'.base_url().'/js/function_search.js"></script>';

        $this->load->view( 'header', $data );
        $this->load->view('index',$data);
        $this->load->view( 'footer');
    }
    function ajaxsearch(){
        $name=$this->input->post('name');
        $description =$this->input->post('description');
        echo $this->shopping_model->getSearchResults($name,$description);
    }
    function search()
    {
        $data[title]="codeigniter search result";
        $name=$this->input->post('name');
        $data['search_results']=$this->shopping_model->getSearchResults(name);
        $this->load->view( 'header', $data );
        $this->load->view('search',$data);
        $this->load->view( 'footer');
    }

}
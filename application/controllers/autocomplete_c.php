<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete_c extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('autocomplete_m');

        $this->load->helper(array('form', 'url'));
    }
    /*public function index(){
        $this->load->view('autocomplete_v');
    }*/

    public function getUserEmail()
    {

        if ( !isset($_GET['term']) )
            exit;
        $term = $_REQUEST['term'];
        $data = array();
        $rows = $this->autocomplete_m->getUser($term);
        foreach( $rows as $row )
        {
            $data[] = array(
                'label' => $row->name,
                'value' => $row->name);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
        }
        echo json_encode($data);
        flush();

    }
}
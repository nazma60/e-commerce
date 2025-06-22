<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Autocomplete_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    function getUser($term)
    {
        $sql = $this->db->query('select * from tbl_product where name like "%'. mysql_real_escape_string($term) .'%" order by name asc limit 0,10');

        return $sql ->result();
    }
}
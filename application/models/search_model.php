<?php

class Search_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function getSearchResult($query)
    {

        $sql = "SELECT P.*
				FROM `tbl_product` P
				JOIN `tbl_category` CAT ON CAT.`id` = P.`cat_id`
				WHERE P.`name` LIKE '%$query%' OR P.`description` LIKE '%$query%'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}
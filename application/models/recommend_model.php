<?php

class Recommend_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function getUserRating($current_user)
    {
        $sql = "SELECT product_id FROM `tbl_review` where user_id = $current_user";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
    public function getData()
    {

        $sql = "SELECT P.customer_id, CAT.product_id
				FROM `tbl_order` P
				INNER JOIN `tbl_orderdetails` CAT ON CAT.`order_id` = P.`serial`";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
    public function getCustomer()
    {

        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }
    public function getProduct()
    {
        //$this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_product');
        return $query->result_array();
    }

    public function getRating($userID,$itemID)
    {
        $sql = "SELECT DISTINCT r.product_id as ItemID, r2.rating - r.rating
                     as rating_difference
                     FROM tbl_review r, tbl_review r2
                     WHERE r.user_id = $userID AND
                     r2.product_id = $itemID AND
                     r2.user_id = $userID";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getdbResult($userID=1, $itemID)
    {

        $sql = "SELECT r.product_id as itemID, r.rating as ratingValue FROM tbl_review r WHERE r.user_id = $userID AND r.product_id <> $itemID";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getCountResult($k, $j)
    {

        $sql = "SELECT d.count , d.sum FROM dev d WHERE itemID1 = $k AND itemID2 = $j";

        $query = $this->db->query($sql);

        return $query->result_array();
    }


}
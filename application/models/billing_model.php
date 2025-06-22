<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    // Get all details ehich store in "products" table in database.
    public function get_all()
    {
        $query = $this->db->get('tbl_product');
        return $query->result_array();
    }

    // Insert customer details in "customer" table in database.
    public function add_customer($id, $data)
    {
        $cond = array(
            'user_id' => $id
        );

        $query = $this->db->update('tbl_user', $data, $cond);
        //$id = $this->db->insert_id();
        return $query;
    }

    public function add_contact($data)
    {

        $query = $this->db->insert('tbl_contact', $data);
        //$id = $this->db->insert_id();
        return $query;
    }
    // Insert order date with customer id in "orders" table in database.
    public function add_order($data)
    {
        $this->db->insert('tbl_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    // Insert ordered product detail in "order_detail" table in database.
    public function add_order_detail($data)
    {
        $query =$this->db->insert('tbl_orderdetails', $data);
        return $query;
    }

}
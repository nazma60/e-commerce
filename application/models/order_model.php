<?php

class Order_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function get_order_list(){
        return $this->db->get('tbl_order')->result();
    }
    public function get_ship_list(){
        return $this->db->get_where('tbl_order',array('shipping_status'=>"shipped"))->result_array();
    }
    public function get_user_list(){
        return $this->db->get('tbl_user')->result();
    }
    public function add_shipping_info($ship)
    {
               $query = $this->db->insert('tbl_shipping_info', $ship);
        //$id = $this->db->insert_id();
        return $query;
    }
    public function get_pending(){

        $sql = "UPDATE tbl_order SET shipping_status='pending'
        WHERE shipping_status= ' '";
        $this->db->query($sql);
        $query=$this->db->get_where('tbl_order',array('shipping_status'=>"pending"));
       return $query  ->result_array();
    }
    public function update_order($id,$new){
        $cond = array(
            'serial' => $id
        );

        $query = $this->db->update('tbl_order', $new, $cond);

        return $query;
    }
    public function get_product_list(){
        return $this->db->get('tbl_product')->result();
    }

    public function brand_add($data){
        $query = $this->db->insert('tbl_brands', $data);
        return $query;
    }
    public function get_orderdetails($query)
    {
        $sql = "SELECT product_id, quantity, price
				FROM `tbl_order` O
				INNER JOIN `tbl_orderdetails` OD ON OD.`order_id` = O.`serial`";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
    public function get_orderdetailsbyid($id)
    {
        $query = $this->db->get_where('tbl_orderdetails', array('order_id'=> $id));
        return $query->result_array();
    }
    public function brand_update($data,$id){
        $cond = array(
            'id' => $id
        );
        $query = $this->db->update('tbl_brands', $data, $cond);
        return $query;
    }
    public function get_brand($id)
    {
        $query = $this->db->get_where('tbl_brands', array('id'=> $id));
        return $query->row_array();
    }

    public function brand_delete($id)
    {
        $query = $this->db->delete('tbl_brands', array('id' => $id));
        return $query;
    }

}

<?php

class Shopping_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function get_product_list()
    {
        $this->db->order_by("id", "desc");
        return $this->db->get('tbl_product')->result();
    }
    public function get_user_email($id)
    {    $r = $this->db->where('user_id', $id)->get('tbl_user');
        return $r->result_array();
    }
    public function get_product_list_array()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_product');
        return $query->result_array();
    }

    public function get_product_list_id($id)
    {
        $r = $this->db->where('id', $id)->get('tbl_product')->result();
        if ($r) return $r[0];
        return false;
    }

    public function get_product_listbyid($id)
    {
        $r = $this->db->where('id', $id)->get('tbl_product');
        return $r->result_array();
        /*  if ($r) return $r[0];
          return false;*/
    }

    public function get_review_byid($id)
    {
        $r = $this->db->where('product_id', $id)->get('tbl_review');
        return $r->result_array();
        /*  if ($r) return $r[0];
          return false;*/
    }

    public function get_user_byid($id)
    {
        $r = $this->db->where('user_id', $id)->get('tbl_user');
        return $r->row_array();
        /*  if ($r) return $r[0];
          return false;*/
    }
    public function get_user($id)
    {    $r = $this->db->where('user_id', $id)->get('tbl_user');
        return $r->result_array();
    }
    public function get_user_byid_review($id)
    {
        $r = $this->db->where('user_id', $id)->get('tbl_review');
        return $r->row_array();
        /*  if ($r) return $r[0];
          return false;*/
    }

    public function review_add($data)
    {
        $r = $this->db->insert('tbl_review', $data);
        return $r;
    }
    public function review_update($data)
    {
        $r = $this->db->update('tbl_review', $data);
        return $r;
    }

    public function getUserProduct($id)
    {

        $sql = $this->db->where('user_id', $id)->get('tbl_review');
        return $sql->result_array();
    }

    public function get_product_array_id($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where('tbl_product', array('brand_id' => $id));
        return $query->result_array();
    }

    public function get_product_array_cat_id($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where('tbl_product', array('cat_id' => $id));
        return $query->result_array();
    }

    public function customer_add($data)
    {
        $query = $this->db->insert('tbl_customer', $data);
        return $query;
    }

    /* public function address_add($data)
     {
         $query = $this->db->insert('tbl_address', $data);
         return $query;
     }*/

    public function product_add($data)
    {
        $this->db->insert('tbl_product', $data);
        $this->db->select('id');
        $this->db->from('tbl_product');
        $this->db->where('name', $data['name']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function set_image($data_image)
    {
        return $this->db->insert('tbl_images', $data_image);
    }

    public function get_images($id)
    {
        $query = $this->db->get_where('tbl_images', array('product_id' => $id));
        return $query->result_array();
    }

    public function get_images_list()
    {
        $query = $this->db->get_where('tbl_images');
        return $query->result_array();
    }

    public function delete_image($image_name)
    {
        return $this->db->delete('tbl_images', array('image' => $image_name));
    }

    public function update_product($data, $id)
    {
        $cond = array(
            'id' => $id
        );
        $query = $this->db->update('tbl_product', $data, $cond);
        return $query;
    }

    public function product_delete($data)
    {
        $query = $this->db->delete('tbl_product', array('id' => $data));
        return $query;
    }

    public function get_customer_list()
    {
        $query = $this->db->get('tbl_customer');
        return $query->result_array();
    }

    public function setup_payment($item_id, $email, $key)
    {
        $data = array(
            'item_id' => $item_id,
            'key' => $key,
            'email' => $email,
            'active' => 0 // hasn't been purchased yet
        );
        $this->db->insert('purchases', $data);
    }

    public function confirm_payment($key, $paypal_email)
    {
        $data = array(
            'purchased_at' => time(),
            'active' => 1,
            'paypal_email' => $paypal_email,

        );
        $this->db->where('key', $key);
        $this->db->update('purchases', $data);
    }

    public function get_purchase_by_key($key)
    {
        $r = $this->db->where('key', $key)->get('purchases')->result();
        if ($r) return $r[0];
        return false;
    }

    public function get_brand_list()
    {
        return $this->db->get('tbl_brands')->result();
    }

    public function brand_add($data)
    {
        $query = $this->db->insert('tbl_brands', $data);
        return $query;
    }

    public function brand_update($data, $id)
    {
        $cond = array(
            'id' => $id
        );
        $query = $this->db->update('tbl_brands', $data, $cond);
        return $query;
    }

    public function get_brand($id)
    {
        $query = $this->db->get_where('tbl_brands', array('id' => $id));
        return $query->row_array();
    }

    public function brand_delete($id)
    {
        $query = $this->db->delete('tbl_brands', array('id' => $id));
        return $query;
    }

    public function get_color_list_id($id)
    {
        $query = $this->db->get_where('tbl_color_size', array('product_id' => $id));
        return $query->result_array();
    }

    public function colors_add($data)
    {
        $query = $this->db->insert('tbl_color_size', $data);
        return $query;
    }

    public function colors_update($data, $id)
    {
        $cond = array(
            'id' => $id
        );
        $query = $this->db->update('tbl_color_size', $data, $cond);
        return $query;
    }

    public function get_color_list($id)
    {
        $query = $this->db->get_where('tbl_color_size', array('product_id' => $id));
        return $query->result_array();
    }

    public function get_qty_color_size($arrays)
    {
        $this->db->select('id');
        $this->db->select('product_id');
        $this->db->select('quantity');
        $this->db->from('tbl_color_size');
        $this->db->where('color', $arrays['0']);
        $this->db->where('size', $arrays['1']);
        $this->db->where('product_id', $arrays['2']);
        $query = $this->db->get();
        return $query->row_array();

    }

    public function update_color_qty($data, $id)
    {
        $cond = array(
            'id' => $id
        );
        $query = $this->db->update('tbl_color_size', $data, $cond);
        return $query;
    }
    public function wishlist_add($data){
        $query=$this->db->insert('tbl_wishlist',$data);
        return $query;
    }
    public function wishlistadd($data)
    {
        $this->db->insert('tbl_wishlist', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function get_review_list_array()
    {
        $query = $this->db->get('tbl_review');
        return $query->result_array();
    }
    public function get_product_listid($id) {
        $query = $this->db->get_where('tbl_product',array('id' => $id));
        return $query->result_array();
    }
    public function get_wishlist_list_array()
    {
        $query = $this->db->get('tbl_wishlist');
        return $query->result_array();
    }
    public function get_wishlist_listarray($user_id)
    {
        $query = $this->db->get_where('tbl_wishlist', array('user_id'=> $user_id));
        return $query->result_array();
    }

    public function getItemId1($itemID,$other_id)
    {
        $sql = "SELECT itemID1 FROM dev WHERE itemID1 = $itemID AND itemID2 = $other_id";

        $query = $this->db->query($sql);

        return $query->result_array();


    }

    public function getUdpateItem($id, $other_id,$rating_difference)
    {

        $sql = "UPDATE dev SET count = count + 1, sum = sum + $rating_difference WHERE itemID1 = $id AND itemID2 = $other_id";

         $query = $this->db->query($sql);

    }

    public function getUpdateItem1($id, $other_id, $rating_difference)
    {
       $sql = "UPDATE dev SET count = count + 1, sum = sum - $rating_difference WHERE (itemID1 = $other_id AND itemID2 = $id)";

        $query = $this->db->query($sql);
    }

    public function getInsert($id,$other_id,$rating_difference)
    {

        $sql = "INSERT INTO dev VALUES ($id, $other_id,1,$rating_difference)";
        $query = $this->db->query($sql);
    }

    public function getInsert1($id, $other_id, $rating_difference)
    {

        $sql = "INSERT INTO dev VALUES ($other_id, $id, 1, -$rating_difference)";
        $query = $this->db->query($sql);
    }

}


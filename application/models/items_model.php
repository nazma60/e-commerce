<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function get_all() {
        return $this->db->get( 'tbl_product' )->result();
    }
    public function get( $id ) {
        $r = $this->db->where( 'id', $id )->get( 'tbl_product' )->result();
        if ( $r ) return $r[0];
        return false;
    }
    public function get_order_id($id)
    { $r = $this->db->where( 'serial', $id )->get( 'tbl_order' )->result();
        if ( $r ) return $r[0];
        return false;
    }
    public function product_delete_wishlist($id){
        $query=$this->db->delete('tbl_wishlist', array('product_id' => $id));
        return $query;
    }
    public function product_deletewishlist($id,$user_id){
        $query=$this->db->delete('tbl_wishlist', array('product_id' => $id , 'user_id'=> $user_id));
        return $query;
    }
    public function clear_my_wishlist($user_id){
        $query=$this->db->delete('tbl_wishlist', array('user_id'=> $user_id));
        return $query;
    }
    public function setup_payment( $order_id, $email, $key ) {
        $data = array(
            'order_id'  => $order_id,
            'key'      => $key,
            'email'    => $email,
            'active'   => 0 // hasn't been purchased yet
        );
        $this->db->insert( 'purchases', $data );
    }
    public function confirm_payment( $key, $paypal_email) {
        $data = array(
            'purchased_at'  => time(),
            'active'        => 1,
            'paypal_email'  => $paypal_email,

        );
        $this->db->where( 'key', $key );
        $this->db->update( 'purchases', $data );
    }

    public function get_purchase_by_key( $key ) {
        $r = $this->db->where( 'key', $key )->get( 'purchases' )->result();
        if ( $r ) return $r[0];
        return false;
    }

}
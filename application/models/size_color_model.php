<?php

class Size_color_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    public function get_size_list(){
        return $this->db->get('tbl_order')->result();
    }
    public function get_color_list(){
        return $this->db->get('tbl_user')->result();
    }

    public function brand_add($data){
        $query = $this->db->insert('tbl_brands', $data);
        return $query;
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

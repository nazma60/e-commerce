<?php

class Category extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function category_add($data){
        $query=$this->db->insert('tbl_category',$data);
        return $query;
    }

    public function category_update($data,$id){
        $cond=array(
            'id'=>$id
        );
        $query=$this->db->update('tbl_category',$data,$cond);
        return $query;
    }

    public function get_category_list(){
        $query=$this->db->get('tbl_category');
        return $query->result_array();
    }
    public function get_category($id){
        $query=$this->db->get_where('tbl_category',array('id' => $id));
        return $query->row_array();
    }
    public function get_subcategory($id){
        $query=$this->db->get_where('tbl_category',array('parent_id' => $id));
        return $query->result_array();
    }
    public function category_delete($id){
        $query=$this->db->delete('tbl_category', array('id' => $id));
        return $query;
    }




       public function get_image_item($id){
        $query = $this->db->get_where('content_images', array('news_id'=> $id));
        return $query->result_array();
    }





}
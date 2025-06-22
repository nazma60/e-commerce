<?php
class Function_model extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();

    }
    function getSearchResults($name, $description= TRUE){
        $this->db->like('name',$name);
        $this->db->orderby('name');
        $query=$this->db->get('tbl_product');
        if($query->num_rows()>0){
            $output = '<ul>';
            foreach($query->result()as $function_info){
                if($description){
                    $output.='<li><strong>'.$function_info->name.'</strong><br />';
                    $output.=$function_info->description.'</li>';
                }
                else{
                    $output.='<li>'. $function_info->name . '</li>';
                }
            }
            $output.='</ul>';
            return $output;
        }else{
            return'<p>sorry no results returned.</p>';
        }

    }
}

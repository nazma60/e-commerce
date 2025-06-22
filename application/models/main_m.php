<?php
class main_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($title, $url)
	{
		$this->db->set('title', $title);
		$this->db->set('image', $url);
		$query=$this->db->insert('tbl_images');
		return $query;
		/*if ($query) {
			return true;
					}
		else{return false;}*/
	}
}

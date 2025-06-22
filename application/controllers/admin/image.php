<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
		$this->load->model('main_m');
    }

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/main');
		$this->load->view('admin/footer');
	}
	public function save()
	{
		$url = $this->do_upload();
		$title = $_POST["title"];
		$result=$this->main_m->save($title, $url);
		if($url && $result)
		{
			echo ("Upload success");
		}
		else
		{
			echo ("Upload error!!!");
		}

	}
	private function do_upload()
	{
		$type = explode('.', $_FILES["pic"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = uniqid(rand()).'.'.$type;
		$pathname="./images/".$url;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$pathname))
					return $url;
		return "";


	}
}

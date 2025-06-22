<?php

class Signin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_username($username, $password)
    {
        $this->db->select('admin_name');

        $this->db->from('tbl_admin_login');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();


        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }

    }
    public function sign_up($data,$email)
    {
        $this->db->insert('tbl_user',$data);

        $this->db->select('user_id');
        $this->db->select('name');
        $this->db->from('tbl_user');
        $this->db->where('email',$email);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function username($email, $password)
    {
        $this->db->select('name');
        $this->db->select('user_id');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();


        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }

    }
}
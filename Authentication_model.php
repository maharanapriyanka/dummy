<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {


	public function register_model($data)
	{
		$this->db->insert($this->creadential,$data);
		return $this->db->insert_id();

	}

	public function login_model($email,$password){
		$this->db->where->('email',$email);
		$query=$this->db->get($this->creadential);
		if($query->num_row()){
			$user_password=$query->row('password');
			if(md5($password) === $user_password)
			{
				return $query->row();
			}
			return FALSE;
		}
		else{
			return FALSE;
		}

	}	
	
	
}
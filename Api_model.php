<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {


	function fetch_all()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('product');
	}

	function insert_api($data)
	{
		$this->db->insert('product', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function fetch_single_user($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get('product');
		return $query->result_array();
	}
	function update_api($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("product", $data);
	}

	function delete_single_user($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("product");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}



}
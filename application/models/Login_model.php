<?php

class Login_model extends CI_Model{

	function get_user($us){
		return $this->db->where('username',$us)->get('tbl_user');
	}
}
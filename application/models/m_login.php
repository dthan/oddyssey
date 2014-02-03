<?php
	class M_login extends CI_Model {

		function cek_login($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get('user');
			
		}

		function cek_login2($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get('pelanggan');
			
		}
}
<?php

class M_profil extends CI_Model{

	function update_profil($isi){		
		return $this->db->query("update profil set isi='".$isi."' ");
	}

	function get_profil(){
		return $this->db->get('profil');
	}

	
}
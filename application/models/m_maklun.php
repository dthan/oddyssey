<?php

class M_maklun extends CI_Model{

	function get_maklun_all(){		
		return $this->db->get('maklun');
	}

	function get_maklun_selected($id){
		$this->db->where('id_maklun',$id);
		return $this->db->get('maklun');
	}

	function get_gambar($id){
		$this->db->where('id_maklun',$id);
		return $this->db->get('gambar_maklun');
	}

	function get_maklun(){
		return $this->db->get('maklun');
	}

	function cek_maklun($id){
       $this->db->where('id_maklun',$id);
       $q=$this->db->get('maklun');
       if($q->num_rows()>0){
       	 return "ada";
       }
       else {
       	 return "tidak";
       }
	}

	function input_maklun($data){
       return $this->db->insert('maklun',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_maklun',$data);
	}

	function update_maklun($data,$id){
		$this->db->where('id_maklun', $id);
		return $this->db->update('maklun', $data); 
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_maklun set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_maklun',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_maklun');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_maklun', $id);
		$this->db->delete('maklun'); 
	}

}
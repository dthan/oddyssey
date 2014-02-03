<?php

class M_toko extends CI_Model{

	function get_toko_all(){		
		return $this->db->get('toko');
	}

	function get_toko_selected($id){
		$this->db->where('id_toko',$id);
		return $this->db->get('toko');
	}

	function get_gambar($id){
		$this->db->where('id_toko',$id);
		return $this->db->get('gambar_toko');
	}

	function get_toko(){
		return $this->db->get('toko');
	}

	function cek_toko($id){
       $this->db->where('id_toko',$id);
       $q=$this->db->get('toko');
       if($q->num_rows()>0){
       	 return "ada";
       }
       else {
       	 return "tidak";
       }
	}

	function input_toko($data){
       return $this->db->insert('toko',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_toko',$data);
	}

	function update_toko($data,$id){
		$this->db->where('id_toko', $id);
		return $this->db->update('toko', $data); 
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_toko set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_toko',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_toko');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_toko', $id);
		$this->db->delete('toko'); 
	}

}
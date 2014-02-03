<?php

class M_jasa_pengiriman extends CI_Model{

	function get_jasa_pengiriman_all(){		
		return $this->db->get('jasa_pengiriman');
	}

	function get_jasa_pengiriman_selected($id){
		$this->db->where('id_jasa_pengiriman',$id);
		return $this->db->get('jasa_pengiriman');
	}

	function get_gambar($id){
		$this->db->where('id_jasa_pengiriman',$id);
		return $this->db->get('jasa_pengiriman');
	}

	function get_jasa_pengiriman(){
		return $this->db->get('jasa_pengiriman');
	}

	function cek_jasa_pengiriman($id){
       $this->db->where('id_jasa_pengiriman',$id);
       $q=$this->db->get('jasa_pengiriman');
       if($q->num_rows()>0){
       	 return "ada";
       }
       else {
       	 return "tidak";
       }
	}

	function input_jasa_pengiriman($data){
       return $this->db->insert('jasa_pengiriman',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_jasa_pengiriman',$data);
	}

	function update_jasa_pengiriman($data,$id){
		$this->db->where('id_jasa_pengiriman', $id);
		return $this->db->update('jasa_pengiriman', $data); 
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_jasa_pengiriman set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_jasa_pengiriman',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_jasa_pengiriman');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_jasa_pengiriman', $id);
		$this->db->delete('jasa_pengiriman'); 
	}

}
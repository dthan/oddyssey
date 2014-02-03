<?php

class M_kategori extends CI_Model{

	function get_kategori_all(){		
		return $this->db->get('kategori');
	}

	function get_kategori_selected($id){
		$this->db->where('id_kategori',$id);
		return $this->db->get('kategori');
	}

	function get_gambar($id){
		$this->db->where('id_kategori',$id);
		return $this->db->get('gambar_kategori');
	}

	function get_kategori(){
		return $this->db->get('kategori');
	}

	function cek_kategori($id){
       $this->db->where('id_kategori',$id);
       $q=$this->db->get('kategori');
       if($q->num_rows()>0){
       	 return "ada";
       }
       else {
       	 return "tidak";
       }
	}

	function input_kategori($data){
       return $this->db->insert('kategori',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_kategori',$data);
	}

	function update_kategori($data,$id){
		$this->db->where('id_kategori', $id);
		return $this->db->update('kategori', $data); 
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_kategori set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_kategori',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_kategori');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori'); 
	}

}
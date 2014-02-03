<?php

class M_produksi extends CI_Model{

	function get_produksi_all(){		
		return $this->db->query("SELECT p . * , m.nama_maklun
								FROM produksi p, maklun m
								WHERE p.id_maklun = m.id_maklun");
	}

	function get_produksi_selected($id){
		$this->db->where('id_produksi',$id);
		return $this->db->get('produksi');
	}
    
    function get_produksi_selected2($id){
	  return $this->db->query("SELECT p.* , m.nama_maklun, m.alamat FROM produksi p, maklun m WHERE p.id_maklun=m.id_maklun and id_produksi=$id");
	}


	function get_atribut($id){
		$this->db->where('id_produksi',$id);
		return $this->db->get('atribut');
	}

	function get_kategori(){
		return $this->db->get('kategori');
	}



	function get_maklun(){
		return $this->db->get('maklun');
	}

	function get_kode(){
	   $q=$this->db->query("SELECT * FROM produksi ORDER BY id_produksi DESC limit 1");
       foreach ($q->result() as $r) {
          
       }

       return $r->id_produksi;
	}

	function input_produksi($data){
       return $this->db->insert('produksi',$data);
	}

	function input_hpp($id,$hpp){
		return $this->db->query("update produksi set hpp='$hpp' where id_produksi='$id' ");	
	}

	function input_atribut($data){
		return $this->db->insert('atribut',$data);
	}

	function update_produksi($data,$id){
		$this->db->where('id_produksi', $id);
		return $this->db->update('produksi', $data); 
	}

	function update_atribut($data,$id){
		$this->db->where('id_atribut',$id);
		$this->db->update('atribut',$data);
		
	}

	function cek_ada($kode,$id){
		$this->db->where('id_produksi',$kode);
		$this->db->where('id_atribut',$id);
		$q=$this->db->get('atribut_produksi');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_produksi', $id);
		$this->db->delete('produksi'); 
	}

}
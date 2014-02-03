<?php

class M_pesanan extends CI_Model{

	function get_pesanan_all(){		
		return $this->db->query('SELECT * , total_pesanan(kode_transaksi) AS total,tampil_kurir(id_jasa) as kurir,tampil_bank(id_bank) as bank FROM transaksi_header');
	}

	function get_pesanan_selected($id){
		$this->db->where('id_pesanan',$id);
		return $this->db->get('pesanan');
	}
    
    function get_pesanan_selected2($id){
	  return $this->db->query("SELECT * , total_pesanan(kode_transaksi) AS total,tampil_kurir(id_jasa) as kurir,tampil_bank(id_bank) as bank FROM transaksi_header where kode_transaksi=$id ");
	}


	function get_detail_pesanan($id){
		$this->db->where('kode_transaksi',$id);
		return $this->db->get('transaksi_detail');
	}

	function get_kategori(){
		return $this->db->get('kategori');
	}



	function get_maklun(){
		return $this->db->get('maklun');
	}

	function get_kode(){
	   $q=$this->db->query("SELECT * FROM pesanan ORDER BY id_pesanan DESC limit 1");
       foreach ($q->result() as $r) {
          
       }

       return $r->id_pesanan;
	}

	function input_pesanan($data){
       return $this->db->insert('pesanan',$data);
	}

	function input_hpp($id,$hpp){
		return $this->db->query("update pesanan set hpp='$hpp' where id_pesanan='$id' ");	
	}

	function input_atribut($data){
		return $this->db->insert('atribut',$data);
	}

	function update_pesanan($data,$id){
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data); 
	}

	function update_atribut($data,$id){
		$this->db->where('id_atribut',$id);
		$this->db->update('atribut',$data);
		
	}

	function cek_ada($kode,$id){
		$this->db->where('id_pesanan',$kode);
		$this->db->where('id_atribut',$id);
		$q=$this->db->get('atribut_pesanan');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_pesanan', $id);
		$this->db->delete('pesanan'); 
	}

}
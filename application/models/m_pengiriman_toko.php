<?php

class M_pengiriman_toko extends CI_Model{

	function get_pengiriman_toko_all(){		
		return $this->db->query("SELECT p . * , j.nama_jasa_pengiriman AS kurir,
			                    t.nama_toko,t.pemilik FROM pengiriman_toko p,toko t, 
			                    jasa_pengiriman j WHERE p.jasa_pengiriman = j.id_jasa_pengiriman 
			                    and t.id_toko=p.id_toko order by kode_pengiriman desc ");
	}

	function get_pengiriman_toko_selected($id){
		$this->db->where('kode_pengiriman',$id);
		return $this->db->get('pengiriman_toko');
	}
	function get_faktur($id){
		return $this->db->query("SELECT p.* , tampil_kurir(p.jasa_pengiriman) as kurir, t.nama_toko,t.pemilik  FROM pengiriman_toko p,toko t where p.kode_pengiriman='".$id."' and t.id_toko=p.id_toko");
	}

	function get_stok($id){
		$this->db->where('id_produk',$id);
		$q=$this->db->get('produk')->result();
		foreach ($q as $k) {
			return $k->stok;
		}
	}

   function cek_faktur($id){
		$this->db->where('kode_pengiriman',$id);
		$q=$this->db->get('pengiriman_toko')->result();
		foreach ($q as $k) {
			if($k->cetak_faktur=='T'){
				$ket = "belum";
				
			}
			else{
				$ket = "sudah";
				
			}
			return $ket;
		}
	}

	function update_stok($data,$id){
		$this->db->where('id_produk',$id);
		$this->db->update('produk',$data);
	}
    
    function set_cetak($dt,$id){
    	$this->db->where('kode_pengiriman',$id);
    	$this->db->update('pengiriman_toko',$dt);

    }

	function get_detail($id){
		
		return $this->db->query("SELECT *,tampil_stok(id_produk) as stok FROM `pengiriman_toko_detail` WHERE `kode_pengiriman`='".$id."' ");
	}

	function get_gambar($id){
		$this->db->where('id_pengiriman_toko',$id);
		return $this->db->get('gambar_pengiriman_toko');
	}

	function get_pengiriman_toko(){
		return $this->db->get('pengiriman_toko');
	}

	function get_kode(){
		$now = date("Ymd");
		$q=$this->db->query("select count(kode_pengiriman) as jumlah from pengiriman_toko where kode_pengiriman like '%".$now."%' ");
       foreach ($q->result() as $jml) {
   
       }
       //$q2=$this->db->query("select  from upload where id_kategori='$id_kategori' and id_keilmuan='$keilmuan' ")
       if(($jml->jumlah<100) && ($jml->jumlah>=0)){
       	  if(($jml->jumlah<9) && ($jml->jumlah>=0)){
       	  	$ur=$jml->jumlah + 1;
       	  	$urut=$now."-000".$ur;

       	  }
       	  else {
       	  	$ur=$jml->jumlah + 1;
            $urut=$now."-00".$ur;
       	  }

       }

        else if(($jml->jumlah<1000) && ($jml->jumlah>=100)){     
       	  	$ur=$jml->jumlah + 1;
            $urut=$now."-0".$ur;       	  

       }
        else if(($jml->jumlah<10000) && ($jml->jumlah>=1000)){     
       	  	$ur=$jml->jumlah + 1;
            $urut=$now.$ur;       
       }
       
       return $urut;
	}

	function get_toko_all(){
		return $this->db->get('toko');
	}
     
    function get_kurir_all(){
		return $this->db->get('jasa_pengiriman');
	}

	  function get_produk_all(){
		return $this->db->get('produk');
	}
	  function get_produk_selected($id){
	  	$this->db->where('id_produk',$id);
		return $this->db->get('produk');
	}

	function cek_pengiriman_toko($id){
       $this->db->where('id_pengiriman_toko',$id);
       $q=$this->db->get('pengiriman_toko');
       if($q->num_rows()>0){
       	 return "ada";
       }
       else {
       	 return "tidak";
       }
	}

	function get_alamat($id){
		$this->db->where('id_toko',$id);
		$q=$this->db->get('toko')->result();
		foreach ($q as $r) {
			return $r->alamat;
		}
	}
    
    function input_detail($data){
    	return $this->db->insert('pengiriman_toko_detail',$data);
    }

	function input_pengiriman_toko($data){
       return $this->db->insert('pengiriman_toko',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_pengiriman_toko',$data);
	}

	function update_pengiriman_toko($data,$id){
		$this->db->where('kode_pengiriman', $id);
		return $this->db->update('pengiriman_toko', $data); 
	}

	function update_detail($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('pengiriman_toko_detail',$data);
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_pengiriman_toko set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_pengiriman_toko',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_pengiriman_toko');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('kode_pengiriman', $id);
		$this->db->delete('pengiriman_toko'); 
	}

}
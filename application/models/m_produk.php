<?php

class M_produk extends CI_Model{

	function get_produk_all(){		
		return $this->db->query("select p.*,k.nama_kategori from produk p,kategori k where p.id_kategori=k.id_kategori ");
	}

	function get_produk_selected($id){
		$this->db->where('id_produk',$id);
		return $this->db->get('produk');
	}

	function get_gambar($id){
		$this->db->where('id_produk',$id);
		return $this->db->get('gambar_produk');
	}

	function get_kategori(){
		return $this->db->get('kategori');
	}

	function hapus_gambar($id){
		$this->db->where('id_produk',$id);
		$this->db->delete('gambar_produk');
	}

	function get_kode($kategori){
	   $q=$this->db->query("select count(id_kategori) as jumlah from produk where id_kategori='$kategori' ");
       foreach ($q->result() as $jml) {
   
       }
       //$q2=$this->db->query("select  from upload where id_kategori='$id_kategori' and id_keilmuan='$keilmuan' ")
       if(($jml->jumlah<100) && ($jml->jumlah>=0)){
       	  if(($jml->jumlah<9) && ($jml->jumlah>=0)){
       	  	$ur=$jml->jumlah + 1;
       	  	$urut=$kategori."000".$ur;

       	  }
       	  else {
       	  	$ur=$jml->jumlah + 1;
            $urut=$kategori."00".$ur;
       	  }

       }

        else if(($jml->jumlah<1000) && ($jml->jumlah>=100)){     
       	  	$ur=$jml->jumlah + 1;
            $urut=$kategori."0".$ur;       	  

       }
        else if(($jml->jumlah<10000) && ($jml->jumlah>=1000)){     
       	  	$ur=$jml->jumlah + 1;
            $urut=$kategori.$ur;       
       }
       
       return $urut;
	}

	function input_produk($data){
       return $this->db->insert('produk',$data);
	}

	function input_gambar($data){
		return $this->db->insert('gambar_produk',$data);
	}

	function update_produk($data,$id){
		$this->db->where('id_produk', $id);
		return $this->db->update('produk', $data); 
	}

	function update_gambar($data,$id){
		return $this->db->query("update gambar_produk set gambar='$data' where id_gambar='$id' ");
	}

	function cek_ada($kode,$id){
		$this->db->where('id_produk',$kode);
		$this->db->where('id_gambar',$id);
		$q=$this->db->get('gambar_produk');
		if($q->num_rows()>=1){
			return "ada";
		}
		else{
			return "tidak";
		}

	}

	function hapus($id){
		$this->db->where('id_produk', $id);
		$this->db->delete('produk'); 
	}

}
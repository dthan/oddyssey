<?php

/**
* home data
*/
class M_home extends CI_Model
{
	
	public function get_features($count)
	{
		return $this->db->query("select p.nama_produk,p.harga,p.id_produk,gp.gambar from produk p left join gambar_produk gp on p.id_produk=gp.id_produk and p.feature='Y' group by p.id_produk order by p.id_produk asc limit $count");
	}

	public function products()
	{
				return $this->db->query("select p.id_produk,p.stok,p.nama_produk,p.harga,p.id_produk,gp.gambar from produk p left join gambar_produk gp on p.id_produk=gp.id_produk group by p.id_produk asc limit 0,6");

	}

	public function products_jml()
	{
		return $this->db->query("select p.nama_produk,p.harga,p.id_produk,gp.gambar from produk p left join gambar_produk gp on p.id_produk=gp.id_produk and p.feature='Y' group by p.id_produk asc");

	}

	function detail_produk($id)
	{
		$this->db->where('id_produk');
		return $this->db->get('produk');
	}
	function gbr_produk($id)
	{
		$this->db->where('id_produk');
		return $this->db->get('gambar_produk');
	}

}
?>
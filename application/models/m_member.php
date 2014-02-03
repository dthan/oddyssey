<?php
/**
* member
*/
class M_member extends CI_Model
{

	function get_pelanggan($id_pr,$id_kota,$id_pl)
	{
		return $this->db->query("select pg.nama_lengkap,pg.alamat,pg.email,pg.telp,pg.id_propinsi,pg.id_kota,pg.kode_pos,pr.nama_propinsi,
kota.nama_kota from pelanggan pg inner join propinsi pr on pg.id_propinsi=pr.id_propinsi and pr.id_propinsi='$id_pr'
 inner join kota on pr.id_propinsi=kota.id_propinsi and kota.id_kota='$id_kota' and pg.id_pelanggan='$id_pl'");
	}

	function bank()
	{
	 return $this->db->get('bank')->result();
	}

	function paket()
	{
	 return $this->db->get('jasa_pengiriman')->result();
	}

	function metode()
	{
	 return $this->db->get('metode_bayar')->result();
	}

	function add_pesanan_detail($data)
	{
		$this->db->insert('transaksi_detail',$data);
	}
	function add_pesanan($data)
	{
		if ( $this->db->insert('transaksi_header',$data) == true ) {
			return TRUE;
		} else {
			return FALSE;
		}
		;
		
	}

	function cek_kode($tgl)
	{
		return $this->db->query("SELECT MAX(kode_transaksi) as kd FROM transaksi_header WHERE kode_transaksi like '%$tgl%'");
	}
}

?>
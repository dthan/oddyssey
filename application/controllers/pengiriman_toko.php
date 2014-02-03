<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman_toko extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_pengiriman_toko','m_toko');
        $this->load->library('session');
        $this->load->library('tanggal');		
        $this->load->helper('form');
        $this->load->helper('general_helper');
   		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
			
	}
    
	public function index()
	{
	
		$data['username'] = $this->session->userdata('nama_admin');
		$data['pengiriman_toko'] = $this->m_toko->get_pengiriman_toko_all()->result();
		$data['title']    = "pengiriman_toko";
		$data['posisi']   = 'pengiriman_toko';	
		$this->load->view('admin/pengiriman_toko/pengiriman_toko',$data);					 				
	  	
	}

	public function cetak_faktur($id){
		$data['pesanan'] = $this->m_toko->get_faktur($id)->result();
		$data['detail']  = $this->m_toko->get_detail($id)->result();
		$cetak_faktur = $this->m_toko->cek_faktur($id);
		if($cetak_faktur=='belum'){
		foreach ($data['detail'] as $key) {
			$stok = $this->m_toko->get_stok($key->id_produk);
			$stok = (($stok)-($key->jumlah));
			$dt   = array('stok' => $stok );
			$this->m_toko->update_stok($dt,$key->id_produk);
			$dt2  = array('cetak_faktur' => 'Y' );
			$this->m_toko->set_cetak($dt2,$id);
		  }
	   }

		$data['title']    = "cetak faktur";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pengiriman_toko/faktur',$data);	
	}

	public function tambah(){
		
		$jasa_pengiriman      = $this->input->post("jasa_pengiriman");
		$alamat_penerima      = $this->input->post("alamat");
        $tgl_pengiriman       = date("Y-m-d");
        $id_toko              = $this->input->post("toko");
        $biaya_pengiriman     = $this->input->post("biaya_pengiriman");

        $kode_pengiriman      = $this->m_toko->get_kode();
		
        $data = array('kode_pengiriman'   => $kode_pengiriman,
        	          'jasa_pengiriman'   => $jasa_pengiriman,
        	          'alamat_penerima  ' => $alamat_penerima,
        	          'tgl_pengiriman'    => $tgl_pengiriman,
        	          'id_toko'			  => $id_toko,
        	          'biaya_pengiriman'  => $biaya_pengiriman  					 
        	         );
        //echo $kode_pengiriman_toko;
		$q=$this->m_toko->input_pengiriman_toko($data);
		$j = $this->input->post('jumlah_produk');
		for ($i=1; $i <= $j; $i++) { 
			$id=$this->input->post('produk-'.$i);
			$jml = $this->input->post('jml-'.$i);
			$produk = $this->m_toko->get_produk_selected($id)->result();
			foreach ($produk as $k) {
				$dt = array('kode_pengiriman' => $kode_pengiriman ,
				            'id_produk'       => $id,
				            'nama_produk'     => $k->nama_produk,
				            'harga'           => $k->harga,
				            'jumlah'          => $jml
				            );
				$this->m_toko->input_detail($dt);
			}
		}
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
		
	}

	public function get_alamat(){
		$toko = $this->input->post('toko');
		$alamat = $this->m_toko->get_alamat($toko);
		echo $alamat;
	}

	function cek_stok(){
		$id=$this->input->post('id');
		$stok = $this->m_toko->get_stok($id);
		echo $stok;
	}

	public function tambah_pengiriman_toko(){
	    $data['toko']['0'] = '';
        foreach($this->m_toko->get_toko_all()->result() as $row) {
            $data['toko'][$row->id_toko] = $row->nama_toko;
        }
         $data['jasa_pengiriman']['0'] = '';
        foreach($this->m_toko->get_kurir_all()->result() as $row) {
            $data['jasa_pengiriman'][$row->id_jasa_pengiriman] = $row->nama_jasa_pengiriman;
        }
          $data['produk']['0'] = '';
        foreach($this->m_toko->get_produk_all()->result() as $row) {
            $data['produk'][$row->id_produk] = $row->id_produk." ".$row->nama_produk." (Stok : ".$row->stok.")";
        }
		$data['title']    = "tambah pengiriman_toko";
		$data['posisi']   = 'pengiriman_toko';	
		$this->load->view('admin/pengiriman_toko/tambah_pengiriman_toko',$data);	

	}

	public function ajax_produk(){
		 $data['produk']['0'] = '';
        foreach($this->m_toko->get_produk_all()->result() as $row) {
            $data['produk'][$row->id_produk] = $row->id_produk." ".$row->nama_produk;
        }
   
        echo " <div class='row-fluid'>
              <div class='span3'>Produk</div>
              <div class='span9'>".form_dropdown('produk', $data['produk'],  '', 'id="produk" required class="chzn-select" data-placeholder="pilih produk"  style="width:220px;" tabindex="2" ')."</div></div>"; 

	}

	public function cek_pengiriman_toko(){
		$pengiriman_toko     = $this->input->post("kode_pengiriman_toko");
		$cek_pengiriman_toko = $this->m_pengiriman_toko->cek_pengiriman_toko($pengiriman_toko);
		echo $cek_pengiriman_toko;
	}

	public function edit($id){
         $data['toko']['0'] = '';
        foreach($this->m_toko->get_toko_all()->result() as $row) {
            $data['toko'][$row->id_toko] = $row->nama_toko;
        }
         $data['jasa_pengiriman']['0'] = '';
        foreach($this->m_toko->get_kurir_all()->result() as $row) {
            $data['jasa_pengiriman'][$row->id_jasa_pengiriman] = $row->nama_jasa_pengiriman;
        }
          $data['produk']['0'] = '';
        foreach($this->m_toko->get_produk_all()->result() as $row) {
            $data['produk'][$row->id_produk] = $row->id_produk." ".$row->nama_produk;
        }
		$data['pengiriman_toko']   = $this->m_toko->get_pengiriman_toko_selected($id)->result();
		$data['detail_pengiriman'] = $this->m_toko->get_detail($id)->result();
		$data['title']    = "Edit pengiriman_toko";
		$data['posisi']   = 'pengiriman_toko';	
		$this->load->view('admin/pengiriman_toko/edit_pengiriman_toko',$data);
	}

	public function aksi_edit(){
		$jasa_pengiriman      = $this->input->post("jasa_pengiriman");
		$alamat_penerima      = $this->input->post("alamat");
        $tgl_pengiriman       = date("Y-m-d");
        $id_toko              = $this->input->post("toko");
        $biaya_pengiriman     = $this->input->post("biaya_pengiriman");
		$kode_pengiriman      = $this->input->post("kode_pengiriman");
        $data = array('jasa_pengiriman'   => $jasa_pengiriman,
        	          'alamat_penerima  ' => $alamat_penerima,
        	          'tgl_pengiriman'    => $tgl_pengiriman,
        	          'id_toko'			  => $id_toko,
        	          'biaya_pengiriman'  => $biaya_pengiriman  					 
        	         );
        //echo $kode_pengiriman_toko;
		$q=$this->m_toko->update_pengiriman_toko($data,$kode_pengiriman);
		$j = $this->input->post('jumlah_produk');
		for ($i=1; $i <= $j; $i++) { 
			$id=$this->input->post('produk-'.$i);
			$jml = $this->input->post('jml-'.$i);
			$produk = $this->m_toko->get_produk_selected($id)->result();
			foreach ($produk as $k) {
				$dt = array('kode_pengiriman' => $kode_pengiriman ,
				            'id_produk'       => $id,
				            'nama_produk'     => $k->nama_produk,
				            'harga'           => $k->harga,
				            'jumlah'          => $jml
				            );
				/*$id_detail = $this->input->post('id_detail-'.$i);
				echo "==".$id."-".$jml."-".$kode_pengiriman."-".$k->harga."-".$k->nama_produk."-".$id_detail;*/
				$id_detail = $this->input->post('id_detail-'.$i);
				if($id_detail!=''){
					//echo "-ada-";
					 $this->m_toko->update_detail($dt,$id_detail);
				}
				else{
					//echo "-tidak-";
					$this->m_toko->input_detail($dt);
				}
				
			}
		}
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function hapus($id){
		
		$this->m_toko->hapus($id);
		//redirect(base_url().'pengiriman_toko','refresh');
	}
}


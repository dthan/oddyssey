<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pesanan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_pesanan');
        $this->load->library('session');
        $this->load->library('tanggal');
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
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['pesanan']   = $this->m_pesanan->get_pesanan_all()->result();
		$data['title']    = "pesanan";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pesanan/pesanan',$data);					 				
	  	
	}

	public function cetak_faktur($id){
		$data['pesanan'] = $this->m_pesanan->get_pesanan_selected2($id)->result();//get data pesanan dari view pesanan
		$data['detail']  = $this->m_pesanan->get_detail_pesanan($id)->result();
		$data['title']    = "cetak faktur";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pesanan/faktur',$data);	
	}

	public function tambah(){

		$nama_barang = $this->input->post("nama_pesanan");
		$maklun        = $this->input->post("maklun");
		$jumlah_pesanan = $this->input->post("jumlah_pesanan");	
        $data = array('nama_barang'     => $nama_barang,
        	          'tgl_pesanan'    => date("Y-m-d"), 
 					  'id_maklun'       => $maklun,
 					  'jumlah_pesanan' => $jumlah_pesanan				
        	         );
		$this->m_pesanan->input_pesanan($data);
        $id_pesanan = $this->m_pesanan->get_kode();
		$jumlah_atribut = $this->input->post("jumlah_atribut");
		$hpp=0;
		for ($i=1; $i <= $jumlah_atribut; $i++) { 			
				$atribut = array(
					             'nama_atribut'  => $this->input->post('atribut-'.$i),
					             'id_pesanan'   => $id_pesanan,
				                 'harga'         => $this->input->post('harga-'.$i),
				                 'jumlah'        => $this->input->post('jumlah-'.$i)
				               );
				$this->m_pesanan->input_atribut($atribut);		
				$harga  = $this->input->post('harga-'.$i);
				$jumlah = $this->input->post('jumlah-'.$i);
				$hpp=$hpp+($harga*$jumlah);
		}
		
		$q=$this->m_pesanan->input_hpp($id_pesanan,$hpp);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
				
		//redirect(base_url().'pesanan','refresh');	
	}

	public function tambah_pesanan(){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['pesanan']   = $this->m_pesanan->get_pesanan_all()->result();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_pesanan->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "tambah pesanan";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pesanan/tambah_pesanan',$data);	

	}

	public function edit($id){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['pesanan']   = $this->m_pesanan->get_pesanan_selected($id)->result();
		$data['atribut']   = $this->m_pesanan->get_atribut($id);
		$data['jml_atribut'] = $data['atribut']->num_rows();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_pesanan->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "Edit pesanan";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pesanan/edit_pesanan',$data);
	}

	public function aksi_edit(){
		$id_pesanan = $this->input->post('id_pesanan');
		$nama_barang = $this->input->post("nama_pesanan");
		$maklun        = $this->input->post("maklun");
		$jumlah_pesanan = $this->input->post("jumlah_pesanan");	
        $data = array('nama_barang'     => $nama_barang,
        	          'tgl_pesanan'    => date("Y-m-d"), 
 					  'id_maklun'       => $maklun,
 					  'jumlah_pesanan' => $jumlah_pesanan				
        	         );
		$this->m_pesanan->update_pesanan($data,$id_pesanan);       
		$jumlah_atribut = $this->input->post("jumlah_atribut");
		$hpp=0;
		for ($i=1; $i <= $jumlah_atribut; $i++) { 			
				$atribut = array(
					             'nama_atribut'  => $this->input->post('atribut-'.$i),
					             'id_pesanan'   => $id_pesanan,
				                 'harga'         => $this->input->post('harga-'.$i),
				                 'jumlah'        => $this->input->post('jumlah-'.$i)
				               );
				if($this->input->post('id_atribut-'.$i)=='belum'){
                   $this->m_pesanan->input_atribut($atribut);
				}
				else{
				   $this->m_pesanan->update_atribut($atribut,$this->input->post('id_atribut-'.$i));		
				}
					
				$harga  = $this->input->post('harga-'.$i);
				$jumlah = $this->input->post('jumlah-'.$i);
				$hpp=$hpp+($harga*$jumlah);
		}
		
		$q=$this->m_pesanan->input_hpp($id_pesanan,$hpp);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function detail($id){		
		$data['pesanan']   = $this->m_pesanan->get_pesanan_selected($id)->result();
		$data['atribut']   = $this->m_pesanan->get_atribut($id);
		$data['jml_atribut'] = $data['atribut']->num_rows();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_pesanan->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "Detail pesanan";
		$data['posisi']   = 'pesanan';	
		$this->load->view('admin/pesanan/detail',$data);
	}

	public function hapus($id){		
		$this->m_pesanan->hapus($id);		
	}
}


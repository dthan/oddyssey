<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produksi extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_produksi');
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
		$data['produksi']   = $this->m_produksi->get_produksi_all()->result();
		$data['kategori'][''] = '-- Pilih Kategori --';
		foreach($this->m_produksi->get_kategori()->result() as $row) {
            $data['kategori'][$row->id_kategori] = $row->nama_kategori;
        }
		$data['title']    = "produksi";
		$data['posisi']   = 'produksi';	
		$this->load->view('admin/produksi/produksi',$data);					 				
	  	
	}

	public function cetak_faktur($id){
		$data['produksi'] = $this->m_produksi->get_produksi_selected2($id)->result();//get data produksi dari view produksi
		$data['atribut']  = $this->m_produksi->get_atribut($id)->result();
		$data['title']    = "produksi";
		$data['posisi']   = 'produksi';	
		$this->load->view('admin/produksi/faktur',$data);	
	}

	public function tambah(){

		$nama_barang = $this->input->post("nama_produksi");
		$maklun        = $this->input->post("maklun");
		$jumlah_produksi = $this->input->post("jumlah_produksi");	
		$ongkos_jahit = $this->input->post("ongkos_jahit");	
        $data = array('nama_barang'     => $nama_barang,
        	          'tgl_produksi'    => date("Y-m-d"), 
 					  'id_maklun'       => $maklun,
 					  'jumlah_produksi' => $jumlah_produksi,
 					  'ongkos_jahit'    => $ongkos_jahit				
        	         );
		$this->m_produksi->input_produksi($data);
        $id_produksi = $this->m_produksi->get_kode();
		$jumlah_atribut = $this->input->post("jumlah_atribut");
		$hpp=0;
		for ($i=1; $i <= $jumlah_atribut; $i++) { 			
				$atribut = array(
					             'nama_atribut'  => $this->input->post('atribut-'.$i),
					             'id_produksi'   => $id_produksi,
				                 'harga'         => $this->input->post('harga-'.$i),
				                 'jumlah'        => $this->input->post('jumlah-'.$i)
				               );
				$this->m_produksi->input_atribut($atribut);		
				$harga  = $this->input->post('harga-'.$i);
				$jumlah = $this->input->post('jumlah-'.$i);
				$hpp=$hpp+($harga*$jumlah);
		}
		$hpp=$hpp*$jumlah_produksi;
		
		$q=$this->m_produksi->input_hpp($id_produksi,$hpp);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
				
		//redirect(base_url().'produksi','refresh');	
	}

	public function tambah_produksi(){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['produksi']   = $this->m_produksi->get_produksi_all()->result();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_produksi->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "tambah produksi";
		$data['posisi']   = 'produksi';	
		$this->load->view('admin/produksi/tambah_produksi',$data);	

	}

	public function edit($id){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['produksi']   = $this->m_produksi->get_produksi_selected($id)->result();
		$data['atribut']   = $this->m_produksi->get_atribut($id);
		$data['jml_atribut'] = $data['atribut']->num_rows();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_produksi->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "Edit produksi";
		$data['posisi']   = 'produksi';	
		$this->load->view('admin/produksi/edit_produksi',$data);
	}

	public function aksi_edit(){
		$id_produksi     = $this->input->post('id_produksi');
		$nama_barang     = $this->input->post("nama_produksi");
		$maklun          = $this->input->post("maklun");
		$jumlah_produksi = $this->input->post("jumlah_produksi");	
		$ongkos_jahit    = $this->input->post("ongkos_jahit");	
        $data = array('nama_barang'     => $nama_barang,
        	          'tgl_produksi'    => date("Y-m-d"), 
 					  'id_maklun'       => $maklun,
 					  'jumlah_produksi' => $jumlah_produksi,
 					  'ongkos_jahit'    => $ongkos_jahit				
        	         );
		$this->m_produksi->update_produksi($data,$id_produksi);       
		$jumlah_atribut = $this->input->post("jumlah_atribut");
		$hpp=0;
		for ($i=1; $i <= $jumlah_atribut; $i++) { 			
				$atribut = array(
					             'nama_atribut'  => $this->input->post('atribut-'.$i),
					             'id_produksi'   => $id_produksi,
				                 'harga'         => $this->input->post('harga-'.$i),
				                 'jumlah'        => $this->input->post('jumlah-'.$i)
				               );
				if($this->input->post('id_atribut-'.$i)=='belum'){
                   $this->m_produksi->input_atribut($atribut);
				}
				else{
				   $this->m_produksi->update_atribut($atribut,$this->input->post('id_atribut-'.$i));		
				}
					
				$harga  = $this->input->post('harga-'.$i);
				$jumlah = $this->input->post('jumlah-'.$i);
				$hpp=$hpp+($harga*$jumlah);
		}
		$hpp=$hpp*$jumlah_produksi;
		$q=$this->m_produksi->input_hpp($id_produksi,$hpp);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function detail($id){		
		$data['produksi'] = $this->m_produksi->get_produksi_selected2($id)->result();//get data produksi dari view produksi
		$data['atribut']  = $this->m_produksi->get_atribut($id);
		//$data['produksi']   = $this->m_produksi->get_produksi_selected($id)->result();
		//$data['atribut']   = $this->m_produksi->get_atribut($id);
		$data['jml_atribut'] = $data['atribut']->num_rows();
		$data['maklun'][''] = '-- Pilih Maklun --';
		foreach($this->m_produksi->get_maklun()->result() as $row) {
            $data['maklun'][$row->id_maklun] = $row->nama_maklun;
        }
		$data['title']    = "Detail produksi";
		$data['posisi']   = 'produksi';	
		$this->load->view('admin/produksi/detail',$data);
	}

	public function hapus($id){		
		$this->m_produksi->hapus($id);		
	}
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Toko extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_toko');
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
		$data['toko'] = $this->m_toko->get_toko_all()->result();
		$data['title']    = "toko";
		$data['posisi']   = 'toko';	
		$this->load->view('admin/toko/toko',$data);					 				
	  	
	}

	public function tambah(){
		$nama_toko   = $this->input->post("nama_toko");
		$alamat      = $this->input->post("alamat");
		$pemilik     = $this->input->post("pemilik");
        $data = array('alamat'   => $alamat,
        	          'nama_toko' => $nama_toko,
        	          'pemilik' => $pemilik  					 
        	         );
        //echo $kode_toko;
		$q=$this->m_toko->input_toko($data);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function tambah2(){
		$nama_toko   = $this->input->post("nama_toko");
		$alamat      = $this->input->post("alamat");
		$pemilik     = $this->input->post("pemilik");
        $data = array('alamat'   => $alamat,
        	          'nama_toko' => $nama_toko,
        	          'pemilik' => $pemilik  					 
        	         );
        //echo $kode_toko;
		$q=$this->m_toko->input_toko($data);
		
	}

	public function tambah_toko(){
	
		$data['title']    = "tambah toko";
		$data['posisi']   = 'toko';	
		$this->load->view('admin/toko/tambah_toko',$data);	

	}

	public function cek_toko(){
		$toko     = $this->input->post("kode_toko");
		$cek_toko = $this->m_toko->cek_toko($toko);
		echo $cek_toko;
	}

	public function edit($id){

		$data['toko']   = $this->m_toko->get_toko_selected($id)->result();	
		$data['title']    = "Edit toko";
		$data['posisi']   = 'toko';	
		$this->load->view('admin/toko/edit_toko',$data);
	}

	public function aksi_edit(){
		$nama_toko   = $this->input->post("nama_toko");
		$alamat      = $this->input->post("alamat");	
		$id_toko     = $this->input->post("id_toko");
		$pemilik     = $this->input->post("pemilik");	
        $data = array('alamat'    => $alamat,
        	          'nama_toko' => $nama_toko,
        	          'pemilik'   => $pemilik					 
        	         );
		$q=$this->m_toko->update_toko($data,$id_toko);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function hapus($id){
		
		$this->m_toko->hapus($id);
		redirect(base_url().'toko','refresh');
	}
}


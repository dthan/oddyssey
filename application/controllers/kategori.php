<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_kategori');
        $this->load->library('session');
        $this->load->library('tanggal');		
        $this->load->helper('form');
   		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
			
	}
    
	public function index()
	{
	
		$data['username'] = $this->session->userdata('nama_admin');
		$data['kategori'] = $this->m_kategori->get_kategori_all()->result();
		$data['title']    = "kategori";
		$data['posisi']   = 'kategori';	
		$this->load->view('admin/kategori/kategori',$data);					 				
	  	
	}

	public function tambah(){
		$nama_kategori   = $this->input->post("nama_kategori");
		$kode_kategori   = $this->input->post("kode_kategori");	
        $data = array('id_kategori'   => $kode_kategori,
        	          'nama_kategori' => $nama_kategori  					 
        	         );
        //echo $kode_kategori;
		$q=$this->m_kategori->input_kategori($data);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function tambah_kategori(){
	
		$data['title']    = "tambah kategori";
		$data['posisi']   = 'kategori';	
		$this->load->view('admin/kategori/tambah_kategori',$data);	

	}

	public function cek_kategori(){
		$kategori     = $this->input->post("kode_kategori");
		$cek_kategori = $this->m_kategori->cek_kategori($kategori);
		echo $cek_kategori;
	}

	public function edit($id){

		$data['kategori']   = $this->m_kategori->get_kategori_selected($id)->result();	
		$data['title']    = "Edit kategori";
		$data['posisi']   = 'kategori';	
		$this->load->view('admin/kategori/edit_kategori',$data);
	}

	public function aksi_edit(){
		$nama_kategori   = $this->input->post("nama_kategori");
		$kode_kategori   = $this->input->post("kode_kategori");	
		$id_kategori     = $this->input->post("id_kategori");	
        $data = array('id_kategori'   => $kode_kategori,
        	          'nama_kategori' => $nama_kategori  					 
        	         );
		$q=$this->m_kategori->update_kategori($data,$id_kategori);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function hapus($id){
		
		$this->m_kategori->hapus($id);
		redirect(base_url().'kategori','refresh');
	}
}


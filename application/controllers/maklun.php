<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maklun extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_maklun');
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
		$data['maklun'] = $this->m_maklun->get_maklun_all()->result();
		$data['title']    = "maklun";
		$data['posisi']   = 'maklun';	
		$this->load->view('admin/maklun/maklun',$data);					 				
	  	
	}

	public function tambah(){
		$nama_maklun   = $this->input->post("nama_maklun");
		$alamat        = $this->input->post("alamat");
        $data = array('alamat'   => $alamat,
        	          'nama_maklun' => $nama_maklun  					 
        	         );
        //echo $kode_maklun;
		$q=$this->m_maklun->input_maklun($data);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function tambah_maklun(){
	
		$data['title']    = "tambah maklun";
		$data['posisi']   = 'maklun';	
		$this->load->view('admin/maklun/tambah_maklun',$data);	

	}

	public function cek_maklun(){
		$maklun     = $this->input->post("kode_maklun");
		$cek_maklun = $this->m_maklun->cek_maklun($maklun);
		echo $cek_maklun;
	}

	public function edit($id){

		$data['maklun']   = $this->m_maklun->get_maklun_selected($id)->result();	
		$data['title']    = "Edit maklun";
		$data['posisi']   = 'maklun';	
		$this->load->view('admin/maklun/edit_maklun',$data);
	}

	public function aksi_edit(){
		$nama_maklun   = $this->input->post("nama_maklun");
		$alamat   = $this->input->post("alamat");	
		$id_maklun     = $this->input->post("id_maklun");	
        $data = array('alamat'   => $alamat,
        	          'nama_maklun' => $nama_maklun  					 
        	         );
		$q=$this->m_maklun->update_maklun($data,$id_maklun);
		if($q){
           echo "sukses";
		}
		else{
           echo "gagal";
		}
	}

	public function hapus($id){
		
		$this->m_maklun->hapus($id);
		redirect(base_url().'maklun','refresh');
	}
}


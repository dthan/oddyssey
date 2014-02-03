<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_profil');
        $this->load->library('session');
        $this->load->library('tanggal');		
        $this->load->helper('form');
        require_once "fckeditor/fckeditor.php"; 
   		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
			
	}
    
	public function index()
	{
	
		$data['username'] = $this->session->userdata('nama_admin');
		$data['profil']   = $this->m_profil->get_profil()->result();
		$data['title']    = "profil";
		$data['posisi']   = 'profil';	
		$this->load->view('admin/profil/profil',$data);					 				
	  	
	}

	public function update_profil(){
       $isi = $this->input->post('FCKeditor1');
       $this->m_profil->update_profil($isi);
       redirect(base_url().'profil','refresh');	
	}
}


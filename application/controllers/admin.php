<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		   parent::__construct();
		   $this->load->helper(array('form','url', 'text_helper','date'));
		   $this->load->model('m_login');
           $this->load->library('session');
           $this->load->library('tanggal');		
           $this->load->helper('form');
	}
    
	public function index()
	{
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['title']    = "home";
		$data['posisi']   = 'home';
		if($this->session->userdata('is_logged_in')) 
		{			   
			   $this->load->view('admin/home/home',$data);		
		}
		else 
		{
			   $this->load->view('admin/login/login');		 					
	    }		
	}
     
    //fungsi untuk cek login
	public function cek_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$check    = $this->m_login->cek_login($username,$password);
		$row      = $check->row();
		//jika login sukses
		if($check->num_rows()>0){
			$user_session = array(
							'id' => $row->id_user,
							'username' => $row->username,
							'nama_admin' => $row->nama,
							'is_logged_in' => TRUE,
							'level' => $row->level,
							);
			$this->session->set_userdata($user_session);
			echo "sukses";
		}
		//jika login gagal
		else{
			echo "gagal";
		}
		
	}
    
    //fungsi untuk logout
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('id');
		unset($this->session->userdata); 
		//hapus session
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}
}


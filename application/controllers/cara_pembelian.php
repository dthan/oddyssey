<?php

/**
* cara pembelian barang
*/
class cara_pembelian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_keranjang');
		$this->load->helper('general_helper');
		$this->load->model('m_home');
		$this->load->model('m_member');

	}

	function index()
	{
			if($this->session->userdata('login_stat')==TRUE) 
		{			   
			$data['user']= $this->session->userdata('username');  
			$data['link']= 'logout';	
			$data['log']= "Logout";
		} else {
			$data['user']= 'Guest';
			$data['log']= "Login";
			$data['link']= 'login_view';	
		}

		$total_diskon=0;
		foreach ($this->cart->contents() as $items) {
			
			$diskon = (($items['options']['diskon']*$items['price'])/100)*$items['qty'];
			$total_diskon+=$diskon;
		}
		$data['harga'] = $this->cart->total()-$total_diskon;
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		$data['title'] = "Cara Belanja di toko tasodysseybandung";
		$data['banks'] = $this->m_member->bank();
		$data['responses'] = $this->m_member->response();
		$data['features'] = $this->m_home->get_features('0,4')->result();
		$count = $this->m_home->products_jml()->num_rows();
		$i=1;
		$data['count'] = $count;
		if ($count > 3) {
			for ($first=4; $first<=($count) ; $first+=4) { 
				$data['featuresnext'][$i]= $this->m_home->get_features(''.$first.',4')->result();
				$i++;
			}
		}
		$data['products'] = $this->m_home->products()->result();
		$data['cara']= $this->m_home->cara_belanja()->result();
		$data['supports'] = $this->m_home->support()->result();
		$this->load->view('header',$data);
		//$this->load->view('top');
		$this->load->view('sidebar',$data);
		$this->load->view('cara',$data);
		$this->load->view('footer');

	}

	function update(){
		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
		else {
		$data['username'] = $this->session->userdata('nama_admin');
		$data['profil']   = $this->m_member->get_cara_pembelian()->result();
		$data['title']    = "Cara Pembelian";
		$data['posisi']   = 'cara_pembelian';	
		$this->load->view('admin/cara_pembelian/update',$data);					 				
	  	
		}
	}

	public function update_rule(){
       $isi = $this->input->post('FCKeditor1');
       $this->m_member->update_cara_pembelian($isi);
       redirect(base_url().'cara_pembelian/update','refresh');	
	}
	
}
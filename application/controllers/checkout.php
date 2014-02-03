<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('date','text_helper','form'));
		$this->load->library('email');
		$this->load->model('m_keranjang');
		$this->load->model('m_register');	
		$this->load->model('m_member');		
		$this->load->helper('general_helper');	
		session_start();
	}

	function index()
	{

		if (!$this->cart->contents()) {
			 redirect(base_url().'keranjang','refresh');			
		}
		if($this->session->userdata('login_stat')==TRUE) 
		{			   
			$data['user']= $this->session->userdata('username');  
			$data['link']= 'logout';	
			$data['log']= "Logout";	
		} else {
			$data['user']= 'Guest';
			$data['log']= "Login";
			$data['link']= 'login_view';	
			redirect(base_url().'member/login_view','refresh');	
		}
		 $prov = $this->m_register->ambil_prov();
		 $bank = $this->m_member->bank();
		 $paket = $this->m_member->paket();
		 $metode = $this->m_member->metode();
 
        foreach ($prov as $d) {
                    $data['prp'][0] = "-Pilih Propinsi-";
                    $data['prp'][$d->id_propinsi] = $d->nama_propinsi;
                }
        foreach ($bank as $d) {
                    $data['bank'][$d->id_bank] = $d->nama_bank;
                }
		foreach ($paket as $d) {
                    $data['pkt'][$d->id_jasa_pengiriman] = $d->nama_jasa_pengiriman;
                }
 		foreach ($metode as $d) {
                    $data['mtd'][$d->id_metod] = $d->metode;
                }
        $data['pelanggan'] = $this->m_member->get_pelanggan($this->session->userdata('prov'),$this->session->userdata('kota'),$this->session->userdata('id'))->result();
		$total_diskon=0;
		foreach ($this->cart->contents() as $items) {
			
			$diskon = (($items['options']['diskon']*$items['price'])/100)*$items['qty'];
			$total_diskon+=$diskon;
		}
		$data['harga'] = $this->cart->format_number($this->cart->total()-$total_diskon);
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		$this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('checkout');
		$this->load->view('footer');
	}

}


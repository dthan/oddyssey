<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		   parent::__construct();
		   $this->load->helper(array('form','url', 'text_helper','date'));
		   $this->load->model('m_login');	
		$this->load->model('m_keranjang');
		$this->load->model('m_member');		
		$this->load->helper('general_helper');
		
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
		$data['harga'] = $this->cart->format_number($this->cart->total()-$total_diskon);
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		//$data['kategori'] = $this->m_keranjang->get_cats()->result();
		$this->load->view('header',$data);
		//$this->load->view('top');
		$this->load->view('sidebar',$data);
		$this->load->view('member');
		$this->load->view('footer');
	}
	function login_view()
	{

		if($this->session->userdata('login_stat')==TRUE) 
		{			   
			$data['user']= $this->session->userdata('username');  
			$data['link']= 'logout';	
			$data['log']= "Logout";
			redirect(base_url());
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
		$data['harga'] = $this->cart->format_number($this->cart->total()-$total_diskon);
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		//$data['kategori'] = $this->m_keranjang->get_cats()->result();
		$this->load->view('header',$data);
		//$this->load->view('top');
		$this->load->view('sidebar',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}

	//reg
	function register()
	{
			$total_diskon=0;
		foreach ($this->cart->contents() as $items) {
			
			$diskon = (($items['options']['diskon']*$items['price'])/100)*$items['qty'];
			$total_diskon+=$diskon;
		}
		$data['harga'] = $this->cart->format_number($this->cart->total()-$total_diskon);
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		//$data['kategori'] = $this->m_keranjang->get_cats()->result();
		$this->load->view('header',$data);
		//$this->load->view('top');
		$this->load->view('sidebar',$data);
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function auth_user(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$check    = $this->m_login->cek_login2($username,$password);
		$row      = $check->row();
		//jika login sukses
		if($check->num_rows()>0){
			$user_session = array(
							'id' => $row->id_pelanggan,
							'username' => $row->username,
							'prov' => $row->id_propinsi,
							'kota' => $row->id_kota,
							'login_stat' => TRUE,
							);
			$this->session->set_userdata($user_session);
			return true;
		}
		//jika login gagal
		else{
			echo "failed";
		}
		
	}

	function add_pesanan()
	 {
/*echo "<pre>";
	 	print_r($this->input->post());
	 	echo "</pre>";*/
	 	
	 	$tgl_skr = date('Ymd');
			$cek_kode = $this->m_member->cek_kode($tgl_skr);
			$kode_trans = "";
			foreach($cek_kode->result() as $ck)
			{
				if($ck->kd==NULL)
				{
					$kode_trans = $tgl_skr.'001';
				}
				else
				{
					$kd_lama = $ck->kd;
					$kode_trans = $kd_lama+1;
				}
			}
		
		$total_diskon=0;
		foreach ($this->cart->contents() as $items) {
			
			$diskon = (($items['options']['diskon']*$items['price'])/100);
			$harga = $items['price']-$diskon;
			$data1 = array(
				'kode_transaksi'=>$kode_trans,
				'id_produk'=>$items['id'],
				'nama_produk'=>$items['name'],
				'harga'=>$harga,
				'jumlah'=>$items['qty']
				);
			$this->m_member->add_pesanan_detail($data1);
		}

		$data2= array(
			'kode_transaksi' => $kode_trans,
			'kode_pelanggan' => $this->session->userdata('id'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'email_penerima' => $this->input->post('email_penerima'),
			'alamat_penerima' => md5($this->input->post('alamat_penerima')),
			'telpon'=>$this->input->post('telp_penerima'),
			'id_propinsi'=>$this->input->post('provinsi_penerima'),
			'id_kota'=>$this->input->post('kota'),
			'kode_pos'=>$this->input->post('kodepos_penerima'),
			'id_bank'=>$this->input->post('bank'),
			'id_metode'=>$this->input->post('metode'),
			'id_jasa'=>$this->input->post('paket')
			);
			$this->session->unset_userdata('cart_contents');
			if ($this->m_member->add_pesanan($data2) == TRUE) {
				echo 'good';
			} else {
				echo 'error';
			}
	 	
	 }


	function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('prov');
		$this->session->unset_userdata('kota');
		$this->session->unset_userdata('login_stat');
		$this->session->unset_userdata('level');
		unset($this->session->userdata); 
		redirect(base_url());
	}
}
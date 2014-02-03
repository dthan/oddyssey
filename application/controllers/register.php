<?php

/**
* register
*/
class Register extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('m_keranjang');	
		$this->load->helper('general_helper');	
		$this->load->model('m_register');
	}
 
	function index()
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

		         $prov = $this->m_register->ambil_prov();
 
        foreach ($prov as $d) {
                    $data['prp'][0] = "-Pilih Propinsi-";
                    $data['prp'][$d->id_propinsi] = $d->nama_propinsi;
                }

		$data['harga'] = $this->cart->format_number($this->cart->total()-$total_diskon);
		$data['cats'] = $this->m_keranjang->get_cats()->result();
		//$data['kategori'] = $this->m_keranjang->get_cats()->result();
		$this->load->view('header',$data);
		//$this->load->view('top');
		$this->load->view('sidebar',$data);
		$this->load->view('register',$data);
		$this->load->view('footer');
	}

	function ambil_kota()
	{
	    $key = $this->input->post('key');
	        $kab = $this->m_register->ambil_kota_dariprov($key);
	         
	        echo '<select name="kota">';
	        foreach ($kab as $row){
	            echo '<option value="'.$row['id_kota'].'">'.$row['nama_kota'].'</option>';
	        }
	        echo '</select>';
	 }

	 function add_user()
	 {
	 	$username = $this->m_register->check('pelanggan','username',$this->input->post('username'));
	 	$email = $this->m_register->check('pelanggan','email',$this->input->post('email'));
	 	if ($username==true || $email==true) {
	 		if ($username==true) {
	 			echo 'Maaf Username Sudah Digunakan';
	 			exit;
	 		}
	 		if ($email==true) {
	 			echo 'Maaf Email Sudah Terdaftar';
	 			exit;
	 		}
	 	} else {
			
		$data= array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'alamat'=>$this->input->post('alamat'),
			'telp'=>$this->input->post('telp'),
			'id_propinsi'=>$this->input->post('provinsi'),
			'id_kota'=>$this->input->post('kota'),
			'email'=>$this->input->post('email'),
			'kode_pos'=>$this->input->post('kodepos')
			);
			if ($this->m_register->add_user($data) == TRUE) {
				echo 'good';
			} else {
				echo 'error';
			}
	 	} 
	 	
	 }

	
}
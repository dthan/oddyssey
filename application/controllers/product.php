<?php

/**
* product
*/
class product extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_keranjang');
		$this->load->helper('general_helper');
		$this->load->model('m_home');
	}
	function detail()
	{

		$kode = $this->uri->segment(3);
		$p_kode = explode("-",$kode);
		$data['detail_produk'] = $this->m_home->detail_produk($p_kode[0]);
		$data['gbr_produk'] = $this->m_home->gbr_produk($p_kode[0]);

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
		$this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('detail',$data);
		$this->load->view('footer');

	}
	
}
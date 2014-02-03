<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('m_keranjang');	
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
		$this->load->view('keranjang_belanja');
		$this->load->view('footer');
	}

	function show_cart()
	{
		$this->load->view('cart');
	}
	function count_cart()
	{
		echo $this->cart->total_items();
	}
	function price()
	{
		$total_diskon=0;
		foreach ($this->cart->contents() as $items) {
			
			$diskon = (($items['options']['diskon']*$items['price'])/100)*$items['qty'];
			$total_diskon+=$diskon;
		}
		echo $this->cart->format_number($this->cart->total()-$total_diskon);
	}
	function tambah_barang()
	{
			$data = array();
			foreach ($this->cart->contents() as $items) {
				$data[]= $items['id'];

			}
			
			//kalau ada id yang sama ubah jadi update, qty +1
			if ($this->cart->contents() && in_array($this->input->post('id'),$data,true)) {
				foreach ($this->cart->contents() as $items) {
					if ($this->input->post('id')==$items['id']) {
						if ($this->m_keranjang->update_cart($items['rowid'],$items['qty']+1)==TRUE) {
							echo 'true';
						}
						
					}
				}
	
				}
				else {
						if($this->m_keranjang->validate_add_cart_item() == TRUE){
					// Check if user has javascript enabled
					    if ($this->input->is_ajax_request()) {
					    	echo 'true'; // If javascript is enabled, return true, so the cart gets updated
						
					}else{
						
						redirect('home'); // If javascript is not enabled, reload the page with new data
					}
				}
					}
		
	}
	
	function update_cart()
	{
		{
			$data = array(
			'rowid' => $this->input->post('rowid'),
			'qty'   => $this->input->post('qty'));
			$this->cart->update($data);
		}
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."keranjang/'>";
	}
	function update_keranjang()
	{
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."keranjang/'>";
	}

	function hapus_keranjang($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0);
			$this->cart->update($data);
		redirect(base_url().'keranjang','refresh');
	}
		function plus()
		{
			foreach ($this->cart->contents() as $items) {
						if ($this->input->post('id')==$items['rowid']) {
							if ($this->m_keranjang->update_cart($items['rowid'],$items['qty']+1)==TRUE) {
								echo 'true';
							}
							
						}
					}
		}
		function min()
		{
			foreach ($this->cart->contents() as $items) {
						if ($this->input->post('id')==$items['rowid']) {
							if ($this->m_keranjang->update_cart($items['rowid'],$items['qty']-1)==TRUE) {
								echo 'true';
							}
							
						}
					}
		}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

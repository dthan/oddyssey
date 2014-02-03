<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tes extends CI_Controller {

public function __construct() {
		parent::__construct();

	}

	function index()
	{echo "<pre>";
		print_r($this->session->all_userdata());
	echo "</pre>";
	/*	$this->load->helper('general_helper');	
		$this->load->view('tes');*/
	}

}
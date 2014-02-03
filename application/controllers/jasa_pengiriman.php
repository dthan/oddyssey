<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jasa_pengiriman extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_jasa_pengiriman');
        $this->load->library('session');
        $this->load->library('tanggal');	
        $this->load->library(array('image_lib'));	
        $this->load->helper('form');
   		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
			
	}
    
	public function index()
	{
	
		$data['username'] = $this->session->userdata('nama_admin');
		$data['jasa_pengiriman'] = $this->m_jasa_pengiriman->get_jasa_pengiriman_all()->result();
		$data['title']    = "jasa pengiriman";
		$data['posisi']   = 'jasa_pengiriman';	
		$this->load->view('admin/jasa_pengiriman/jasa_pengiriman',$data);					 				
	  	
	}

	public function tambah(){
		$config['upload_path']    = "./gambar_jasa_pengiriman";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     = '5000';		 
		$this->load->library('upload', $config);
		$this->upload->do_upload("gambar");
		$fotox = $this->upload->data("gambar");
		$logo  = $fotox['file_name'];
		$nama_jasa_pengiriman   = $this->input->post("nama_jasa_pengiriman");
		if($logo==''){
			$data = array(
	        	          'nama_jasa_pengiriman' => $nama_jasa_pengiriman  					 
	        	         );
		}
		else{
		    $upload_data = $this->upload->data();
			$image_config["image_library"] = "gd2";
			$image_config["source_image"] = $upload_data["full_path"];
			$image_config['create_thumb'] = FALSE;
			$image_config['maintain_ratio'] = TRUE;
			$image_config['new_image'] = 'small_'.$logo;
			$image_config['quality'] = "100%";
			$image_config['width'] = 231;
			$image_config['height'] = 154;
			$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
			$image_config['master_dim'] = ($dim > 0)? "height" : "width";
			 
			$this->load->library('image_lib');
			$this->image_lib->initialize($image_config);
			 
			if(!$this->image_lib->resize()){ //Resize image
			    redirect("errorhandler"); //If error, redirect to an error page
			}else{
			}
			/*if($logo!=''){

			}*/
			
			$data = array('logo'   => $image_config['new_image'],
	        	          'nama_jasa_pengiriman' => $nama_jasa_pengiriman  					 
	        	         );
			 unlink("./gambar_jasa_pengiriman/".$logo);
	        //echo $kode_jasa_pengiriman;
		}
		$q=$this->m_jasa_pengiriman->input_jasa_pengiriman($data);
		redirect(base_url().'jasa_pengiriman','refresh');
	}

	public function tambah_jasa_pengiriman(){
	
		$data['title']    = "tambah jasa_pengiriman";
		$data['posisi']   = 'jasa_pengiriman';	
		$this->load->view('admin/jasa_pengiriman/tambah_jasa_pengiriman',$data);	

	}

	public function cek_jasa_pengiriman(){
		$jasa_pengiriman     = $this->input->post("kode_jasa_pengiriman");
		$cek_jasa_pengiriman = $this->m_jasa_pengiriman->cek_jasa_pengiriman($jasa_pengiriman);
		echo $cek_jasa_pengiriman;
	}

	public function edit($id){

		$data['jasa_pengiriman']   = $this->m_jasa_pengiriman->get_jasa_pengiriman_selected($id)->result();	
		$data['title']    = "Edit jasa_pengiriman";
		$data['posisi']   = 'jasa_pengiriman';	
		$this->load->view('admin/jasa_pengiriman/edit_jasa_pengiriman',$data);
	}

	public function aksi_edit(){
		$config['upload_path']    = "./gambar_jasa_pengiriman";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     = '5000';		 
		$this->load->library('upload', $config);
		$this->upload->do_upload("gambar");
		$fotox = $this->upload->data("gambar");
		$id = $this->input->post('id');
		$logo  = $fotox['file_name'];
		$nama_jasa_pengiriman   = $this->input->post("nama_jasa_pengiriman");
		
		if($logo==''){
           $data = array('nama_jasa_pengiriman' => $nama_jasa_pengiriman  					 
        	            );
            
		}
		else{
			$upload_data = $this->upload->data();
			$image_config["image_library"] = "gd2";
			$image_config["source_image"] = $upload_data["full_path"];
			$image_config['create_thumb'] = FALSE;
			$image_config['maintain_ratio'] = TRUE;
			$image_config['new_image'] = 'small_'.$logo;
			$image_config['quality'] = "100%";
			$image_config['width'] = 231;
			$image_config['height'] = 154;
			$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
			$image_config['master_dim'] = ($dim > 0)? "height" : "width";
			 
			$this->load->library('image_lib');
			$this->image_lib->initialize($image_config);
			 
			if(!$this->image_lib->resize()){ //Resize image
			    redirect("errorhandler"); //If error, redirect to an error page
			}else{
			}
			$data = array('logo'   => 'small_'.$logo,
        	          'nama_jasa_pengiriman' => $nama_jasa_pengiriman  					 
        	         );
			 unlink("./gambar_jasa_pengiriman/".$logo);
		}
		$this->m_jasa_pengiriman->update_jasa_pengiriman($data,$id);
       redirect(base_url().'jasa_pengiriman','refresh');
	}

	public function hapus($id){
		error_reporting(0);
		$gambar = $this->m_jasa_pengiriman->get_gambar($id);
		if($gambar->num_rows()>0){
			foreach ($gambar->result() as $k) {
			   unlink("./gambar_jasa_pengiriman/".$k->logo);
		    }
		}		
		$this->m_jasa_pengiriman->hapus($id);
		//redirect(base_url().'jasa_pengiriman','refresh');
	}
}


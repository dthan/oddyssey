<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('m_produk');
        $this->load->library('session');
        $this->load->library('tanggal');		
        $this->load->helper('form');
   		if($this->session->userdata('is_logged_in')!=TRUE) 
		{			   
			   redirect(base_url().'admin','refresh');			
		}
			
	}
    
	public function index()
	{
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['produk']   = $this->m_produk->get_produk_all()->result();
		$data['kategori'][''] = '-- Pilih Kategori --';
		foreach($this->m_produk->get_kategori()->result() as $row) {
            $data['kategori'][$row->id_kategori] = $row->nama_kategori;
        }
		$data['title']    = "produk";
		$data['posisi']   = 'produk';	
		$this->load->view('admin/produk/produk',$data);					 				
	  	
	}

	public function tambah(){
		error_reporting(0);
		$nama_produk   = $this->input->post("nama_produk");
		$kategori      = $this->input->post("kategori");
		$harga         = $this->input->post("harga");
		$stok          = $this->input->post("stok");
        $diskon        = $this->input->post("diskon");
        $ket           = $this->input->post("ket");
        $harga_eceran  = $this->input->post("harga_eceran");
        $minimal       = $this->input->post("minimal");
        $kode 		   = $this->m_produk->get_kode($kategori);
        $data = array('id_produk'    => $kode,
        	          'nama_produk'  => $nama_produk , 
 					  'id_kategori'  => $kategori,
 					  'stok'         => $stok,
 					  'harga'        => $harga,
 					  'diskon'       => $diskon,
 					  'ket'          => $ket,
 					  'harga_eceran' => $harga_eceran,
 					  'minimal'		 => $minimal
        	         );
		$this->m_produk->input_produk($data);

		$config['upload_path']    = "./gambar_produk";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     = '5000';		 
		$this->load->library('upload', $config);
		$jumlah_gambar = $this->input->post("jumlah_gambar");
		for ($i=1; $i <= $jumlah_gambar; $i++) { 
		        $this->upload->do_upload("gambar-".$i);	
				$fotox = $this->upload->data("gambar-".$i);
				$foto = $fotox['file_name'];
				
				$upload_data = $this->upload->data();
				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = $upload_data["full_path"];
				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = TRUE;
				$image_config['new_image'] = 'small_'.$foto;
				$image_config['quality'] = "100%";
				$image_config['width'] = 131;
				$image_config['height'] = 100;
				$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";
				 
				$this->load->library('image_lib');
				$this->image_lib->initialize($image_config);
				$gambar = array('gambar'    => $image_config['new_image'],
				                'id_produk' => $kode 
				               );
				if(!$this->image_lib->resize()){ //Resize image
				    //redirect("errorhandler"); //If error, redirect to an error page
				}else{
				}
				unlink("./gambar_produk/".$foto);
				$this->m_produk->input_gambar($gambar);		
		}
				
		redirect(base_url().'produk','refresh');	
	}

	public function tambah_produk(){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['produk']   = $this->m_produk->get_produk_all()->result();
		$data['kategori'][''] = '-- Pilih Kategori --';
		foreach($this->m_produk->get_kategori()->result() as $row) {
            $data['kategori'][$row->id_kategori] = $row->nama_kategori;
        }
		$data['title']    = "tambah produk";
		$data['posisi']   = 'produk';	
		$this->load->view('admin/produk/tambah_produk',$data);	

	}

	public function edit($id){
		$data['sessi']    = $this->session->userdata('usrname');
		$data['level']    = $this->session->userdata('level');
		$data['username'] = $this->session->userdata('nama_admin');
		$data['produk']   = $this->m_produk->get_produk_selected($id)->result();
		$data['gambar']   = $this->m_produk->get_gambar($id);
		$data['jml_gambar'] = $data['gambar']->num_rows();
		$data['kategori'][''] = '-- Pilih Kategori --';
		foreach($this->m_produk->get_kategori()->result() as $row) {
            $data['kategori'][$row->id_kategori] = $row->nama_kategori;
        }
		$data['title']    = "Edit produk";
		$data['posisi']   = 'produk';	
		$this->load->view('admin/produk/edit_produk',$data);
	}

	public function aksi_edit(){
		error_reporting(0);
		$nama_produk   = $this->input->post("nama_produk");
		$kategori      = $this->input->post("kategori");
		$harga         = $this->input->post("harga");
		$stok          = $this->input->post("stok");
        $diskon        = $this->input->post("diskon");
        $ket           = $this->input->post("ket");
        $harga_eceran  = $this->input->post("harga_eceran");
        $minimal       = $this->input->post("minimal");
        $kode 		   = $this->input->post("id_produk");
        $data = array(
        	          'nama_produk'  => $nama_produk , 
 					  'id_kategori'  => $kategori,
 					  'stok'         => $stok,
 					  'harga'        => $harga,
 					  'diskon'       => $diskon,
 					  'ket'          => $ket,
 					  'harga_eceran' => $harga_eceran,
 					  'minimal'		 => $minimal
        	          );
		$this->m_produk->update_produk($data,$kode);
		$config['upload_path']    = "./gambar_produk";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']     = '5000';		 
		$this->load->library('upload', $config);
		$jumlah_gambar = $this->input->post("jumlah_gambar");
	
		for ($i=1; $i <= $jumlah_gambar; $i++) { 
					    $this->upload->do_upload("gambar-".$i);	
						//$fotox = $_FILES['gambar'.$i]['name'];
						$fotox = $this->upload->data("gambar-".$i);
						$foto = $fotox['file_name'];
						$foto2 = $_FILES['gambar-'.$i]['name'];
						//echo $foto."===";
						$id_gambar = $this->input->post("id_gambar-".$i);
						$upload_data = $this->upload->data();
						//echo $id_gambar."-";
		 				if($foto2!=''){	
                           
							$image_config["image_library"] = "gd2";
							$image_config["source_image"] = $upload_data["full_path"];
							$image_config['create_thumb'] = FALSE;
							$image_config['maintain_ratio'] = TRUE;
							$image_config['new_image'] = 'small_'.$foto;
							$image_config['quality'] = "100%";
						    $image_config['width'] = 131;
				            $image_config['height'] = 100;
							$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
							$image_config['master_dim'] = ($dim > 0)? "height" : "width";
							 
							$this->load->library('image_lib');
							$this->image_lib->initialize($image_config);
							if(!$this->image_lib->resize()){ //Resize image
							    //redirect("errorhandler"); //If error, redirect to an error page
							}else{
							}
		 					$cek_ada = $this->m_produk->cek_ada($kode,$id_gambar);
		 					if($cek_ada=='ada'){
		 					    $this->m_produk->update_gambar('small_'.$foto,$this->input->post("id_gambar-".$i));
		 						//echo $id_gambar."-".$kode."-".$foto."+";
		 					}
		 					else{	
		 					  $gambar = array('gambar'    => 'small_'.$foto,
				                              'id_produk' => $kode 
				                          );	 		
				               //echo "kosong";			
		 				 	   $this->m_produk->input_gambar($gambar);		
		 					}
		 					unlink("./gambar_produk/".$foto);
		 					//echo "ada";
		 				}
		 				else {
		 					//echo "kosong2";
		 				}
		 			
			    }	
		redirect(base_url().'produk','refresh');	
	}

	public function hapus($id){
		error_reporting(0);
		$gambar = $this->m_produk->get_gambar($id);
		if($gambar->num_rows()>0){
			foreach ($gambar->result() as $k) {
				$this->m_produk->hapus_gambar($id);
			   unlink("./gambar_produk/".$k->gambar);
		    }
		}		
		$this->m_produk->hapus($id);
		redirect(base_url().'produk','refresh');
	}
}


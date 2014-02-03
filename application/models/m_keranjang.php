<?php

/**
* keranjang belanja
*/
class M_keranjang extends CI_Model
{
	
	public function get_cats()
	{
		return $this->db->query("select k.nama_kategori,count(p.id_produk) as jml from kategori k inner join produk p on k.id_kategori=p.id_kategori
group by k.id_kategori");
	}

	// Add an item to the cart
	function validate_add_cart_item(){
		
		$id = $this->input->post('id'); // Assign posted id_produk
		$cty = $this->input->post('qty'); // Assign jumlah pesanan
		
		$query = $this->db->query("select p.harga,p.nama_produk,p.diskon,gp.gambar from produk p inner join gambar_produk gp on p.id_produk=gp.id_produk and p.id_produk='$id' group by p.id_produk"); // Select the products where a match is found and limit the query by 1
		 
		// Check if a row has been found
		if($query->num_rows > 0){
		
			foreach ($query->result() as $row)
			{
			    $data = array(
               		'id'      => $id,
               		'qty'     => $cty,
               		'price'   => $row->harga,
               		'name'    => $row->nama_produk,
               		 'options' => array('gbr' => $row->gambar,'diskon'=>$row->diskon)
            	);
				$this->cart->insert($data); 
				
				return TRUE;
			}
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}

	function update_cart($id,$qty)
	{
		$data = array(
               'rowid' => $id,
               'qty'   => $qty,
            );
            
            // Update the cart with the new information
			$this->cart->update($data);
			return TRUE;
	}
	// Updated the shopping cart
	function validate_update_cart(){
		
		// Get the total number of items in cart
		$total = $this->cart->total_items();
		
		// Retrieve the posted information
		$item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');

		// Cycle true all items and update them
		for($i=0;$i < $total;$i++)
		{
			// Create an array with the products rowid's and quantities. 
			$data = array(
               'rowid' => $item[$i],
               'qty'   => $qty[$i]
            );
            
            // Update the cart with the new information
			$this->cart->update($data);
		}

	}

}

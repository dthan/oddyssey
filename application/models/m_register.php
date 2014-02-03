<?php
    class M_register extends CI_Model {
         function __construct()
         {
             parent::__construct();
         }
     
	function ambil_prov()
	{
	 return $this->db->get('propinsi')->result();
	}
    function ambil_kota_dariprov($key)
	{
	  return $this->db->get_where('kota', array('id_propinsi' => $key))->result_array();
	}
	function add_user($data)
	{
		if ( $this->db->insert('pelanggan',$data) == true ) {
			return TRUE;
		} else {
			return FALSE;
		}
		;
		
	}

	function check($table,$var,$val)
	{
		$this->db->where($var,$val);
		$check = $this->db->get($table);

		if ($check->num_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
 
}

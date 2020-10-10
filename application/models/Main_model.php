<?php

class Main_model extends CI_Model {

	// Model users
	function ambildata($perPage, $uri, $kode_transportasi, $name_transportasi) {
		$this->db->select('*');
		$this->db->from('tbl_master_transportasi');
		if (!empty($nama)) {
			$this->db->like('kode_transportas', $kode_transportasi);
		}

		if (!empty($jurusan)) {
			$this->db->like('name_transportasi', $name_transportasi);
		}
		
		$this->db->order_by('id_transportasi','asc');
		$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}

}

?>
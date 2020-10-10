<?php

class Modul extends CI_Model {

	// Model users
	function ambildata($perPage, $uri, $nama, $jurusan) {
		$this->db->select('*');
		$this->db->from('pagination');
		if (!empty($nama)) {
			$this->db->like('nama', $nama);
		}

		if (!empty($jurusan)) {
			$this->db->like('jurusan', $jurusan);
		}
		
		$this->db->order_by('nim','asc');
		$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}

}

?>
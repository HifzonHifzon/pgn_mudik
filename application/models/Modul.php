<?php

class Modul extends CI_Model {

	// Model users
	function ambildata($perPage, $uri, $ringkasan) {
		$this->db->select('*');
		$this->db->from('pagination');
		if (!empty($ringkasan)) {
			$this->db->like('nama', $ringkasan);
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
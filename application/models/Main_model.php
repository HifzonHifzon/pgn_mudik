<?php

class Main_model extends CI_Model {

	// Model users
	function ambildata($perPage, $uri, $tanggal_berangkat, $rute, $transportasi) {
		$this->db->select('a.*, b.*, c.*');
		$this->db->from('tbl_jadwal_berangkat as a');
		$this->db->join('tbl_master_transportasi as b', 'a.id_transportasi = b.id_transportasi');
		$this->db->join('tbl_master_rute as c', 'c.id_rute = a.id_rute');

		if (!empty($tanggal_berangkat)) {
			$this->db->where('a.tanggal_berangkat', $tanggal_berangkat);
		}

		if (!empty($transportasi)) {
			$this->db->where('b.id_transportasi', $transportasi);
		}


		if (!empty($tanggal_berangkat)) {
			$this->db->where('a.id_rute', $rute);
		}


		// if (!empty($jurusan)) {
		// 	$this->db->like('name_transportasi', $name_transportasi);
		// }
		
		$this->db->order_by('a.id_berangkat','asc');
		$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}

}

?>
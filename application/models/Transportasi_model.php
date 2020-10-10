<?php

class Transportasi_model extends CI_Model{
    
    protected $table = 'tbl_master_transportasi';
    protected $table2 = 'tbl_master_jenis_transportasi';

    public function getAll() {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_master_transportasi as a');
        $this->db->join('tbl_master_jenis_transportasi as b ', 'a.jenis_transportasi = b.id_jenis_transportasi');
        $data = $this->db->get()->result();
        return $data;
    }

    public function getJenis(){
        $all_jenis = $this->db->get($this->table2)->result();
        return $all_jenis;
    }

    public function addSave($data){
        $data = $this->db->insert($this->table, $data);
        return $data;
    }

    public function deleteData($where){
        $this->db->where($where);
        $data = $this->db->delete($this->table);
        return $data;
    }





}



?>
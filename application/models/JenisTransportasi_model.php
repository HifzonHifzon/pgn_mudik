<?php

class JenisTransportasi_model extends CI_Model{
    
    protected $table = 'tbl_master_jenis_transportasi';

    public function getAll() {
        $data = $this->db->get($this->table)->result();
        return $data;
    }

    public function addSave($data){
        $data = $this->db->insert($this->table, $data);
        return $data;
    }

    public function getById($where){
        $this->db->where($where);
        $data = $this->db->get($this->table)->result();
        return $data;
    }

    public function deleteData($where){
        $this->db->where($where);
        $data = $this->db->delete($this->table);
        return $data;
    }





}



?>
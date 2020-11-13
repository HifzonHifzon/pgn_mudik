<?php 


class Transaksi_Berangkat extends CI_Model {
    
    public function insertDataPeserta($data) {
        $exec = $this->db->insert('tbl_peserta', $data);
        return $exec;
    }

    public function getPeserta($where) {
        $this->db->where($where);
        $exec = $this->db->get('tbl_peserta')->result();
        return $exec;
    }

    public function insertTransaksi($data){
        $exec = $this->db->insert('tbl_transaksi_berangkat', $data);
        return $exec;
    }
}


?>
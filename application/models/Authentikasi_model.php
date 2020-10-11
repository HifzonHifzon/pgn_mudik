<?php

class Authentikasi_model extends CI_Model{
    
    protected $table = 'tbl_peserta';

    public function check($user, $pass) {
        $data = array(
            "email" => $user, 
            "pass"  => $pass
        );

        $data = $this->db->get_where($this->table, $data)->result();
        return $data;
    }

}



?>
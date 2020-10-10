<?php 

class JadwalBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('JenisTransportasi_model');
    }


    public function index(){
        $query = " SELECT 
                        b.name_transportasi,
                        b.slot,
                        c.asal,
                        c.tujuan 
                    FROM tbl_jadwal_berangkat AS a 
                        inner join (
                                select 
                                    x.id_transportasi, 
                                    x.name_transportasi, 
                                    x.slot
                                from tbl_master_transportasi as x inner join tbl_master_jenis_transportasi as y 
                                on x.jenis_transportasi = y.id_jenis_transportasi
                            ) as b on a.id_transportasi = b.id_transportasi inner join tbl_master_rute as c on a.id_rute = c.id_rute";

        $jadwal_berangkat = $this->db->query($query);
    }


   
}


?>
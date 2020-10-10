<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class JadwalBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Penjadwalan_berangkat');
    }


    public function index(){

        $jadwal_berangkat = $this->Penjadwalan_berangkat->getBerangkat(); 
        $data = [
            "title"     => "List Keberangkatan dan Slot Transportasi",
            "kontent"   => 'dashboard/konten/master_keberangkatan_slot_transportasi',
            "result"    => $jadwal_berangkat,
        ];


        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }


   
}


?>
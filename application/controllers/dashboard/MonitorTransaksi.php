<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MonitorTransaksi extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Penjadwalan_berangkat');
        if ($this->session->userdata('email') == '') {
            redirect(base_url().'login');
        }
    }

    public function index(){
        $id_peserta = $this->session->userdata('id_peserta');
        $result = $this->Penjadwalan_berangkat->getTransaksiBerangkatByPeserta($id_peserta);
        $data = [
            "title"     => "List Master Tansportasi",
            "kontent"   => 'dashboard/konten/monitoring_transaksi',
            "result"    => $result
        ];

        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }
 
}


?>
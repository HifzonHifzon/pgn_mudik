<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TransaksiBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Penjadwalan_berangkat');
    }

    public function index() {
        $transaksi_berangkat = $this->Penjadwalan_berangkat->getTransaksiBerangkat(); 

        $data = [
            "title"     => "List Transaksi Keberangkatan",
            "kontent"   => 'dashboard/konten/transaksi_keberangkatan',
            "result"    => $transaksi_berangkat,
        ];


        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }

    public function verifikasi() {
        $id = $this->input->post('id');

        $transaksi_berangkat = $this->Penjadwalan_berangkat->getVerifikasi($id); 

        var_dump($transaksi_berangkat);

        exit();

        if($transaksi_berangkat) {
            $data = [
                "status" => "success",
                "message" => "Data berhasil di Verifikasi ! Silahkan cek email "
            ];
        } else {
            $data = [
                "status" => "failed",
                "message" => "Data gagal di Verifikasi"
            ];
        }

        echo json_encode($data);

    }


    public function getImageKtp() {
        $id = $this->input->post('id');
        $where = ['id_peserta' => $id];
        $transaksi_berangkat = $this->Penjadwalan_berangkat->getKTP($where); 
        echo json_encode($transaksi_berangkat);
    }


   
}


?>
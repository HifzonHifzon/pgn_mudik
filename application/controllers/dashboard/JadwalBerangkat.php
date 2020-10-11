<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// pemanggilan Library Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class JadwalBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model(['Penjadwalan_berangkat','Rute_model','Transportasi_model']);

        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        require_once(APPPATH.'third_party/phpmailer/Exception.php');
        require_once(APPPATH.'third_party/phpmailer/PHPMailer.php');
        require_once(APPPATH.'third_party/phpmailer/SMTP.php');

        if ($this->session->userdata('email') == '') {
            redirect(base_url().'login');
        }
        
    }


    public function index(){

        $jadwal_berangkat = $this->Penjadwalan_berangkat->getBerangkat(); 
        

        $list_rute = $this->Rute_model->getAll();
        $list_transportasi =$this->Transportasi_model->getAll();

        
        $data = [
            "title"     => "List Keberangkatan dan Slot Transportasi",
            "kontent"   => 'dashboard/konten/master_keberangkatan_slot_transportasi',
            "result"    => $jadwal_berangkat,
            "list_rute" => $list_rute,
            "list_transportasi" => $list_transportasi,
        ];


        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }


    public function insertJadwalBerangkat() {
        $id_transportasi = $this->input->post('id_transportasi');
        $id_rute = $this->input->post('id_rute');
        $tanggal_berangkat = $this->input->post('tanggal_berangkat');

        // pengecekan penjadwalan transportasi di hari yang sama

        $check = $this->Penjadwalan_berangkat->checkJadwal($tanggal_berangkat, $id_transportasi);

        if ($check > 0) {
            $data = [
                "status" => "failed",
                "message" => "Data gagal ditambahakan karena transportasi sudah digunakan dihari yang sama"
            ];
            echo json_encode($data);
            exit();
        }

        $data = [
            "tanggal_berangkat" => $tanggal_berangkat,
            "id_rute"   => $id_rute,
            "id_transportasi" => $id_transportasi
        ];

        $exec = $this->Penjadwalan_berangkat->insertJadwalBerangkat($data);
        if($exec) {
            $data = [
                "status" => "success",
                "message" => "Data berhasil ditambahakan"
            ];
            echo json_encode($data);
        } else {
            $data = [
                "status" => "failed",
                "message" => "Data gagal ditambahakan"
            ];
            echo json_encode($data);
        }

    }


   
}


?>
<?php 
// pemanggilan Library Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TransaksiBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Penjadwalan_berangkat');
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        require_once(APPPATH.'third_party/phpmailer/Exception.php');
        require_once(APPPATH.'third_party/phpmailer/PHPMailer.php');
        require_once(APPPATH.'third_party/phpmailer/SMTP.php');
        if ($this->session->userdata('email') == '') {
            redirect(base_url().'login');
        }
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

        $this->db->select('a.*, b.*');
        $this->db->from('tbl_transaksi_berangkat a');
        $this->db->join('tbl_peserta b', 'a.id_peserta = b.id_peserta');
        $this->db->where('a.id_transaksi_berangkat', $id);
        $data = $this->db->get()->result();

        $email = $data[0]->email;
        $password = $data[0]->pass;


        if($transaksi_berangkat) {
            $email_pengirim = 'hifzonhifzon7@gmail.com'; // Isikan dengan email pengirim
            $nama_pengirim = 'Admin PGN MUDIK'; // Isikan dengan nama pengirim
            $email_penerima =  $email; // Ambil email penerima dari inputan form
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = $email_pengirim; // Email Pengirim
            $mail->Password = 'Bekasi57'; // Isikan dengan Password email pengirim
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($email_penerima, '');
            $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

            $mail->Subject = "Selamat Datang Di PGN";
            $link = base_url().'dashboard/login/';

            $mail->Body = "Selamat !! Anda telah berhasil terdaftar sebagai peserta mudik gratis
                        !! <p> Silahkan login <p> User :".$email." <br> Password : ".$password." <p> link ".$link."";

            $data = $mail->send(); 
        }
     

      
    }


    public function getImageKtp() {
        $id = $this->input->post('id');
        $where = ['id_peserta' => $id];
        $transaksi_berangkat = $this->Penjadwalan_berangkat->getKTP($where); 
        echo json_encode($transaksi_berangkat);
    }


   
}


?>
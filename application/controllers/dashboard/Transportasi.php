<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transportasi extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Transportasi_model');
        if ($this->session->userdata('email') == '') {
            redirect(base_url().'login');
        }
    }
    public function index(){
        $result = $this->Transportasi_model->getAll();
        $jenis_transportasi = $this->Transportasi_model->getJenis();

        $data = [
            "title"     => "List Master Tansportasi",
            "kontent"   => 'dashboard/konten/master_transportasi',
            "result"    => $result,
            "jenis_transportasi" => $jenis_transportasi
        ];

        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }


    public function store(){
        $name_transportasi = $this->input->post('name_transportasi');
        $kode_transportasi = $this->input->post('kode_transportasi');
        $jenis_transportasi = $this->input->post('jenis_transportasi');
        $slot = $this->input->post('slot');
        $status = $this->input->post('status');

        $data = [
            "kode_transportas" => $kode_transportasi,
            "name_transportasi" => $name_transportasi,
            "slot"  => $slot,
            "status_aktif" => $status,
            "jenis_transportasi" => $jenis_transportasi
        ];

        $exec = $this->Transportasi_model->addSave($data);
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


    public function getById(){
        $id = $this->input->post('id');
        $where  = ['a.id_transportasi' => $id];
        $exec = $this->Transportasi_model->getById($where);
        echo json_encode($exec);
    }


    public function delete(){
        $id = $this->input->post('id');
        $where  = ['id_transportasi' => $id];
        $exec = $this->Transportasi_model->deleteData($where);
        if($exec) {
            $data = [
                "status" => "success",
                "message" => "Data berhasil dihapus"
            ];
            echo json_encode($data);
        } else {
            $data = [
                "status" => "failed",
                "message" => "Data gagal dihapus"
            ];
            echo json_encode($data);
        }
    }
}


?>
<?php 

class JenisTransportasi extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('JenisTransportasi_model');
    }
    public function index(){
        $result = $this->JenisTransportasi_model->getAll();

        $data = [
            "title"     => "List Master Jenis Transportasi",
            "kontent"   => 'dashboard/konten/master_jenis_transportasi',
            "result"    => $result,
        ];

        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }


    public function store(){
        $name_jenis = $this->input->post('name_jenis');
        $status = $this->input->post('status');

        $data = [
            "name_jenis" => $name_jenis,
            "status" => $status,
        ];

        $exec = $this->JenisTransportasi_model->addSave($data);

        if($exec) {
            $data = [
                "status" => "success",
                "message" => "Data berhasil ditambahakan"
            ];
        } else {
            $data = [
                "status" => "failed",
                "message" => "Data gagal ditambahakan"
            ];
        }

        echo json_encode($data);
    }


    public function delete(){
        $id = $this->input->post('id');
        $where  = ['id_jenis_transportasi' => $id];
        $exec = $this->JenisTransportasi_model->deleteData($where);

        if($exec) {
            $data = [
                "status" => "success",
                "message" => "Data berhasil dihapus"
            ];
         
        } else {
            $data = [
                "status" => "failed",
                "message" => "Data gagal dihapus"
            ];
        }

        echo json_encode($data);
    }
}


?>
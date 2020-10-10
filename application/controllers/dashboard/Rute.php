<?php 

class Rute extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Rute_model');
    }
    public function index(){
        $result = $this->Rute_model->getAll();

        $data = [
            "title"     => "List Master Rute",
            "kontent"   => 'dashboard/konten/master_rute',
            "result"    => $result,
        ];

        $this->load->view('dashboard/template/layout', ["data" => $data]);
    }


    public function store(){
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        $aktif = $this->input->post('aktif');

        $data = [
            "asal" => $asal,
            "tujuan" => $tujuan,
            "aktif"  => $aktif,
        ];

        $exec = $this->Rute_model->addSave($data);
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
        $where  = ['id_rute' => $id];
        $exec = $this->Rute_model->deleteData($where);

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
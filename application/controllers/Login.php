<?php 


class Login extends CI_Controller {

	function __construct(){
        parent::__construct();

        $this->load->model(array(
            'Transportasi_model',
            'Rute_model',
            'Authentikasi_model',
            'Penjadwalan_berangkat',
            'Transaksi_Berangkat'));


       
    }
    

    public function index() {
        $this->load->view('login');
    }
    
    function authentikasi_login() {
        $user      = $this->input->post('email');
        $password   = $this->input->post('pass');


        if ($user == 'admin') {
            $set_userdata = [
                "email" => 'admin',
            ];

            $this->session->set_userdata($set_userdata);

            redirect(base_url().'dashboard/JadwalBerangkat');

        }else {
            $data = $this->Authentikasi_model->check($user, $password);

            if($data) {
                $set_userdata = [
                    "email" => $data[0]->email,
                    "id_peserta" => $data[0]->id_peserta,
                    "name" => $data[0]->email,
                ];
                $this->session->set_userdata($set_userdata);
    
                redirect(base_url().'dashboard/MonitorTransaksi');
            }
        }
    }

    function logout() {

   
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
  

}


?>
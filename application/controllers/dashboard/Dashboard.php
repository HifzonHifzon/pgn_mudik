<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index(){
        $this->load->view('dashboard/template/layout');
    }

    public function getMasterTransportasi() {
        
        $result = $this->
        $data = [
            "title"     => "List Master Tansportasi",
            "kontent"   => 'dashboard/konten/master_transportasi',
            "result"    => $result
        ];
    }

   
}





?>
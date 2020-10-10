<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TransaksiBerangkat extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('JenisTransportasi_model');
    }

    public function index() {
        echo "asdhasdgas";
    }


   
}


?>
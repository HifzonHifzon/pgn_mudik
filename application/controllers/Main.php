<?php 


/*
    Hifzon, 8 Oktober 2020
*/
class Main extends CI_Controller {

	function __construct(){
        parent::__construct();

        $this->load->model(array('Transportasi_model','Rute_model','Penjadwalan_berangkat','Transaksi_Berangkat'));
	}
	
    public function index() {

		// api Info Corona Indonesia 
		$url = "https://api.kawalcorona.com/indonesia/";
		$data['data_covid'] = json_decode($this->getApi($url));

		$data['list_transportasi'] = $this->Transportasi_model->getAll();
		$data['list_kota_berangkat'] = $this->Rute_model->getAll();

        if (isset($_POST['q'])) {
            $data['tanggal_berangkat'] = $this->input->post('tanggal_berangkat');
            $data['rute'] = $this->input->post('rute');
            $data['transportasi'] = $this->input->post('name_transportasi');

			$this->session->set_userdata('rute', $data['rute']);
			$this->session->set_userdata('transportasi', $data['transportasi']);
			$this->session->set_userdata('tanggal_berangkat', $data['tanggal_berangkat']);
		}
		else {
			$data['rute'] = $this->session->userdata('rute');
			$data['transportasi'] = $this->session->userdata('transportasi');
			$data['tanggal_berangkat'] = $this->session->userdata('tanggal_berangkat');
			
		}

		// load model
		$this->load->model('Main_model');
		
		$this->db->select('a.*, b.*, c.*');
		$this->db->from('tbl_jadwal_berangkat as a');
		$this->db->join('tbl_master_transportasi as b', 'a.id_transportasi = b.id_transportasi');
		$this->db->join('tbl_master_rute as c', 'c.id_rute = a.id_rute');
	
		if (!empty($data['tanggal_berangkat']) && !empty($data['rute'])  &&  !empty($data['transportasi']) ) {
			$this->db->where('a.id_rute ', $data['rute']);
			$this->db->where('b.id_transportasi ', $data['transportasi']);
			$this->db->where('a.tanggal_berangkat =', $data['tanggal_berangkat']);

		
		}


		// pagination limit
        $pagination['base_url'] = base_url().'main/index/page/';
		$pagination['total_rows'] = $this->db->count_all_results();
		$pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
		$pagination['full_tag_close'] = "</div></p>";
		$pagination['cur_tag_open'] = "<span class=\"current\">";
		$pagination['cur_tag_close'] = "</span>";
		$pagination['num_tag_open'] = "<span class=\"disabled\">";
		$pagination['num_tag_close'] = "</span>";
		$pagination['per_page'] = 8;
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;

		$this->pagination->initialize($pagination);

		$data['ListBerita'] = $this->Main_model->ambildata($pagination['per_page'],$this->uri->segment(4,0),$data['tanggal_berangkat'], $data['rute'], $data['transportasi']);

		$this->load->vars($data);
		$this->load->view('front_end/main');
        
     
    }

    public function getAPi($url) {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
        return $output;
	}
	
	function do_upload_images() {
		$id_berangkat = $this->input->post('id_berangkat');
		$name = $this->input->post('nama_lengkap');
		$jenis_kelamin = $this->input->post('jeniskelamin');
		$email = $this->input->post('email');
		$jumlah_peserta = $this->input->post('jumlah_peserta');


		$check = $this->Penjadwalan_berangkat->getCheckSlotKeberangkatan($jumlah_peserta, $id_berangkat);

	
		
		if ($check['status'] == TRUE) {
			echo '<script type="text/javascript">
			alert("Jumlah kapasitas anda tidak terpenuhi");
			window.location.href="./index";
			</script>';
		} 


		$data = [];
   
		$count = count($_FILES['files']['name']);
		$filenamess =[];
		for($i=0;$i<$count;$i++){
	  
		  if(!empty($_FILES['files']['name'][$i])){
	  
			$_FILES['file']['name'] = $_FILES['files']['name'][$i];
			$_FILES['file']['type'] = $_FILES['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
			$_FILES['file']['error'] = $_FILES['files']['error'][$i];
			$_FILES['file']['size'] = $_FILES['files']['size'][$i];
	
			$config['upload_path'] = 'image/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
			$config['max_size'] = '5000';
			$config['file_name'] = $_FILES['files']['name'][$i];
			
			$filenamess [] =  $_FILES['files']['name'][$i];

			
			$this->load->library('upload',$config); 
			
			if($this->upload->do_upload('file')){
			  $uploadData = $this->upload->data();
			  $filename = $uploadData['file_name'];
				
			  $data['totalFiles'][] = $filename;
			}
		  }
	 
		}

		$img1 = $filenamess[0];
		$img2 = $filenamess[1];

		$data = [
			"name" => $name,
			"img1" => $img1,
			"img2" => $img2,
			"jenis_kelamin" => $jenis_kelamin,
			"email"	=> $email,
			"pass" => $this->rand_string($name.$jenis_kelamin.$img1, 8)
		];


		$exec = $this->Transaksi_Berangkat->insertDataPeserta($data);

		$Byemail = ["email" => $email];
		$id_peserta = $this->Transaksi_Berangkat->getPeserta($Byemail);


		$data_transaksi = [
			"id_peserta" 			=> $id_peserta[0]->id_peserta,
			"id_jadwal_berangkat" 	=> $id_berangkat,
			"jumlah_peserta" 		=> $jumlah_peserta,
			"submit_date" 			=> date('Y-m-d'),
			"verifikasi" 			=> "No"
		];

		$id_peserta = $this->Transaksi_Berangkat->insertTransaksi($data_transaksi);

		if ($id_peserta) {
			echo '<script type="text/javascript">
			alert("Data Berhasil didaftarkan");
			window.location.href="./index";
			</script>';
		} 
		
	}

	function rand_string($str, $length ) {
		return substr(str_shuffle($str),0,$length);
	}

}


?>
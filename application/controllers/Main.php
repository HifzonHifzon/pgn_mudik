<?php 


/*
    Hifzon, 8 Oktober 2020
*/
class Main extends CI_Controller {

    function __constuct() {
        parent::__construct();


    }
    
    public function index() {
        if (isset($_POST['q'])) {
            $data['kode_transportasi'] = $this->input->post('kode_transportasi');
            $data['name_transportasi'] = $this->input->post('name_transportasi');
            
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('kode_transportasi', $data['kode_transportasi']);
			$this->session->set_userdata('name_transportasi', $data['name_transportasi']);
		}
		else {
			$data['kode_transportasi'] = $this->session->userdata('kode_transportasi');
			$data['name_transportasi'] = $this->session->userdata('name_transportasi');
		}


		// load model
		$this->load->model('Main_model');

		$this->db->like('kode_transportas', $data['kode_transportasi']);
		$this->db->like('name_transportasi', $data['name_transportasi']);
        $this->db->from('tbl_master_transportasi');

		// pagination limit
        $pagination['base_url'] = base_url().'main/index/page/';
		$pagination['total_rows'] = $this->db->count_all_results();
		$pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
		$pagination['full_tag_close'] = "</div></p>";
		$pagination['cur_tag_open'] = "<span class=\"current\">";
		$pagination['cur_tag_close'] = "</span>";
		$pagination['num_tag_open'] = "<span class=\"disabled\">";
		$pagination['num_tag_close'] = "</span>";
		$pagination['per_page'] = "8";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;

		$this->pagination->initialize($pagination);

		$data['ListBerita'] = $this->Main_model->ambildata($pagination['per_page'],$this->uri->segment(4,0),$data['kode_transportasi'], $data['name_transportasi']);

		$this->load->vars($data);
		$this->load->view('front_end/main');
        
     
    }

    public function getAPi($method, $url) {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
        return $output;
    }
}


?>
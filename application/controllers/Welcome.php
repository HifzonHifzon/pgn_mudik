<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		if (isset($_POST['q'])) {
            $data['nama'] = $this->input->post('nama');
            $data['jurusan'] = $this->input->post('jurusan');
            
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('nama', $data['nama']);
			$this->session->set_userdata('jurusan', $data['jurusan']);
		}
		else {
			$data['nama'] = $this->session->userdata('nama');
			$data['jurusan'] = $this->session->userdata('jurusan');
		}


		// load model
		$this->load->model('modul');

		$this->db->like('nama', $data['nama']);
		$this->db->like('jurusan', $data['jurusan']);
        $this->db->from('pagination');

		// pagination limit
		$pagination['base_url'] = base_url().'welcome/index/page/';
		$pagination['total_rows'] = $this->db->count_all_results();
		$pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
		$pagination['full_tag_close'] = "</div></p>";
		$pagination['cur_tag_open'] = "<span class=\"current\">";
		$pagination['cur_tag_close'] = "</span>";
		$pagination['num_tag_open'] = "<span class=\"disabled\">";
		$pagination['num_tag_close'] = "</span>";
		$pagination['per_page'] = "3";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;

		$this->pagination->initialize($pagination);

		$data['ListBerita'] = $this->modul->ambildata($pagination['per_page'],$this->uri->segment(4,0),$data['nama'], $data['jurusan']);

		$this->load->vars($data);
		$this->load->view('index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
<?php 


/*
    Hifzon, 8 Oktober 2020
*/
class Main extends CI_Controller {

    function __constuct() {
        parent::__construct();


    }
    
    public function index() {
        // api news
        $url_news = 'https://data.covid19.go.id/public/api/update.json';
        $info_covid = json_decode($this->getApi('GET', $url_news), TRUE);

    
        $data['list'] = [
            "indo_positif_covid" => $info_covid['update']['total']['jumlah_positif']
        ];

        $this->load->view('front_end/main', $data);    
        
        
     
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
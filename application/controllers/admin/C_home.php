<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' =>  'Halaman Utama',
            'konten' => 'admin/home'  
        );

        // var_dump($data/);
        
        $this->load->view('templates/templates', $data, FALSE);
        
    }

    public function kontak()
    {
    	$this->load->view('contact');
    }

}

/* End of file C_home.php */

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_jadwal extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_jadwal' , 'jadwal');
        
    }
    

    public function index()
    {

		$jadwal = $this->jadwal->data_jadwal(); 
        $data = array(
            'title' => 'Jadwal' ,
            'jadwal' => $jadwal ,
            'konten' => 'admin/jadwal/index' 
        );   
        
        $this->load->view('templates/templates', $data, FALSE);
        
    }

    public function tambah_jadwal()
	{
		// $this->req->print($_POST);
        $dosen = $this->jadwal->data_dosen();
        $matkul = $this->jadwal->data_matkul();
        $tahun = $this->jadwal->data_tahun();
        

		$valid = $this->form_validation;
		
		$valid->set_rules('id_dosen', 'id_dosen','required', array('required'	=> '%s Harus diisi'));
		$valid->set_rules('id_matkul', 'id_matkul','required', array('required'	=> '%s Harus diisi'));
		$valid->set_rules('hari', 'hari','required', array('required'	=> '%s Harus diisi'));
		$valid->set_rules('jam', 'jam','required', array('required'	=> '%s Harus diisi'));
		
		if ($valid->run()===FALSE) {
		
        $data = array(
                      'title'      	=>  'Tambah Data jadwal',
                      'dosen'       =>  $dosen,
                      'matkul'      =>  $matkul,
                      'tahun'      =>  $tahun,
                      'konten'		=>	'admin/jadwal/add'
                    );
	
		$this->load->view('templates/templates', $data, FALSE);
		
		}else{
			$i = $this->input;
			$data = array(	
                'id_dosen'			=> $i->post('id_dosen'),
                'id_matkul'				=> $i->post('id_matkul'),
                'hari'				=> $i->post('hari'),
                'jam'				=> $i->post('jam'),                
                'tanggal_ujian'				=> $i->post('tanggal_ujian'),                
			);
			
			$this->jadwal->tambah_jadwal($data);
			$last = $this->db->insert_id();
			

			$dataRekapSoal = array(
				'id_dosen'			=> $i->post('id_dosen'),
				'id_jadwal'			=> $last,
				'id_matkul'			=> $i->post('id_matkul'),
				'hari'				=> $i->post('hari'),
				'jam'				=> $i->post('jam'),
				'tanggal_ujian'		=> $i->post('tanggal_ujian'),                
				'id_tahun'			=> $i->post('id_tahun'),                
			);

			// $this->req->print($dataRekapSoal);

			$this->db->insert('t_rekap', $dataRekapSoal);
			
			$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
			redirect(base_url('admin/jadwal'),'refresh');	
		}
	}

	public function edit_jadwal($id) {

		$jadwal = $this->jadwal->detail_jadwal($id);


        $dosen = $this->jadwal->data_dosen();
        $matkul = $this->jadwal->data_matkul();
        $tahun = $this->jadwal->data_tahun();

		$valid = $this->form_validation;

		$valid->set_rules('hari', 'hari','required',
				array('required'	=> '%s Harus diisi'));
		
		if ($valid->run()===FALSE) {

		$data = array('title'	=>  'Ubah jadwal',
					 'jadwal'	=>  $jadwal,
                      'dosen'       =>  $dosen,
                      'matkul'      =>  $matkul,
                      'tahun'      =>  $tahun,
					 'konten'		=>	'admin/jadwal/edit');
		$this->load->view('templates/templates', $data, FALSE);
	
		}else{
			$i = $this->input;
			$data = array(
				'id'				=> $id,
				'id_dosen'			=> $i->post('id_dosen'),
				'id_matkul'			=> $i->post('id_matkul'),
				'hari'				=> $i->post('hari'),
				'jam'				=> $i->post('jam'),
				'tanggal_ujian'		=> $i->post('tanggal_ujian'),    
		);
			$this->jadwal->edit_jadwal($data);


			$dataRekapSoal = array(
				'id_dosen'			=> $i->post('id_dosen'),
				'id_matkul'			=> $i->post('id_matkul'),
				'hari'				=> $i->post('hari'),
				'jam'				=> $i->post('jam'),
				'tanggal_ujian'		=> $i->post('tanggal_ujian'),
				'id_tahun'			=> $i->post('id_tahun'),
			);

			// $this->req->print($dataRekapSoal);

			$this->db->where('id_jadwal', $id);
			$this->db->update('t_rekap', $dataRekapSoal);
			



			$this->session->set_flashdata('sukses', 'Data berhasil diedit');
			redirect(base_url('admin/jadwal'),'refresh');	
		}
	}

	public function hapus_jadwal($id)
	{
			$data = array('id' => $id);
			$this->jadwal->hapus_jadwal($data);
			$this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
			redirect(base_url('admin/jadwal'),'refresh');	
	}

}

/* End of file C_jadwal.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_dosen extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();        
        $this->load->model('M_dosen', 'dosen');

    }

    public function index()
    {
		$dosen = $this->dosen->data_dosen();
		
        $data = array(
			'title'  => 'Dosen',
			'dosen' => $dosen,
            'konten' => 'admin/dosen/index'
        );

        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_dosen()
	{
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_dosen', 'dosen','required', array('required'	=> '%s Harus diisi'));
		
		if ($valid->run()===FALSE) {
		
		$data = array('title'      	=>  'Tambah Data Dosen',
					 'konten'		=>	'admin/dosen/add');
	
		$this->load->view('templates/templates', $data, FALSE);
		
		}else{
			$i = $this->input;
			$data = array(	
                'nama_dosen'			=> $i->post('nama_dosen'),
                'kode_dosen'			=> $i->post('kode_dosen'),
                'nidn'					=> $i->post('nidn'),
                'pendidikan_terakhir'	=> $i->post('pendidikan_terakhir'),
		);
			$this->dosen->tambah_dosen($data);
			$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
			redirect(base_url('admin/dosen'),'refresh');	
		}
	}

	public function edit_dosen($id) {

		$dosen = $this->dosen->detail_dosen($id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_dosen', 'Nama dosen','required',
				array('required'	=> '%s Harus diisi'));
		
		if ($valid->run()===FALSE) {

		$data = array('title'	=>  'Ubah dosen',
					 'dosen'	=>  $dosen,
					 'konten'		=>	'admin/dosen/edit');
		$this->load->view('templates/templates', $data, FALSE);
	
		}else{
			$i = $this->input;
			$data = array(	'id'					=> $id,
							'nama_dosen'			=> $i->post('nama_dosen'),
			                'kode_dosen'			=> $i->post('kode_dosen'),
			                'nidn'					=> $i->post('nidn'),
			                'pendidikan_terakhir'	=> $i->post('pendidikan_terakhir'),
		);
			$this->dosen->edit_dosen($data);
			$this->session->set_flashdata('sukses', 'Data berhasil diedit');
			redirect(base_url('admin/dosen'),'refresh');	
		}
	}

	public function hapus_dosen($id)
	{
			$data = array('id' => $id);
			$this->dosen->hapus_dosen($data);
			$this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
			redirect(base_url('admin/dosen'),'refresh');	
	}


    
}

/* End of file C_dosen.php */

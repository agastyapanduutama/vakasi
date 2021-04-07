<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelas', 'kelas');
    }

    public function index()
    {
        $kelas = $this->kelas->data_kelas();
        $data = array(
            'title'  => 'kelas',
            'kelas' => $kelas,
            'konten' => 'admin/kelas/index'
        );
        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_kelas()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_kelas', 'kelas', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data kelas',
                'konten'        =>    'admin/kelas/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'nama_kelas'            => $i->post('nama_kelas'),
                'kode_kelas'            => $i->post('kode_kelas'),
            );
            $this->kelas->tambah_kelas($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/kelas'), 'refresh');
        }
    }

    public function edit_kelas($id)
    {

        $kelas = $this->kelas->detail_kelas($id);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kelas',
            'Nama kelas',
            'required',
            array('required'    => '%s Harus diisi')
        );

        if ($valid->run() === FALSE) {

            $data = array(
                'title'    =>  'Ubah kelas',
                'kelas'    =>  $kelas,
                'konten'        =>    'admin/kelas/edit'
            );
            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id'        => $id,    
                'nama_kelas'            => $i->post('nama_kelas'),
                'kode_kelas'            => $i->post('kode_kelas'),
            );
            $this->kelas->edit_kelas($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/kelas'), 'refresh');
        }
    }

    public function hapus_kelas($id)
    {
        $data = array('id' => $id);
        $this->kelas->hapus_kelas($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/kelas'), 'refresh');
    }
}

/* End of file C_kelas.php */

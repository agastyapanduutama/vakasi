<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_tahun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tahun', 'tahun');
    }

    public function index()
    {
        $tahun = $this->tahun->data_tahun();
        $data = array(
            'title'  => 'tahun',
            'tahun' => $tahun,
            'konten' => 'admin/tahun/index'
        );
        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_tahun()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_tahun', 'tahun', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data tahun',
                'konten'        =>    'admin/tahun/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'nama_tahun'            => $i->post('nama_tahun'),
                'kode_tahun'            => $i->post('kode_tahun'),
                'tahun_akhir'            => $i->post('tahun_akhir'),
            );
            $this->tahun->tambah_tahun($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/tahun'), 'refresh');
        }
    }

    public function edit_tahun($id)
    {

        $tahun = $this->tahun->detail_tahun($id);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_tahun',
            'Nama tahun',
            'required',
            array('required'    => '%s Harus diisi')
        );

        if ($valid->run() === FALSE) {

            $data = array(
                'title'    =>  'Ubah tahun',
                'tahun'    =>  $tahun,
                'konten'        =>    'admin/tahun/edit'
            );
            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id'        => $id,
                'nama_tahun'            => $i->post('nama_tahun'),
                'kode_tahun'            => $i->post('kode_tahun'),
                'tahun_akhir'            => $i->post('tahun_akhir'),
            );
            $this->tahun->edit_tahun($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/tahun'), 'refresh');
        }
    }

    public function hapus_tahun($id)
    {
        $data = array('id' => $id);
        $this->tahun->hapus_tahun($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/tahun'), 'refresh');
    }
}

/* End of file C_tahun.php */

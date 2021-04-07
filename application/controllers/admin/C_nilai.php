<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_nilai', 'nilai');
    }

    public function index()
    {
        $nilai = $this->nilai->data_nilai();
        $data = array(
            'title'  => 'nilai',
            'nilai' => $nilai,
            'konten' => 'admin/nilai/index'
        );
        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_nilai()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_nilai', 'nilai', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data nilai',
                'konten'        =>    'admin/nilai/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'nama_nilai'            => $i->post('nama_nilai'),
                'kode_nilai'            => $i->post('kode_nilai'),
                'harga_nilai'            => $i->post('harga_nilai'),
            );
            $this->nilai->tambah_nilai($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/nilai'), 'refresh');
        }
    }

    public function edit_nilai($id)
    {

        // var_dump($_POST);

        // $this->req->print($_POST);

        $nilai = $this->nilai->detail_nilai($id);

        $valid = $this->form_validation;

        $valid->set_rules('nama_nilai','Nama nilai','required',
                array('required'    => '%s Harus diisi')
        );

        if ($valid->run() === FALSE) {

            $data = array(
                'title'    =>  'Ubah nilai',
                'nilai'    =>  $nilai,
                'konten'        =>    'admin/nilai/edit'
            );
            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id'            => $id,
                'nama_nilai'    => $i->post('nama_nilai'),
                'kode_nilai'    => $i->post('kode_nilai'),
                'harga_nilai'   => $i->post('harga_nilai'),
            );
            $this->nilai->edit_nilai($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/nilai'), 'refresh');
        }
    }

    public function hapus_nilai($id)
    {
        $data = array('id' => $id);
        $this->nilai->hapus_nilai($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/nilai'), 'refresh');
    }
}

/* End of file C_nilai.php */

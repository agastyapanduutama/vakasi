<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_matkul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_matkul', 'matkul');
    }

    public function index()
    {
        $matkul = $this->matkul->data_matkul(); 
        $data = array(
            'title'  => 'matkul',
            'matkul' => $matkul,
            'konten' => 'admin/matkul/index'
        );
        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_matkul()
    {

        $kelas = $this->matkul->data_kelas();
        $valid = $this->form_validation;

        $valid->set_rules('nama_matkul', 'matkul', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data matkul',
                'kelas'          =>  $kelas,
                'konten'        =>   'admin/matkul/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'nama_matkul'            => $i->post('nama_matkul'),
                'kode_matkul'            => $i->post('kode_matkul'),
                'sks'                    => $i->post('sks'),
                'jenis_kelas'    => $i->post('jenis_kelas'),
            );
            $this->matkul->tambah_matkul($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/matkul'), 'refresh');
        }
    }

    public function edit_matkul($id)
    {

        $kelas = $this->matkul->data_kelas();
        $matkul = $this->matkul->detail_matkul($id);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_matkul',
            'Nama matkul',
            'required',
            array('required'    => '%s Harus diisi')
        );

        if ($valid->run() === FALSE) {

            $data = array(
                'title'    =>  'Ubah matkul',
                'matkul'    =>  $matkul,
                'kelas'    =>  $kelas,
                'konten'        =>    'admin/matkul/edit'
            );
            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            // $this->req->print($id);
            $data = array(
                'id'                     => $id,
                'nama_matkul'            => $i->post('nama_matkul'),
                'kode_matkul'            => $i->post('kode_matkul'),
                'sks'                    => $i->post('sks'),
                'jenis_kelas'            => $i->post('jenis_kelas'),
            );
            // $this->db->where('$id', $data['id']);
            // $this->db->update('t_matkul', $data);
            $this->matkul->edit_matkul($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            // echo $this->db->last_query();
            redirect(base_url('admin/matkul'), 'refresh');
        }
    }

    public function hapus_matkul($id)
    {
        $data = array('id' => $id);
        $this->matkul->hapus_matkul($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/matkul'), 'refresh');
    }
}

/* End of file C_matkul.php */

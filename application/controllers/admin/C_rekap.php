<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_rekap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_rekap', 'rekap');
    }

    public function index()
    {
        $rekap = $this->rekap->data_rekap();
        $data = array(
            'title' => 'Rekap Soal',
            'rekap' => $rekap,
            'konten' => 'admin/rekap/rekapsoal'
        );

        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_rekap()
    {
        $dosen  = $this->rekap->data_dosen();
        $matkul = $this->rekap->data_matkul();
        $kelas  = $this->rekap->data_kelas();
        $tahun  = $this->rekap->data_tahun();
        $nourut = $this->rekap->getNomorUrut();

        $valid = $this->form_validation;

        $valid->set_rules('jenis_ujian', 'jenis_ujian', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data rekap Soal',
                'dosen'          =>  $dosen,
                'matkul'         =>  $matkul,
                'kelas'          =>  $kelas,
                'tahun'          =>  $tahun,
                'nourut'         =>  $nourut,
                'konten'         =>  'admin/rekap/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'jenis_ujian'      => $i->post('jenis_ujian'),
                'semester'         => $i->post('semester'),
                'tahun'            => date('Y'),
                'id_tahun'         => $i->post('id_tahun'),
                'kode_soal'        => $i->post('kode_soal'),
                'jumlah_soal'      => $i->post('jumlah_soal'),
                'kode_dosen'       => $i->post('kode_dosen'),
                'kode_matkul'      => $i->post('kode_matkul'),
                'kode_kelas'       => $i->post('kode_kelas'),
                'tanggal_ujian'     => $i->post('tanggal_ujian'),
                'tanggal_pengumpulan'  => $i->post('tanggal_pengumpulan'),
                'status_soal'           => $i->post('status'),
            );

            // $this->req->print($data);


            $this->rekap->tambah_rekap($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/rekap'), 'refresh');

        }
    }

    public function edit_rekap($id)
    {   

        $rekap  = $this->rekap->detail_rekap($id);

        $valid = $this->form_validation;

        $valid->set_rules('jumlah_soal', 'jumlah_soal', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Edit Data Rekap Soal',
                'rekap'          =>  $rekap,
                'konten'         =>  'admin/rekap/edit_soal'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id'            => $id,
                'jumlah_soal'      => $i->post('jumlah_soal'),
                // 'nilai_if'      => $i->post('nilai_if'),
                // 'nilai_si'      => $i->post('nilai_si'),
            );

            // $this->req->print($data);


            $this->rekap->edit_rekap($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/rekap'), 'refresh');

        }
    }

    public function hapus_rekap($id)
    {
        $data = array('id' => $id);
        $this->rekap->hapus_rekap($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/rekap'), 'refresh');
    }
}

/* End of file C_rekap.php */

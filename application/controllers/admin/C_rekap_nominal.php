<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_rekap_nominal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('M_rekap_nominal', 'rekap_nominal');
    }

    public function index()
    {

        $rekap_nominal = $this->rekap_nominal->data_rekap_nominal();

        $data = array(
            'title'             => 'Rekap Nominal',
            'rekap_nominal'     => $rekap_nominal,
            'konten'            => 'admin/rekap_nominal/index'
        );


        $this->load->view('templates/templates', $data, FALSE);
    }

    public function print()
    {

        $rekap = $this->rekap_nominal->data_rekap_nominal();

        $data = array(
            'title'             => 'Rekap Nominal',
            'rekap_nominal'     => $rekap,
        );
        $this->load->view('admin/rekap_nominal/print', $data, FALSE);
    }

    public function filter()
    {
        $akademik = $this->input->post('id_tahun');
        $dosen    = $this->input->post('id_dosen');

        

        $rekap = $this->rekap_nominal->filter_rekap_nominal($akademik, $dosen);

        $data = array(
            'title'             => 'Rekap Nominal',
            'rekap_nominal'     => $rekap,
            'konten'            => 'admin/rekap_nominal/index_filter'
        );
        $this->load->view('templates/templates', $data, FALSE);
    }

   public function printFilter()
   {

        $akademik = $this->input->post('a');
        $dosen    = $this->input->post('b');

        $namaDosen = $this->db->get_where('t_dosen', ['id' => $dosen])->row();
        $namaTahun = $this->db->get_where('t_tahun', ['id' => $akademik])->row();

        $rekap = $this->rekap_nominal->print_filter_rekap_nominal($akademik, $dosen);

        $data = array(
            'title'             => 'Rekap Nominal',
            'rekap_nominal'     => $rekap,
            'dosen'             => $namaDosen,
            'tahun'             => $namaTahun,
        );
        $this->load->view('admin/rekap_nominal/print_filter', $data, FALSE);
   }

    public function print_filter_rekap_nominal()
    {
        $dosen = $this->rekap_nominal->data_dosen();
        $matkul = $this->rekap_nominal->data_matkul();
        $kelas = $this->rekap_nominal->data_kelas();

        $valid = $this->form_validation;

        $valid->set_rules('jenis_ujian', 'jenis_ujian', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'          =>  'Tambah Data rekap_nominal',
                'dosen'       =>  $dosen,
                'matkul'      =>  $matkul,
                'kelas'      =>  $kelas,
                'konten'        =>    'admin/rekap_nominal/add'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'jenis_ujian'            => $i->post('jenis_ujian'),
                'semester'            => $i->post('semester'),
                'tahun'            => $i->post('tahun'),
                'nilai_if'            => $i->post('nilai_if'),
                'nilai_si'            => $i->post('nilai_si'),
                'jumlah_soal'            => $i->post('jumlah_soal'),
                'kode_dosen'            => $i->post('kode_dosen'),
                'kode_matkul'            => $i->post('kode_matkul'),
                'kode_kelas'            => $i->post('kode_kelas'),
                'status'             => $i->post('status'),
            );
            $this->rekap_nominal->tambah_rekap_nominal($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
            redirect(base_url('admin/rekap_nominal'), 'refresh');
        }
    }

    public function edit_rekap_nominal($id)
    {

        $rekap_nominal = $this->rekap_nominal->detail_rekap_nominal($id);
        $kode = $this->rekap_nominal->getNomorUrut($id);

        $valid = $this->form_validation;

        $valid->set_rules(
            'kode',
            'kode',
            'required',
            array('required'    => '%s Harus diisi')
        );

        if ($valid->run() === FALSE) {

            $data = array(
                'title'    =>  'Ubah rekap_nominal',
                'rekap_nominal'    =>  $rekap_nominal,
                'kode'    =>  $kode,
                'konten'        =>    'admin/rekap_nominal/edit'
            );
            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id'        => $id,
                'kode'      => $i->post('kode'),
                'nama'      => $i->post('nama'),
                'jenis'     => $i->post('jenis'),
                'nominal'   => $i->post('nominal'),

            );
            // var_dump($data);
            $this->rekap_nominal->edit_rekap_nominal($data);
            // echo $this->db->last_query();;
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/rekap/nominal'), 'refresh');
        }
    }

    public function hapus_rekap_nominal($id)
    {
        $data = array('id' => $id);
        $this->rekap_nominal->hapus_rekap_nominal($data);
        $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
        redirect(base_url('admin/rekap/nominal'), 'refresh');
    }
}

/* End of file C_rekap_nominal.php */

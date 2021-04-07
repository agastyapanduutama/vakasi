<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_rekapnilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_rekap', 'rekap');
    }

    public function index()
    {

        $rekap = $this->rekap->data_rekapNIlai();
        $data = array(
            'title' => 'Rekap Nilai',
            'rekap' => $rekap,
            'konten' => 'admin/rekap/rekapnilai'
        );


        $this->load->view('templates/templates', $data, FALSE);
    }

    public function tambah_rekap()
    {
        $dosen = $this->rekap->data_dosen();
        $matkul = $this->rekap->data_matkul();
        $kelas = $this->rekap->data_kelas();
        $tahun = $this->rekap->data_tahun();
        $soal = $this->rekap->data_soal();
        $nilai = $this->rekap->data_nilai();

        // $this->req->print($soal);

        $valid = $this->form_validation;

        $valid->set_rules('kode_soal', 'kode_soal', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {

            $data = array(
                'title'         =>  'Tambah Data rekap',
                'soal'         =>  $soal,
                'dosen'         =>  $dosen,
                'matkul'        =>  $matkul,
                'kelas'         =>  $kelas,
                'tahun'         =>  $tahun,
                'nilai'         =>  $nilai,
                'konten'        =>  'admin/rekap/add_nilai'
            );

            $this->load->view('templates/templates', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
               'kode_soal' => $i->post('kode_soal'),
               'nilai_if'   => $i->post('nilai_if'),
               'nilai_si'   => $i->post('nilai_si'),
            );

        }
    }

    public function editNa()
    {

        $code = $this->input->post('kode_soal');

        $hasil = $this->db->get_where('t_rekap', ['id' => $code])->row();
        // $this->req->print($hasil);
        
        $data = array(
            'nilai_if'          => $this->input->post('nilai_if'), 
            'nilai_si'          => $this->input->post('nilai_si'), 
            'kode_nilai'        => $this->input->post('kode_nilai'), 
            'status'       => 1, 
            'tanggal_ujian'     => $this->input->post('tanggal_ujian'),
            'tanggal_pengumpulan' => $this->input->post('tanggal_pengumpulan'), 
        );

        // $this->req->print($code);

        $this->db->where('id', $code);
        $this->db->update('t_rekap', $data);


        // $hasilNa = $this->db->select('t_nilai.harga_nilai ,t_nilai.kode_nilai, t_rekap.*')
        //          ->from('t_rekap')
        //          ->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai','LEFT' )
        //          ->where('t_rekap.id', $code)
        //          ->get()->row();

        // $this->req->print($hasilNa);


        if ($this->db->affected_rows() > 0) {
            $if = $hasilNa->nilai_if;
            $si = $hasilNa->nilai_si;
            $if = ($if == '') ? 0 : 2;
            $retIf = ($if == '') ? $if = 0 : $if = $hasilNa->nilai_if;
            $retSi = ($si == '') ? $si = 0 : $si = $hasilNa->nilai_si;
            $retNum = $retIf + $retSi;
            $harga = 10000;
            $soal = $retNum;
            $jumlah = $hasilNa->jumlah_soal;
            $nilai = $hasilNa->harga_nilai;

            $ujian          = new DateTime($hasilNa->tanggal_ujian);
            $dikumpulkan    = new DateTime($hasilNa->tanggal_pengumpulan);
            $range          = $dikumpulkan->diff($ujian);

            if ($hasilNa->kode_nilai == "EKS" || $hasilNa->kode_nilai == "REG") {
                if ($range <= 14 ) {
                    $nilai = $nilai+1000;
                }
            }

            $hargaSoal = $harga * $jumlah;
            $hargaNilai = $soal * $nilai;
            $total = $hargaNilai + $hargaSoal;

            $dataNom = array(
                'id_rekap'      => $hasil->id ,
                'jumlah_soal'   => $jumlah,
                'harga_soal'    => $hargaSoal,
                'jumlah_nilai'  => $retNum,
                'harga_nilai'   => $hargaNilai,
                'jumlah'        => $total,
            );

            // $this->req->print($dataNom);
            $this->db->insert('t_rekap_nom', $dataNom);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan nilai');
            }
        }else{
            $this->session->set_flashdata('success', 'Terjadi kesalahan saat menambahkan data');
        }
            redirect('admin/rekap/nilai','refresh');
        
    }



    public function edit_rekap($kode)
    {


        $rekap  = $this->rekap->detail_rekap_nilai($kode);
        $valid = $this->form_validation;

        $valid->set_rules('nilai_if', 'nilai_if', 'required', array('required'    => '%s Harus diisi'));

        if ($valid->run() === FALSE) {
            
            $data = array(
                'title'         =>  'Edit Data Rekap Nilai',
                'rekap'         =>  $rekap,
                'harga'         =>  $this->db->get('t_nilai')->result(),
                'konten'        =>  'admin/rekap/edit_nilai'
            );

            $this->load->view('templates/templates', $data, FALSE);

        }else{
            
            $data = array(
                'id' => $kode,
                'nilai_if'  => $this->input->post('nilai_if'), 
                'nilai_si'  => $this->input->post('nilai_si'), 
                'id_nilai'  => $this->input->post('id_nilai'), 
                'status' => '1',
            );

            // $this->req->print($data);
            $this->db->where('id', $kode);
            $this->db->update('t_rekap', $data);

            $rekapNilai = $this->db->get_where('t_rekap', ['id' => $kode])->row();
            
            $if = $rekapNilai->nilai_if;
            $si = $rekapNilai->nilai_si;

            $retIf = ($if == NULL) ? $if = 0 : $if = $rekapNilai->nilai_if;
            $retSi = ($si == NULL) ? $si = 0 : $si = $rekapNilai->nilai_si;
            
            $JumlahIfdanSI = $retIf + $retSi;
            // $this->req->print($JumlahIfdanSI);

            $dataRekapNom = array(
                'id_rekap' => $rekapNilai->id, 
                'jumlah_soal' => $rekapNilai->jumlah_soal, 
                'jumlah_nilai' => $JumlahIfdanSI, 
                'id_nilai' => $this->input->post("id_nilai"),
                'id_ujian' => $this->input->post("id_ujian"),
            );

            // $this->req->print($dataRekapNom);
            // $this->db->insert('t_rekap_nom', $object);


            $idNilai = $this->input->post("id_nilai");
            $hargaNa = $this->db->get_where('t_nilai', ['id' => $idNilai ])->row();
            // $this->req->print($hargaNa->harga_nilai);

            // echo $harga->harga_nilai;

            // Deklarasi Nilai IF dan SI
            $if     = $rekapNilai->nilai_if;
            $si     = $rekapNilai->nilai_si;
            $if     = ($if == '') ? 0 : 2;
            $retIf  = ($if == '') ? $if = 0 : $if = $rekapNilai->nilai_if;
            $retSi  = ($si == '') ? $si = 0 : $si = $rekapNilai->nilai_si;
            $retNum = $retIf + $retSi;
            $harga  = 10000;
            $soal   = $retNum;    
            $jumlah = $rekapNilai->jumlah_soal;
            $nilaiNa  = $hargaNa->harga_nilai;

            // $this->req->print($nilaiNa);

            $tanggalKumpul = date('Y-m-d');
            // $this->req->print($tanggalKumpul);

            $ujian          = new DateTime($rekapNilai->tanggal_ujian);
            $dikumpulkan    = new DateTime($tanggalKumpul);
            $range          = $dikumpulkan->diff($ujian);
            // $this->req->print($range);

            if ($hargaNa->kode_nilai == "EKS" || $hargaNa->kode_nilai == "REG") {
                if ($range->days <= 14 ) {
                    $nilaiNa = $nilaiNa+1000;
                }
            }

            // echo $nilaiNa;
            // $this->req->print($nilaiNa);

            $hargaSoal = $harga * $jumlah;
            $hargaNilai = $soal * $nilaiNa;
            $total = $hargaNilai + $hargaSoal;

            // $this->req->print($total);

            $dataNom = array(
                'id_rekap'      => $rekapNilai->id ,
                'id_tahun'      => $rekapNilai->id_tahun ,
                'jumlah_soal'   => $jumlah,
                'harga_soal'    => $hargaSoal,
                'jumlah_nilai'  => $retNum,
                'harga_nilai'   => $hargaNilai,
                'jumlah'        => $total,
                'id_nilai'      => $this->input->post("id_nilai"),
                'jenis_ujian'   => $this->input->post('id_ujian'),
				'tanggal_ujian'		  => $rekapNilai->tanggal_ujian,     
                'tanggal_pengumpulan' => $tanggalKumpul,
            );

            $cekData = $this->db->get_where('t_rekap_nom', ['id_rekap' => $rekapNilai->id])->num_rows();

            if ($cekData > 0) {
                $this->db->where('id_rekap', $dataNom['id_rekap']);
                $this->db->update('t_rekap_nom', $dataNom);
            }else{
                $this->db->insert('t_rekap_nom', $dataNom);
            }

            

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan nilai');
            }else{
                $this->session->set_flashdata('success', 'Terjadi kesalahan saat menambahkan data');
            }
                redirect('admin/rekap/nilai','refresh');
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

/* End of file C_rekapnilai.php */

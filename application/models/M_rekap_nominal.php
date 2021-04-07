<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_rekap_nominal extends CI_Model
{

    function data_matkul()
    {

        $this->db->from('t_matkul');
        $this->db->order_by('nama_matkul', 'ASC');
        return $this->db->get()->result();
    }

    function data_dosen()
    {

        $this->db->from('t_dosen');
        $this->db->order_by('nama_dosen', 'ASC');
        return $this->db->get()->result();
    }

    function data_kelas()
    {

        $this->db->from('t_kelas');
        $this->db->order_by('nama_kelas', 'ASC');
        return $this->db->get()->result();
    }

    // rekap_nominal
    public function data_rekap_nominal()
    {
        $this->db->select('t_rekap_nom.*, t_rekap.* ,t_dosen.nama_dosen, t_matkul.*, t_nilai.nama_nilai, t_tahun.*');
        $this->db->from('t_rekap_nom');
        $this->db->join('t_rekap', 't_rekap.id = t_rekap_nom.id_rekap', 'left');
        $this->db->join('t_dosen', 't_dosen.id = t_rekap.id_dosen', 'left');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap.id_matkul', 'left');
        $this->db->join('t_nilai', 't_nilai.id = t_rekap.id_nilai', 'left');
        $this->db->join('t_tahun', 't_tahun.id = t_rekap_nom.id_tahun', 'left');
        
        
        // $this->db->join('t_kelas', 't_kelas.id = t_rekap.kode_kelas');
        // $this->db->join('t_tahun', 't_tahun.id = t_rekap.id_tahun');
        // $this->db->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai');
        // $this->db->join('t_rekap_nom', 't_rekap_nom.id_rekap = t_rekap.id');
        $this->db->order_by('t_rekap_nom.id', 'desc');
        return $this->db->get()->result();
        
    }

    public function filter_rekap_nominal($akademik, $dosen)
    {
        $this->db->select('t_rekap_nom.*, t_rekap.* ,t_dosen.nama_dosen, t_matkul.*, t_nilai.nama_nilai, t_tahun.nama_tahun, t_tahun.tahun_akhir');
        $this->db->from('t_rekap_nom');
        $this->db->join('t_rekap', 't_rekap.id = t_rekap_nom.id_rekap', 'left');
        $this->db->join('t_dosen', 't_dosen.id = t_rekap.id_dosen', 'left');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap.id_matkul', 'left');
        $this->db->join('t_nilai', 't_nilai.id = t_rekap.id_nilai', 'left');
        $this->db->join('t_tahun', 't_tahun.id = t_rekap_nom.id_tahun', 'left');
        $this->db->where('t_rekap.id_tahun', $akademik);
        $this->db->where('t_rekap.id_dosen', $dosen );

        // $this->db->join('t_kelas', 't_kelas.id = t_rekap.kode_kelas');
        // $this->db->join('t_tahun', 't_tahun.id = t_rekap.id_tahun');
        // $this->db->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai');
        // $this->db->join('t_rekap_nom', 't_rekap_nom.id_rekap = t_rekap.id');
        $this->db->order_by('t_rekap_nom.id', 'desc');
        return $this->db->get()->result();
    }

    public function print_filter_rekap_nominal($akademik, $dosen)
    {
        $this->db->select('t_rekap_nom.*, t_rekap.* ,t_dosen.nama_dosen, t_matkul.*, t_nilai.nama_nilai, t_tahun.nama_tahun, t_tahun.tahun_akhir');
        $this->db->from('t_rekap_nom');
        $this->db->join('t_rekap', 't_rekap.id = t_rekap_nom.id_rekap', 'left');
        $this->db->join('t_dosen', 't_dosen.id = t_rekap.id_dosen', 'left');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap.id_matkul', 'left');
        $this->db->join('t_nilai', 't_nilai.id = t_rekap.id_nilai', 'left');
        $this->db->join('t_tahun', 't_tahun.id = t_rekap_nom.id_tahun', 'left');
        $this->db->where('t_rekap.id_tahun', $akademik);
        $this->db->where('t_rekap.id_dosen', $dosen );

        // $this->db->join('t_kelas', 't_kelas.id = t_rekap.kode_kelas');
        // $this->db->join('t_tahun', 't_tahun.id = t_rekap.id_tahun');
        // $this->db->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai');
        // $this->db->join('t_rekap_nom', 't_rekap_nom.id_rekap = t_rekap.id');
        $this->db->order_by('t_rekap_nom.id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_rekap_nominal($id)
    {
        $this->db->select('t_nilai.harga_nilai, t_rekap_nominal.*, t_dosen.nama_dosen, t_matkul.nama_matkul, t_kelas.nama_kelas ');
        $this->db->from('t_rekap_nominal');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap_nominal.kode_matkul', 'left');
        $this->db->join('t_dosen', 't_dosen.id = t_rekap_nominal.kode_dosen', 'left');
        $this->db->join('t_kelas', 't_kelas.id = t_rekap_nominal.kode_kelas', 'left');
        $this->db->join('t_nilai', 't_nilai.id = t_rekap_nominal.kode_nilai', 'left');
        
        $this->db->where('t_rekap_nominal.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_rekap_nominal($data)
    {
        $this->db->insert('t_rekap_nominal', $data);
    }

    public function edit_rekap_nominal($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_rekap_nominal', $data);
    }

    public function hapus_rekap_nominal($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_rekap_nominal', $data);
    }

    function getNomorUrut()
    {
        $urut = "RNMSTMIK0000";

        $this->db->select("id");
        $this->db->from('t_rekap_nominal');
        $this->db->distinct();
        $nomor = $this->db->get()->num_rows();
        $panjang = strlen($nomor);
        $urut_ = substr($urut, 0, strlen($urut) - $panjang);
        $nomor = $nomor + 1;
        $tahun = date('Y', time());
        return "$urut_$nomor-$tahun";
    }

    public function dataNa()
    {
        $this->db->select('*');
        $this->db->from('t_rekap');
        $this->db->join('t_dosen', 't_dosen.id = t_rekap.kode_dosen', 'left');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap.kode_matkul', 'left');
        $this->db->join('t_tahun', 't_tahun.id = t_rekap.id_tahun', 'left');
        $this->db->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai', 'left');
        $this->db->join('t_rekap_nom', 't_rekap_nom.id_rekap = t_rekap.id', 'left');
        $this->db->order_by('t_rekap_nom.id', 'desc');
        $this->db->get()->result();
        
    }

    public function dataNana()
    {

        $this->db->select('*');
        $this->db->from('t_rekap');
        $this->db->get()->result();
        // $this->db->select('*')
        //  ->from('t_rekap')
        //  ->join('t_dosen', 't_dosen.id = t_rekap.kode_dosen')
        //  ->join('t_kelas', 't_kelas.id = t_rekap.kode_kelas')
        //  ->join('t_tahun', 't_tahun.id = t_rekap.id_tahun')
        //  ->join('t_nilai', 't_nilai.id = t_rekap.kode_nilai')
        //  ->join('t_matkul', 't_matkul.id = t_rekap.kode_matkul')
        //  ->join('t_rekap_nom', 't_rekap_nom.id_rekap = t_rekap.id');
        //  if ($akademik != '' && $dosen != '') {
        //      $this->db->where('t_rekap.kode_dosen', $dosen )
        //      ->or_where('t_rekap.id_tahun', $akademik);
        //  }
        //  $this->db->order_by('t_rekap_nom.id', 'desc')
        //  ->get()->result_array();
    }


}

/* End of file M_rekap_nominal.php */

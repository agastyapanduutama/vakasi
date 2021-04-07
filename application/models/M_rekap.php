<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model {

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

    function data_soal()
    {
        $this->db->select('t_rekap.*, t_matkul.nama_matkul, t_matkul.kode_matkul');
        $this->db->from('t_rekap');
        $this->db->join('t_matkul', 't_matkul.id = t_rekap.kode_matkul', 'left');
        $this->db->where('nilai_if ', '');
        $this->db->or_where('nilai_si ', '');
        $this->db->order_by('kode_soal', 'ASC');
        return $this->db->get()->result();
    }

    function data_nilai()
    {
        $this->db->from('t_nilai');
        $this->db->order_by('kode_nilai', 'ASC');
        return $this->db->get()->result();
    }

    function data_tahun()
    {

        $this->db->from('t_tahun');
        $this->db->order_by('nama_tahun', 'ASC');
        return $this->db->get()->result();
    }

    // rekap
    public function data_rekap()
    {
        $this->db->select('r.*, d.nama_dosen, m.kode_matkul, m.nama_matkul, m.sks, m.jenis_kelas, k.nama_kelas ');
        $this->db->from('t_rekap r');
        $this->db->join('t_dosen d', 'd.id = r.id_dosen', 'left');
        $this->db->join('t_matkul m', 'm.id = r.id_matkul', 'left');
        $this->db->join('t_kelas k', 'k.id = m.jenis_kelas', 'left');
        $this->db->order_by('r.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // rekap
    public function data_rekapNIlai()
    {
        $this->db->select('r.*, d.nama_dosen, m.kode_matkul, m.nama_matkul, m.sks, m.jenis_kelas, k.nama_kelas ');
        $this->db->from('t_rekap r');
        $this->db->join('t_dosen d', 'd.id = r.id_dosen', 'left');
        $this->db->join('t_matkul m', 'm.id = r.id_matkul', 'left');
        $this->db->join('t_kelas k', 'k.id = m.jenis_kelas', 'left');
        $this->db->order_by('r.id', 'desc');
        $this->db->where('r.jumlah_soal !=', NULL);
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_rekap($id)
    {
        $this->db->select('*');
        $this->db->from('t_rekap');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

     public function detail_rekap_nilai($id)
    {
        $this->db->select('*');
        $this->db->from('t_rekap');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_rekap($data)
    {
        $this->db->insert('t_rekap', $data);
        // $this->db->insert('t_rekap_nominal', $data);
    }

    public function edit_rekap($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_rekap', $data);
    }

    public function hapus_rekap($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_rekap', $data);
    }

    function getNomorUrut()
    {
        $urut = "STMIK0000";

        $this->db->select("id");
        $this->db->from('t_rekap');
        $this->db->distinct();
        $nomor = $this->db->get()->num_rows();
        $panjang = strlen($nomor);
        $urut_ = substr($urut, 0, strlen($urut) - $panjang);
        $nomor = $nomor + 1;
        $tahun = date('Y', time());
        return "$urut_$nomor-$tahun";
    }


}

/* End of file M_rekap.php */

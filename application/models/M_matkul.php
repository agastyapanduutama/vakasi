<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_matkul extends CI_Model
{

    function data_kelas()
    {
        $this->db->from('t_kelas');
        $this->db->order_by('nama_kelas', 'ASC');
        return $this->db->get()->result();
    }

    // matkul
    public function data_matkul()
    {
        $this->db->select('t_matkul.*, t_kelas.nama_kelas');
        $this->db->from('t_matkul');
        $this->db->join('t_kelas', 't_kelas.id = t_matkul.jenis_kelas', 'left');
        $this->db->order_by('t_matkul.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_matkul($id)
    {
        $this->db->select('*');
        $this->db->from('t_matkul');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_matkul($data)
    {
        $this->db->insert('t_matkul', $data);
    }

    public function edit_matkul($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_matkul', $data);
    }

    public function hapus_matkul($data)
    {
        $this->db->delete('t_matkul', $data);
    }
}

/* End of file M_matkul.php */

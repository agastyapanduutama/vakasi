<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{

    // kelas
    public function data_kelas()
    {
        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_kelas($id)
    {
        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_kelas($data)
    {
        $this->db->insert('t_kelas', $data);
    }

    public function edit_kelas($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_kelas', $data);
    }

    public function hapus_kelas($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_kelas', $data);
    }
}

/* End of file M_kelas.php */

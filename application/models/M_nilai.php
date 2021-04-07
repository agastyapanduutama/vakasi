<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_nilai extends CI_Model
{

    // nilai
    public function data_nilai()
    {
        $this->db->select('*');
        $this->db->from('t_nilai');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_nilai($id)
    {
        $this->db->select('*');
        $this->db->from('t_nilai');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_nilai($data)
    {
        $this->db->insert('t_nilai', $data);
    }

    public function edit_nilai($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_nilai', $data);
    }

    public function hapus_nilai($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_nilai', $data);
    }
}

/* End of file M_nilai.php */

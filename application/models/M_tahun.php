<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tahun extends CI_Model
{

    // tahun
    public function data_tahun()
    {
        $this->db->select('*');
        $this->db->from('t_tahun');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_tahun($id)
    {
        $this->db->select('*');
        $this->db->from('t_tahun');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_tahun($data)
    {
        $this->db->insert('t_tahun', $data);
    }

    public function edit_tahun($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_tahun', $data);
    }

    public function hapus_tahun($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_tahun', $data);
    }
}

/* End of file M_tahun.php */

<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

    public function data_matkul()
    {
        $this->db->select('t_matkul.*, t_kelas.nama_kelas');
        $this->db->from('t_matkul');
        $this->db->join('t_kelas', 't_kelas.id = t_matkul.jenis_kelas', 'left');
        $this->db->order_by('t_matkul.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    function data_dosen(){
        
        $this->db->from('t_dosen');
        $this->db->order_by('nama_dosen', 'ASC');
        return $this->db->get()->result();
    
    }

    function data_tahun(){
        
        $this->db->from('t_tahun');
        $this->db->order_by('nama_tahun', 'ASC');
        return $this->db->get()->result();
    
    }


    // jadwal
    public function data_jadwal()
    {
        // $this->db->select('t_tahun.*,t_jadwal.*, t_matkul.nama_matkul, t_dosen.nama_dosen');
        // $this->db->from('t_jadwal');
        // $this->db->join('t_matkul', 't_matkul.id = t_jadwal.kode_matkul', 'left');
        // $this->db->join('t_dosen', 't_dosen.id = t_jadwal.kode_dosen', 'left');
        // $this->db->join('t_tahun', 't_tahun.id = t_jadwal.tahun', 'left');
        // $this->db->order_by('t_jadwal.id', 'desc');
        
        $this->db->select('j.*, d.nama_dosen, m.kode_matkul, m.nama_matkul, m.sks, m.jenis_kelas, k.nama_kelas ');
        $this->db->from('t_jadwal j');
        $this->db->join('t_dosen d', 'd.id = j.id_dosen', 'left');
        $this->db->join('t_matkul m', 'm.id = j.id_matkul', 'left');
        $this->db->join('t_kelas k', 'k.id = m.jenis_kelas', 'left');
        $this->db->order_by('j.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_jadwal($id)
    {
        $this->db->select('*');
        $this->db->from('t_jadwal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah_jadwal($data)
    {
        $this->db->insert('t_jadwal', $data);
    }

    public function edit_jadwal($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('t_jadwal', $data);
    }

    public function hapus_jadwal($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('t_jadwal', $data);
    }


}

/* End of file M_jadwal.php */

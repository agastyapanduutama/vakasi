<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {

    // dosen
	public function data_dosen()
	{
		$this->db->select('*');
		$this->db->from('t_dosen');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_dosen($id)
	{
		$this->db->select('*');
		$this->db->from('t_dosen');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah_dosen($data){
		$this->db->insert('t_dosen', $data);
	}

	public function edit_dosen($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('t_dosen', $data);
	}

	public function hapus_dosen($data) {
		$this->db->delete('t_dosen', $data);
	}


}

/* End of file M_dosen.php */

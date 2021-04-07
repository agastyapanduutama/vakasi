<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonciNaApp extends CI_Model {

	public function pkNa()
		{
			$this->db->select('privateKey');
			$this->db->from('t_privatekey');
			$this->db->order_by('description', 'RANDOM');
			return $this->db->get()->row();
		}	

}

/* End of file KonciNa.php */
/* Location: ./application/models/KonciNa.php */
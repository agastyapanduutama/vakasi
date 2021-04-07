<?php

// Sumpah Sori banget ini keamanan gak bagus :( nanti dikembangin lagi kalo ada waktu
 if ($this->pk->pkNa() != '') {
		if ($konten) {
		    $this->load->view($konten);
		}
	}else{
		redirect('admin/kontak','refresh');
	}


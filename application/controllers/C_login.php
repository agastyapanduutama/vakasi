<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
       
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('admin'));
        }
        $data = array(
            'script' => 'login',
        );
        $this->load->view('login', $data);
    }

    function aksi()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $where = array(
            'username' => $user,
            'password' => SHA1($pass),
        );
        if ($this->M_login->cek($where) == true) {
            $userData = $this->M_login->getData();
            $session = array(
                'id_user' => $userData->id,
                'username' => $userData->username,
                'nama' => $userData->nama_user,
                'level' => $userData->level,
            );
            $this->session->set_userdata($session);

            redirect(base_url('admin/home'), 'refresh');
        } else {

            $this->session->set_flashdata('warning', 'Email atau Password Salah');
            redirect(base_url(), 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}

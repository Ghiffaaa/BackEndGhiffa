<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
        $this->load->model('Users_model');
    }
	public function index()
	{
		$this->load->view('index');
	}
	public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
			$user = $this->Users_model->get_user($username);
            if ($username === 'admin' && $password === 'admin') {
                $this->session->set_userdata('is_logged_in', true);
                redirect('admin');
			} elseif ($username === 'dosen' && $password === 'dosen') {
                $this->session->set_userdata('is_logged_in', true);
                redirect('dosen');
			} elseif ($user && ($user->password === $password || password_verify($password, $user->password))) {
                $this->session->set_userdata('is_logged_in', true);
				$this->session->set_userdata('nim', $user->username);
                redirect('mahasiswa');
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Data tidak ditemukan!');
                $this->load->view('index');
            }
        }
    }
	public function keluar() {
        // Hapus sesi saat keluar
        $this->session->sess_destroy();
        redirect('welcome');
    }
}

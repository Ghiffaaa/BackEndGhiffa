<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('welcome');
        }
        $this->load->model('Admin_model');
    }
	public function index()
	{
		$this->load->view('admin/home');
	}
    public function page_tambah_data()
    {
        $data['mahasiswa'] = $this->Admin_model->get_all_mahasiswa();

		$this->load->view('admin/tambah_data', $data);
    }

	public function tambah_mahasiswa() {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan form tambah dosen
            $this->session->set_flashdata('error', 'Data harus beda');
            redirect('admin/page_tambah_data');
        } else {
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nim = $this->input->post('nim');
            $kelas = $this->input->post('kelas');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
            $this->Admin_model->insert_mahasiswa($nama, $jenis_kelamin, $nim, $kelas, $password);
            
            redirect('admin/page_tambah_data');
        }
    }

	public function edit_mahasiswa($user_id) {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        
        // Jika password diisi, validasi
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required');
        }
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Harap lengkapi semua field!');
            redirect('admin/page_tambah_data');
        } else {
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nim = $this->input->post('nim');
            $kelas = $this->input->post('kelas');
            
            // Cek apakah password diubah
            if ($this->input->post('password')) {
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            } else {
                $password = NULL; 
            }
            
            $this->Admin_model->edit_mahasiswa($user_id, $jenis_kelamin, $nama, $nim, $kelas, $password);
            
            // Set flash message dan redirect
            $this->session->set_flashdata('success', 'Data dosen berhasil diperbarui!');
            redirect('admin/page_tambah_data');
        }
    }
	public function delete_mahasiswa($user_id) {
        $this->Admin_model->delete_mahasiswa($user_id);
        redirect('admin/page_tambah_data');
    }
}

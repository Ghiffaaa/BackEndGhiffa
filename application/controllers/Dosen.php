<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek apakah user sudah login
        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('welcome'); // Jika belum login, redirect ke halaman login
        }

        $this->load->model('Dosen_model');
    }
    
    public function index() {
        $this->load->view('dosen/home');
    }

    public function page_nilai_mahasiswa() {
        $data['mahasiswa'] = $this->Dosen_model->get_rekap_nilai();
    
        $this->load->view('dosen/nilai_mahasiswa', $data);
    }

    public function edit_nilai() {
        $mahasiswa_id = $this->input->post('mahasiswa_id');
        $nilai = $this->input->post('nilai');
    
        $this->Dosen_model->edit_nilai($mahasiswa_id, $nilai);
        redirect('dosen/page_nilai_mahasiswa');
    }
}

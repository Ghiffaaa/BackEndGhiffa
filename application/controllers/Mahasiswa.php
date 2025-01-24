<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek apakah user sudah login
        if ($this->session->userdata('is_logged_in') !== true) {
            redirect('welcome'); // Jika belum login, redirect ke halaman login
        }

        $this->load->model('Mahasiswa_model');
    }
    
    public function index() {
        $this->load->view('mahasiswa/home');
    }

    public function page_nilai() {
        $nim = $this->session->userdata('nim'); // Ambil NIM mahasiswa dari session

        // Ambil data mahasiswa berdasarkan NIM
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_nim($nim);

        // Ambil rekap nilai mahasiswa berdasarkan ID mahasiswa
        $data['rekap_nilai'] = $this->Mahasiswa_model->get_rekap_nilai_mahasiswa($nim);

        $this->load->view('mahasiswa/nilai', $data);
    }
}

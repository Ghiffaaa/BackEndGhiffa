<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Mengambil data mahasiswa berdasarkan NIM
    public function get_mahasiswa_by_nim($nim) {
        $this->db->where('nim', $nim);
        $result = $this->db->get('mahasiswa')->row();
        return $result ?: null;
    }

    // Mengambil nilai mahasiswa berdasarkan NIM
    public function get_rekap_nilai_mahasiswa($nim) {
        $this->db->select(
            'mhs.nama AS mahasiswa_nama, 
            mhs.nim, 
            mhs.kelas, 
            n.nilai'
        );
        $this->db->from('mahasiswa mhs');
        $this->db->join('nilai n', 'mhs.id = n.mahasiswa_id', 'left');
        $this->db->where('mhs.nim', $nim);
        return $this->db->get()->result_array();
    }
}

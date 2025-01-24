<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function get_rekap_nilai() {
        $this->db->select(
            'mhs.id as mahasiswa_id, 
            mhs.nama as mahasiswa_nama, 
            mhs.nim, 
            mhs.kelas, 
            n.nilai'
        );
        $this->db->from('mahasiswa mhs');
        $this->db->join('nilai n', 'mhs.id = n.mahasiswa_id', 'left'); // Ubah jadi LEFT JOIN
        return $this->db->get()->result();
    }

    public function edit_nilai($mahasiswa_id, $nilai) {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $query = $this->db->get('nilai');
        if ($query->num_rows() > 0) {
            // Update nilai jika sudah ada
            $this->db->where('mahasiswa_id', $mahasiswa_id);
            $this->db->update('nilai', ['nilai' => $nilai]);
        } else {
            // Insert nilai jika belum ada
            $this->db->insert('nilai', [
                'mahasiswa_id' => $mahasiswa_id,
                'nilai' => $nilai
            ]);
        }
    }
}

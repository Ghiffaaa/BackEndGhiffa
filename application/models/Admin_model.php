<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_mahasiswa() {
        $this->db->select('id, user_id, nama, jenis_kelamin, nim, kelas');
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }

    public function insert_mahasiswa($nama, $jenis_kelamin, $nim, $kelas, $password) {
        // Memulai proses
        $this->db->trans_start();

        // Menambahkan data ke tabel users
        $user = array(
            'username' => $nim,
            'password' => $password
        );
        $this->db->insert('users', $user);

        // Menambahkan data ke tabel mahasiswa
        $user_id = $this->db->insert_id(); // Mengambil user_id terakhir

        $mahasiswa = array(
            'user_id' => $user_id,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nim' => $nim,
            'kelas' => $kelas
        );
        $this->db->insert('mahasiswa', $mahasiswa);

        // Selesai proses
        $this->db->trans_complete();

        // Mengecek status proses
        if ($this->db->trans_status() === FALSE) {
            // Jika transaksi gagal, rollback
            $this->db->trans_rollback();
        } else {
            // Jika sukses, commit
            $this->db->trans_commit();
        }
    }
    public function edit_mahasiswa($user_id, $jenis_kelamin, $nama, $nim, $kelas, $password = NULL) {
        // Memulai proses
        $this->db->trans_start();
    
        // Mengupdate data ke tabel users
        $this->db->where('id', $user_id);
        $user = array(
            'username' => $nim
        );
    
        if ($password) {
            $user['password'] = $password;
        }
    
        $this->db->update('users', $user);
    
        // Mengupdate data di tabel mahasiswa
        $this->db->where('user_id', $user_id);
        $mahasiswa = array(
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nim' => $nim,
            'kelas' => $kelas
        );
        $this->db->update('mahasiswa', $mahasiswa);
    
        // Selesai proses
        $this->db->trans_complete();
    
        // Mengecek status proses
        if ($this->db->trans_status() === FALSE) {
            // Jika transaksi gagal, rollback
            $this->db->trans_rollback();
        } else {
            // Jika sukses, commit
            $this->db->trans_commit();
        }
    }

    public function delete_mahasiswa($user_id) {
        $this->db->delete('users', ['id' => $user_id]);
    }
}
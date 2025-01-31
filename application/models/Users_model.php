<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_user($username) {
        $this->db->where('username', $username);  // Menggunakan kolom username untuk mencari berdasarkan nidn
        return $this->db->get('users')->row(); // Mengembalikan satu baris data user
    }
}
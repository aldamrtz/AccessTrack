<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateUser extends CI_Controller {

    public function index() {
        // Data pengguna yang ingin ditambahkan
        $user_username = 'admin';
        $user_password = password_hash('adminpassword', PASSWORD_BCRYPT); // Hash password

        // Load database
        $this->load->database();

        // SQL untuk menambahkan pengguna baru
        $data = array(
            'username' => $user_username,
            'password' => $user_password
        );

        if ($this->db->insert('users', $data)) {
            echo "Akun berhasil dibuat";
        } else {
            echo "Error: Tidak dapat membuat akun";
        }
    }
}

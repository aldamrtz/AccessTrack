<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate_email($email) {
        return strpos($email, '@if.unjani.ac.id') !== false;
    }

    public function check_user($email, $password) {
        // Hash password dengan MD5 untuk pengecekan
        $hashed_password = md5($password);
        
        $this->db->where('email', $email);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('login');
        return $query->row_array(); // Mengembalikan data user jika ditemukan
    }
}
?>

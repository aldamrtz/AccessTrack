<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if (empty($email) || empty($password)) {
                $data['error'] = 'Harap isi semua kolom.';
            } else {
                if ($this->LoginModel->validate_email($email)) {
                    $user = $this->LoginModel->check_user($email, $password);
                    
                    // Debugging: lihat hasil query
                    if ($user) {
                        // Pengguna ditemukan, redirect ke dashboard
                        redirect('sbadmin2/index'); // Ubah sesuai dengan route ke dashboard
                    } else {
                        $data['error'] = 'Email atau password salah.';
                    }
                } else {
                    $data['error'] = 'Email tidak valid. Harus menggunakan domain @if.unjani.ac.id';
                }
            }
        }

        $this->load->view('login', $data);
    }
}
?>

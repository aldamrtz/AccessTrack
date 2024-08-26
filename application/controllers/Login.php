<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('auth/login');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Logika autentikasi
        if ($username == 'admin' && $password == 'password') {
            // Redirect ke halaman dashboard jika berhasil
            redirect('welcome');
        } else {
            // Tampilkan pesan error jika gagal
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');
        }
    }

    public function logout() {
        // Logika untuk logout
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('success', 'Anda berhasil logout');
        redirect('login');
    }
}

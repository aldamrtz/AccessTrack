<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     // // Load model
    //     // $this->load->model('Dashboard_modelCSIRT');

    //     // Load the cookie helper to use delete_cookie function
    //     // $this->load->helper('cookie');

    //     // Cek apakah pengguna sudah login menggunakan username atau email
    //     // if (!$this->session->userdata('username') && !$this->session->userdata('email')) {
    //     //     // Jika belum login, hapus cookie dan redirect ke halaman login
    //     //     delete_cookie('user_session'); // Hapus cookie
    //     //     $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
    //     //     redirect('login');
    //     // }
    // }

    public function index()
    {
        // // Mengambil data dari model
        // $data['laporan_csirt'] = $this->Dashboard_modelCSIRT->get_laporan_csirt();
        // // Ambil username atau email dari session
        // $data['username'] = $this->session->userdata('username') ? $this->session->userdata('username') : $this->session->userdata('email');

        // Mengirim data ke view
        $this->load->view('Dashboard_admin');
    }

    // public function logout()
    // {
    //     // Load the cookie helper before calling delete_cookie
    //     $this->load->helper('cookie');

    //     // Hapus session dan cookie saat logout
    //     $this->session->unset_userdata('email'); // Hapus session email
    //     delete_cookie('user_session'); // Hapus cookie

    //     // Redirect ke halaman login
    //     $this->session->set_flashdata('success', 'Anda berhasil logout.');
    //     redirect('login');
    // }
}

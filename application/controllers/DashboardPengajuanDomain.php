<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPengajuanEmail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('');

        // Load the cookie helper to use delete_cookie function
        $this->load->helper('cookie');

        // Cek apakah pengguna sudah login atau belum menggunakan email
        if (!$this->session->userdata('email')) {
            // Jika belum login, hapus cookie dan redirect ke halaman login
            delete_cookie('user_session'); // Hapus cookie
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('login');
        }
    }

    public function index()
    {
        // Mengambil data dari model
        $data['dashboard_data'] = $this->Dashboard_model->get_dashboard_data();
        $data['email'] = $this->session->userdata('email'); // Ambil email dari session

        // Mengirim data ke view
        $this->load->view('dashboard_pengajuan_domain', $data);
    }

    public function logout()
    {
        // Load the cookie helper before calling delete_cookie
        $this->load->helper('cookie');

        // Hapus session dan cookie saat logout
        $this->session->unset_userdata('email'); // Hapus session email
        delete_cookie('user_session'); // Hapus cookie

        // Redirect ke halaman login
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        redirect('login');
    }
}

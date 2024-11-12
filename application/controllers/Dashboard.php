<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_role([1]);
        // Load model
        $this->load->model('Dashboard_model');

        // Load the cookie helper to use delete_cookie function
        $this->load->helper('cookie');

        // Cek apakah pengguna sudah login menggunakan username atau email
        if (!$this->session->userdata('id_user')) {
            // Jika belum login, hapus cookie dan redirect ke halaman login
            delete_cookie('user_session'); // Hapus cookie
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('id_role') !== '1' && $this->session->userdata('id_role') !== '2' && $this->session->userdata('id_role') !== '3' && $this->session->userdata('id_role') !== '4' && $this->session->userdata('id_role') !== '5') {
            redirect('login');
          }
        // Mengirim data ke view
        $data['id_user'] = $this->session->userdata('id_user');
        $data['dashboard_data'] = $this->Dashboard_model->get_dashboard_data();
        $this->load->view('dashboard_view', $data);
    }

    public function logout()
    {
        // Load the cookie helper before calling delete_cookie
        $this->load->helper('cookie');

        // Hapus session dan cookie saat logout
        $this->session->unset_userdata('id_user'); // Hapus session username
        delete_cookie('user_session'); // Hapus cookie

        // Redirect ke halaman login
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        redirect('login');
    }
}

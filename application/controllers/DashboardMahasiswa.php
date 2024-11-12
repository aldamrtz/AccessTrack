<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardMahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Dashboard_ModelAktor');

        // Load the cookie helper to use delete_cookie function
        $this->load->helper('cookie');

        // Check if the user is logged in
        if (!$this->session->userdata('id_user')) {
            // If not logged in, delete cookie and redirect to login
            delete_cookie('user_session');
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('login');
        }
    }

    public function index()
    {
        // Validate user role
        if (!in_array($this->session->userdata('id_role'), ['1', '2', '3', '4', '5'])) {
            redirect('login');
        }

        // Get user data
        $id_user = $this->session->userdata('id_user');
        $user_data = $this->Dashboard_ModelAktor->get_user_data($id_user);

        // Send data to view
        $data['id_user'] = $user_data->id_user;
        $data['nama_lengkap'] = $user_data->nama_lengkap;
        $this->load->view('Dashboard_Mahasiswa', $data);
    }

    public function logout()
    {
        // Load the cookie helper before calling delete_cookie
        $this->load->helper('cookie');

        // Clear session and cookie on logout
        $this->session->unset_userdata('id_user');
        delete_cookie('user_session');

        // Redirect to login
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        redirect('login');
    }
}
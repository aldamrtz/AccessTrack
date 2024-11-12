<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller
{
 public function __construct()
 {
     parent::__construct();
      check_role([3]);
     // Load model
      $this->load->model('Dashboard_ModelAktor');

     // Load the cookie helper to use delete_cookie function
      $this->load->helper('cookie');

     // Cek apakah pengguna sudah login menggunakan username atau email
      if (!$this->session->userdata('id_user')) {
      //Jika belum login, hapus cookie dan redirect ke halaman login
         delete_cookie('user_session'); // Hapus cookie
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
        $this->load->view('Dashboard_admin', $data);
    }

     public function logout()
    {
     //Load the cookie helper before calling delete_cookie
         $this->load->helper('cookie');

     //Hapus session dan cookie saat logout
         $this->session->unset_userdata('id_user'); // Hapus session email
            delete_cookie('user_session'); // Hapus cookie

     //Redirect ke halaman login
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
         redirect('login');
     }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        // Mengambil data dari model
        $data = $this->Dashboard_model->get_dashboard_data();

        // Mengirim data ke view
        $this->load->view('dashboard_view', $data);
    }
}

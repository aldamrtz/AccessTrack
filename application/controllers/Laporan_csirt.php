<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_csirt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Csirt_model'); // Pastikan model sudah ada dan benar
    }

    public function index() {
        $data['reports'] = $this->Csirt_model->get_all_reports(); // Ambil semua data laporan
        $this->load->view('laporan_csirt_view', $data); // Muat view dengan data
    }
}
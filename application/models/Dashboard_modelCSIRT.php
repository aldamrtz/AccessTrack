<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_modelCSIRT extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Load database library if needed
        $this->load->database();
    }

    // Contoh method untuk mengambil data dari database
    public function get_dashboard_data()
    {
        // Data dummy untuk contoh
        return array(
            'kartu_akses' => 120,
            'laporan_keluhan' => 10,
            'pengajuan_email' => 50,
            'pengajuan_domain' => 15
        );
    }
}

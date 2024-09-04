<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_modelCSIRT extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    // Method untuk mengambil data dari tabel CSIRT
    public function get_laporan_csirt()
    {
        // Mengambil semua data dari tabel CSIRT
        $query = $this->db->get('pelaporan_csirt'); 
        return $query->result_array();
    }
}

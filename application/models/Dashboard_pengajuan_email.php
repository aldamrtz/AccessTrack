<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_pengajuan_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    // Method untuk mengambil data dari tabel kartu akses
    public function get_pengajuan_email()
    {
        // Mengambil semua data dari tabel kartu akses
        $query = $this->db->get('pengajuan_email');
        return $query->result_array();
    }
}

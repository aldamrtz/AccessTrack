<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_modelakses extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    // Method untuk mengambil data dari tabel kartu akses
    public function get_kartu_akses()
    {
        // Mengambil semua data dari tabel kartu akses
        $query = $this->db->get('pengajuan_ka'); 
        return $query->result_array();
    }
}

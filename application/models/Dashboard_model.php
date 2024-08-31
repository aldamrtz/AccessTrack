<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Load database library if needed
        $this->load->database();
    }

    // Method untuk mengambil total kartu akses dari database
    public function get_total_kartu_akses()
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $query = $this->db->get('pengajuan_ka');
        return $query->row();
    }

    // Contoh method untuk mengambil data dashboard lainnya
    public function get_dashboard_data()
    {
        // Memanggil method untuk mendapatkan total kartu akses
        $result = $this->get_total_kartu_akses();
        
        // Pastikan result tidak null sebelum mengakses propertinya
        if ($result) {
            return array(
                'kartu_akses' => $result->total_kartu_akses,
                'laporan_keluhan' => 10,  // Gantilah sesuai dengan query yang relevan
                'pengajuan_email' => 50,  // Gantilah sesuai dengan query yang relevan
                'pengajuan_domain' => 15  // Gantilah sesuai dengan query yang relevan
            );
        } else {
            return array(
                'kartu_akses' => 0,  // Default value jika tidak ada data
                'laporan_keluhan' => 0,  // Gantilah sesuai dengan query yang relevan
                'pengajuan_email' => 0,  // Gantilah sesuai dengan query yang relevan
                'pengajuan_domain' => 0  // Gantilah sesuai dengan query yang relevan
            );
        }
    }
}

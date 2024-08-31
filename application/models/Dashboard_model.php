<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Method untuk mengambil total kartu akses dari database
    public function get_total_kartu_akses()
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $query = $this->db->get('pengajuan_ka');
        return $query->row()->total_kartu_akses;
    }

    // Method untuk mengambil total laporan keluhan dari database
    public function get_total_laporan_keluhan()
    {
        $this->db->select('COUNT(id) as total_laporan_keluhan');
        $query = $this->db->get('pelaporan_csirt');
        return $query->row()->total_laporan_keluhan;
    }

    // Method untuk mengambil total pengajuan email dari database
    public function get_total_pengajuan_email()
    {
        $this->db->select('COUNT(nim) as total_pengajuan_email');
        $query = $this->db->get('pengajuan_email');
        return $query->row()->total_pengajuan_email;
    }

    // Method untuk mengambil total pengajuan domain dari database
    public function get_total_pengajuan_domain()
    {
        $this->db->select('COUNT(nomor_induk) as total_pengajuan_domain');
        $query = $this->db->get('pengajuan_domain');
        return $query->row()->total_pengajuan_domain;
    }

    // Method untuk mengambil semua data dashboard
    public function get_dashboard_data()
    {
        return array(
            'kartu_akses' => $this->get_total_kartu_akses(),
            'laporan_keluhan' => $this->get_total_laporan_keluhan(),
            'pengajuan_email' => $this->get_total_pengajuan_email(),
            'pengajuan_domain' => $this->get_total_pengajuan_domain()
        );
    }
}


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    // Konstanta untuk status CSIRT dan Pengajuan Kartu Akses
    const STATUS_REJECTED = 'rejected';
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';

    // Konstanta untuk status pengajuan email
    const STATUS_SUBMITTED_EMAIL = 'Diajukan';
    const STATUS_PENDING_EMAIL = 'Diproses';
    const STATUS_APPROVED_EMAIL = 'Selesai';
    const STATUS_SEND_EMAIL = 'Diverifikasi';

    // Konstanta Untuk Status Pengajuan Domain
    const STATUS_SUBMITTED_DOMAIN = 'Diajukan';
    const STATUS_PENDING_DOMAIN = 'Diproses';
    const STATUS_APPROVED_DOMAIN = 'Selesai';
    const STATUS_SEND_DOMAIN = 'Diverifikasi';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_dashboard_data()
    {
        $data = array(
            'kartu_akses_rejected' => $this->get_total_kartu_akses_by_status(self::STATUS_REJECTED),
            'kartu_akses_pending'  => $this->get_total_kartu_akses_by_status(self::STATUS_PENDING),
            'kartu_akses_approved' => $this->get_total_kartu_akses_by_status(self::STATUS_APPROVED),

            'laporan_keluhan_rejected' => $this->get_total_laporan_keluhan_by_status(self::STATUS_REJECTED),
            'laporan_keluhan_pending'  => $this->get_total_laporan_keluhan_by_status(self::STATUS_PENDING),
            'laporan_keluhan_approved' => $this->get_total_laporan_keluhan_by_status(self::STATUS_APPROVED),

            'pengajuan_email_diajukan' => $this->get_total_pengajuan_email_by_status(self::STATUS_SUBMITTED_EMAIL),
            'pengajuan_email_diproses'  => $this->get_total_pengajuan_email_by_status(self::STATUS_PENDING_EMAIL),
            'pengajuan_email_diverifikasi' => $this->get_total_pengajuan_email_by_status(self::STATUS_APPROVED_EMAIL),
            'pengajuan_email_dikirim' => $this->get_total_pengajuan_email_by_status(self::STATUS_SEND_EMAIL),

            'pengajuan_domain_diajukan' => $this->get_total_pengajuan_domain_by_status(self::STATUS_SUBMITTED_DOMAIN),
            'pengajuan_domain_diproses'  => $this->get_total_pengajuan_domain_by_status(self::STATUS_PENDING_DOMAIN),
            'pengajuan_domain_diverifikasi' => $this->get_total_pengajuan_domain_by_status(self::STATUS_APPROVED_DOMAIN),
            'pengajuan_domain_dikirim' => $this->get_total_pengajuan_domain_by_status(self::STATUS_SEND_DOMAIN),

            'kartu_akses' => $this->get_total_kartu_akses(),
            'laporan_keluhan' => $this->get_total_laporan_keluhan(),
            'pengajuan_email' => $this->get_total_pengajuan_email(),
            'pengajuan_domain' => $this->get_total_pengajuan_domain()
        );
        return $data;
    }

    // Method untuk mengambil semua data dari tabel
    public function get_all_data()
    {
        $query = $this->db->get('pengajuan_kartu_akses');
        if ($query === FALSE) {
            log_message('error', 'Database query failed: ' . $this->db->last_query());
            return array();
        }
        return $query->result();
    }

    //Kartu Akses
    private function get_total_kartu_akses()
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $query = $this->db->get('pengajuan_kartu_akses');
        return $query->row()->total_kartu_akses;
    }

    private function get_total_kartu_akses_by_status($status)
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $this->db->where('status', $status);
        $query = $this->db->get('pengajuan_kartu_akses');
        return $query->row()->total_kartu_akses;
    }

    //CSIRT
    private function get_total_laporan_keluhan()
    {
        $this->db->select('COUNT(id) as total_laporan_keluhan');
        $query = $this->db->get('pelaporan_csirt');
        return $query->row()->total_laporan_keluhan;
    }

    private function get_total_laporan_keluhan_by_status($status)
    {
        $this->db->select('COUNT(id) as total_laporan_keluhan');
        $this->db->where('status', $status);
        $query = $this->db->get('pelaporan_csirt');
        return $query->row()->total_laporan_keluhan;
    }

    //Email
    private function get_total_pengajuan_email()
    {
        $this->db->select('COUNT(nim) as total_pengajuan_email');
        $query = $this->db->get('pengajuan_email');
        return $query->row()->total_pengajuan_email;
    }

    private function get_total_pengajuan_email_by_status($status)
    {
        $this->db->select('COUNT(nim) as total_pengajuan_email');
        $this->db->where('status_pengajuan', $status);
        $query = $this->db->get('pengajuan_email');
        return $query->row()->total_pengajuan_email;
    }

    //Domain
    private function get_total_pengajuan_domain()
    {
        $this->db->select('COUNT(nomor_induk) as total_pengajuan_domain');
        $query = $this->db->get('pengajuan_subdomain');
        return $query->row()->total_pengajuan_domain;
    }

    private function get_total_pengajuan_domain_by_status($status)
    {
        $this->db->select('COUNT(nomor_induk) as total_pengajuan_domain');
        $this->db->where('status_pengajuan', $status);
        $query = $this->db->get('pengajuan_subdomain');
        return $query->row()->total_pengajuan_domain;
    }

}

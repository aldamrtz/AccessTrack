<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    // Konstanta untuk status CSIRT dan Pengajuan Kartu Akses
    const STATUS_REJECTED = 'rejected'; // Diajukan
    const STATUS_PENDING = 'pending';   // Diproses
    const STATUS_APPROVED = 'approved'; // Terverifikasi
    // Konstanta untuk status pengajuan email dan domain
    const STATUS_SUBMITTED_EMAIL = 'Email Diajukan';
    const STATUS_PENDING_EMAIL = 'Email Diproses';
    const STATUS_APPROVED_EMAIL = 'Email Dikirim';
    const STATUS_SEND_EMAIL = 'Email Diverifikasi';

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
        $query = $this->db->get('pengajuan_ka');
        if ($query === FALSE) {
            log_message('error', 'Database query failed: ' . $this->db->last_query());
            return array();
        }
        return $query->result();
    }

    private function get_total_kartu_akses()
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $query = $this->db->get('pengajuan_ka');
        return $query->row()->total_kartu_akses;
    }

    private function get_total_kartu_akses_by_status($status)
    {
        $this->db->select('COUNT(id_KA) as total_kartu_akses');
        $this->db->where('status', $status);
        $query = $this->db->get('pengajuan_ka');
        return $query->row()->total_kartu_akses;
    }

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

    private function get_total_pengajuan_domain()
    {
        $this->db->select('COUNT(nomor_induk) as total_pengajuan_domain');
        $query = $this->db->get('pengajuan_domain');
        return $query->row()->total_pengajuan_domain;
    }

    // Method untuk mengambil semua fakultas yang unik
    public function get_all_fakultas()
    {
        $this->db->distinct();
        $this->db->select('faculty_department');
        $query = $this->db->get('pengajuan_ka');
        if ($query === FALSE) {
            log_message('error', 'Database query failed: ' . $this->db->last_query());
            return array();
        }
        return $query->result();
    }

    // Method untuk mengambil semua jurusan yang unik berdasarkan fakultas
    public function get_jurusan_by_fakultas($fakultas)
    {
        $this->db->distinct();
        $this->db->select('program_studi');
        $this->db->where('faculty_department', $fakultas);
        $query = $this->db->get('pengajuan_ka');
        if ($query === FALSE) {
            log_message('error', 'Database query failed: ' . $this->db->last_query());
            return array();
        }
        return $query->result();
    }
}

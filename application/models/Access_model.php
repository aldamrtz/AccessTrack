<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Memuat database
    }

    // Fungsi untuk memasukkan data pengajuan
    public function insert_pengajuan($data)
    {
        // Memasukkan data pengajuan ke dalam tabel pengajuan_ka
        return $this->db->insert('pengajuan_ka', $data);
    }

    // Fungsi untuk mengambil pengajuan berdasarkan jenis pemohon
    public function get_pengajuan_by_type($type)
    {
        $this->db->where('applicant_type', $type);  // Filter berdasarkan jenis pemohon
        $query = $this->db->get('pengajuan_ka');    // Ambil data dari tabel pengajuan_ka
        return $query->result_array();              // Mengembalikan data dalam bentuk array
    }

    // Fungsi untuk mengambil pengajuan berdasarkan status
    public function get_pengajuan_by_status($status)
    {
        $this->db->where('status', $status);  // Filter berdasarkan status pengajuan
        $query = $this->db->get('pengajuan_ka');  // Ambil data dari tabel pengajuan_ka
        return $query->result_array();  // Mengembalikan data dalam bentuk array
    }

    // Fungsi untuk memperbarui status pengajuan berdasarkan ID
    public function update_status($id, $status)
    {
        $data = [
            'status' => $status,
            'payment_status' => 'Lunas'
        ];
    
        $this->db->where('id_KA', $id);
        $this->db->update('pengajuan_ka', $data);
    }

    // Fungsi untuk menghapus pengajuan berdasarkan ID
    public function delete_pengajuan($id)
    {
        $this->db->where('id_KA', $id);  // Filter berdasarkan ID
        $this->db->delete('pengajuan_ka');  // Menghapus pengajuan dari tabel pengajuan_ka

        // Mengecek apakah query berhasil dieksekusi
        return $this->db->affected_rows() > 0;  // Mengembalikan true jika berhasil dihapus
    }

    // Fungsi untuk mengambil semua pengajuan untuk laporan, diurutkan dari yang terbaru
    public function get_laporan()
    {
        $this->db->order_by('id_KA', 'DESC');  // Mengurutkan berdasarkan ID terbaru
        $query = $this->db->get('pengajuan_ka');  // Ambil semua data dari tabel pengajuan_ka
        return $query->result_array();  // Mengembalikan data dalam bentuk array
    }

    // Fungsi untuk mengambil data bukti pembayaran berdasarkan ID pengajuan
    public function get_bukti_pembayaran($id)
    {
        $this->db->select('payment_proof');  // Memilih kolom bukti pembayaran
        $this->db->where('id_KA', $id);  // Filter berdasarkan ID pengajuan
        $query = $this->db->get('pengajuan_ka');  // Ambil data dari tabel pengajuan_ka
        
        $result = $query->row_array();  // Mengembalikan hasil query berupa satu row
        return !empty($result) ? $result['payment_proof'] : null;  // Kembalikan null jika tidak ada data
    }
}

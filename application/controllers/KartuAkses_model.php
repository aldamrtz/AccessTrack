<?php
class KartuAkses_model extends CI_Model {

    public function getSubmissionCount($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('kartu_akses'); // Anggap tabelnya bernama 'kartu_akses'
    }
    public function createCard($data) {
        $this->db->insert('kartu_akses', $data); // Simpan data pengajuan ke tabel 'kartu_akses'
    }


    // Metode untuk mendapatkan pengajuan kartu akses berdasarkan ID
    public function getCardById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kartu_akses'); // Anggap tabelnya bernama 'kartu_akses'
        return $query->row(); // Mengembalikan satu baris data
    }
    // Metode untuk mengupdate status pengajuan kartu akses
    public function updateCard($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('kartu_akses', $data);
    }

    
    // Fungsi untuk menyimpan data kwitansi ke database
    public function saveReceipt($data) {
        $this->db->insert('kwitansi', $data); // Simpan data kwitansi ke tabel 'kwitansi'
    }


    // Fungsi untuk mendapatkan data pengguna berdasarkan ID
    public function getUserById($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users'); // Anggap tabelnya bernama 'users'
        return $query->row();
    }

    // Fungsi untuk menyimpan notifikasi ke dalam tabel notifikasi
    public function sendNotification($data) {
        $this->db->insert('notifications', $data); // Simpan notifikasi ke tabel 'notifications'
    }

}
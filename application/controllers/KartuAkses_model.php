<?php
class KartuAkses_model extends CI_Model {

    // Mendapatkan jumlah pengajuan berdasarkan user_id
    public function getSubmissionCount($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('kartu_akses');
    }

    // Membuat pengajuan kartu akses baru
    public function createCard($data) {
        $this->db->insert('kartu_akses', $data);
    }

    // Mendapatkan pengajuan kartu akses berdasarkan ID
    public function getPengajuanById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kartu_akses');
        return $query->row();
    }

    // Memperbarui status pengajuan kartu akses
    public function updateCard($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('kartu_akses', array('status' => $status));
    }

    // Menghapus pengajuan kartu akses berdasarkan ID
    public function deletePengajuan($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kartu_akses');
    }

    // Menyimpan data kwitansi ke database
    public function saveReceipt($data) {
        $this->db->insert('kwitansi', $data);
    }

    // Mendapatkan data pengguna berdasarkan ID
    public function getUserById($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    // Menyimpan notifikasi ke dalam tabel notifikasi
    public function sendNotification($data) {
        $this->db->insert('notifications', $data);
    }

    // Mendapatkan semua pengajuan oleh user_id
    public function getSubmissionsByUserId($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('kartu_akses');
        return $query->result();
    }
}

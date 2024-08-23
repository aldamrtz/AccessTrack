<?php
class KartuAkses_model extends CI_Model {

    // Menyimpan pengajuan kartu akses baru
    public function createCard($data) {
        return $this->db->insert('kartu_akses', $data);
    }

    // Mengambil semua laporan CSIRT
    public function getAllLaporan() {
        return $this->db->get('csirt_laporan')->result();
    }

    // Mengambil laporan CSIRT berdasarkan ID
    public function getLaporanById($id) {
        return $this->db->get_where('csirt_laporan', ['id' => $id])->row();
    }

    // Memperbarui status laporan CSIRT
    public function updateStatusLaporan($id, $status) {
        return $this->db->update('csirt_laporan', ['status' => $status], ['id' => $id]);
    }

    // Menghapus laporan CSIRT berdasarkan ID
    public function deleteLaporan($id) {
        return $this->db->delete('csirt_laporan', ['id' => $id]);
    }
}

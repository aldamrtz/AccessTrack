<?php
class Admin_model extends CI_Model {

    // Fungsi untuk mendapatkan pengajuan berdasarkan status tertentu
    public function get_pengajuan_by_status($status) {
        $this->db->where('status', $status);
        $query = $this->db->get('pengajuan_ka');
        return $query->result_array();
    }

    // Fungsi untuk memperbarui status pengajuan berdasarkan ID
    public function update_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id_KA', $id); // Menggunakan 'id_KA' sesuai dengan struktur database
        $this->db->update('pengajuan_ka');
    }
}

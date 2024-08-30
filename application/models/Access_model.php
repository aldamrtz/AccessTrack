<?php
class Access_model extends CI_Model
{
    // Fungsi untuk menyimpan pengajuan
    public function insert_pengajuan($data)
    {
        $this->db->insert('pengajuan_ka', $data);
    }

    // Fungsi untuk mengambil pengajuan berdasarkan status
    public function get_pengajuan_by_status($status)
    {
        $this->db->where('status', $status);
        $query = $this->db->get('pengajuan_ka');
        return $query->result_array();
    }

    // Fungsi untuk memperbarui status pengajuan berdasarkan ID
    public function update_status($id, $status)
    {
        $this->db->where('id_KA', $id);  // Menggunakan id_KA yang sesuai dengan nama kolom di database
        $this->db->update('pengajuan_ka', ['status' => $status]);
    }

    // Fungsi untuk mengambil semua pengajuan untuk laporan, diurutkan dari yang terbaru
    public function get_laporan()
    {
        $this->db->order_by('id_KA', 'DESC');  // Menggunakan id_KA yang sesuai dengan nama kolom di database
        $query = $this->db->get('pengajuan_ka');
        return $query->result_array();
    }
}

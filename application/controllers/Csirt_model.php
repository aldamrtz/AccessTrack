<?php
class Csirt_model extends CI_Model {

    public function getAllLaporan() {
        $query = $this->db->get('csirt_laporan');
        return $query->result();
    }

    public function getLaporanById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('csirt_laporan');
        return $query->row();
    }

    public function updateStatusLaporan($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('csirt_laporan', array('status' => $status));
    }

    public function deleteLaporan($id) {
        $this->db->where('id', $id);
        return $this->db->delete('csirt_laporan');
    }

}
<?php
class EmailModel extends CI_Model {

    public function insert_pengajuan_email($data) {
        $this->db->insert('pengajuan_email', $data);
        return $this->db->insert_id();
    }

    public function check_existing_email($email_diajukan) {
        $this->db->where('email_diajukan', $email_diajukan);
        $query = $this->db->get('pengajuan_email');
        return $query->row();
    }

    public function get_all_pengajuan_email() {
        return $this->db->get('pengajuan_email')->result_array();
    }
}
?>

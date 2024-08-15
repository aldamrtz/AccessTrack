<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_email($data) {
        return $this->db->insert('pengajuan_email', $data);
    }

    public function check_email_exists($email) {
        $this->db->where('emailDiajukan', $email);
        $query = $this->db->get('pengajuan_email');
        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}

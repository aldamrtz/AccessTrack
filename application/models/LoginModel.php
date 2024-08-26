<?php
class LoginModel extends CI_Model {
    public function validate($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Asumsikan password disimpan dengan enkripsi MD5
        $query = $this->db->get('admin'); // Asumsikan tabel admin
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}

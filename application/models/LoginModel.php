<?php
class LoginModel extends CI_Model {
    
    public function validate($email, $password) {
        // Hashing password dengan MD5
        $hashed_password = md5($password);

        // Cek di database apakah ada user dengan email dan password yang cocok
        $this->db->where('email', $email);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('login_admin'); // Asumsikan tabel login

        // Jika ada hasil yang cocok, kembalikan data user
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}

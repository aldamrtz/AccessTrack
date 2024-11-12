<?php
class LoginModel extends CI_Model {
    
    public function validate($id_user, $password) {
        // Hash the password with MD5
        $hashed_password = md5($password);

        // Query the users table with username and hashed password
        $this->db->where('id_user', $id_user);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('users'); // Assuming the table name is `users`

        // If a match is found, return the user data
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}

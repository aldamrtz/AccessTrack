<?php
class LoginModel extends CI_Model {
    
    public function validate($id_user, $password) {
        // Query the users table by username
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');

        // Check if user exists
        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verify the provided password with the hashed password in the database
            if (password_verify($password, $user->password)) {
                return $user; // Password is correct
            }
        }

        // If no match is found or password is incorrect
        return false;
    }

    public function update_password($id_user, $new_password) {
        $this->db->set('password', $new_password)
                 ->set('password_changed', 1) // Set password_changed to 1 directly
                 ->where('id_user', $id_user)
                 ->update('user');
    }
}

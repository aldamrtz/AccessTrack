<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_ModelAktor extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Load the database library
        $this->load->database();
    }

    // Method to get user data including nama_lengkap
    public function get_user_data($id_user)
    {
        $this->db->select('id_user, nama_lengkap');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user'); 
        return $query->row();
    }
}
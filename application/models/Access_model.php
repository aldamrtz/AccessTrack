<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_pengajuan($data)
    {
        $this->db->insert('pengajuan_ka', $data);
    }
}

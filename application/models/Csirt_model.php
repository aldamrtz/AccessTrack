<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csirt_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_report($data) {
        return $this->db->insert('pelaporan_csirt', $data);
    }

    public function get_pending_reports() {
        $this->db->where('status', 'pending');
        $query = $this->db->get('pelaporan_csirt');
        return $query->result_array();
    }
    
    public function update_report_status($report_id, $status) {
        $this->db->where('id', $report_id);
        return $this->db->update('pelaporan_csirt', array('status' => $status));
    }
}
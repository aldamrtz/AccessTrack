<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_csirt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Csirt_model');
        // Cek apakah user adalah admin, jika tidak, redirect ke login
        //if (!$this->session->userdata('is_admin')) {
        //    redirect('login');
       // }
    }

    public function index() {
        $data['reports'] = $this->Csirt_model->get_pending_reports();
        $this->load->view('admin_csirt_view', $data);
    }

    public function get_reports_for_approval() {
        $this->db->where('status', 'pending');
        $query = $this->db->get('pelaporan_csirt');
        return $query->result_array();
    }

    public function approve_report($report_id) {
        if ($this->Csirt_model->update_report_status($report_id, 'approved')) {
            redirect('admin_csirt');
        } else {
            echo "Gagal menyetujui laporan.";
        }
    }
    
    public function reject_report($report_id) {
        if ($this->Csirt_model->update_report_status($report_id, 'rejected')) {
            redirect('admin_csirt');
        } else {
            echo "Gagal menolak laporan.";
        }
    }
}
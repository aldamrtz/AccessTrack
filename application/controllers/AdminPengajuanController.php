<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPengajuanController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmailModel');
        $this->load->helper('url');
    }

    public function index() {
        // Ambil semua data dari tabel pengajuan_email
        $all_pengajuan_email = $this->EmailModel->getAllPengajuan();

        // Kelompokkan data berdasarkan status
        $data['email_diajukan'] = array_filter($all_pengajuan_email, function($item) {
            return $item['status_pengajuan'] == 'Email Diajukan';
        });
        $data['email_diproses'] = array_filter($all_pengajuan_email, function($item) {
            return $item['status_pengajuan'] == 'Email Diproses';
        });
        $data['email_diverifikasi'] = array_filter($all_pengajuan_email, function($item) {
            return $item['status_pengajuan'] == 'Email Diverifikasi';
        });
        $data['email_dikirim'] = array_filter($all_pengajuan_email, function($item) {
            return $item['status_pengajuan'] == 'Email Dikirim';
        });

        $this->load->view('admin_pengajuan', $data);
    }

    public function updateStatus() {
        $id = $this->input->post('id');
        $status = $this->input->post('status_pengajuan');

        // Update status di database
        $this->EmailModel->updateStatus($id, $status);

        // Redirect kembali ke halaman utama
        redirect('AdminPengajuanController');
    }
}
?>

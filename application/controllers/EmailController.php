<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function pengajuan_email() {
        $this->load->helper('url');
        $this->load->model('EmailModel');

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userCaptcha = $this->input->post('captcha');
            if ($userCaptcha === $this->session->userdata('captcha')) {
                // CAPTCHA valid, proceed with form processing
                $data = array(
                    'nim' => $this->input->post('nim'),
                    'nama' => $this->input->post('nama'),
                    'prodi' => $this->input->post('prodi'),
                    'email_diajukan' => $this->input->post('email_diajukan'),
                    'email_pengguna' => $this->input->post('email_pengguna'),
                    'ktm' => $this->input->post('ktm'),
                    'tgl_pengajuan' => date('Y-m-d'),
                    'status_pengajuan' => 'Pending'
                );

                // Save to the database
                $this->EmailModel->insert($data);
                $success = 'Pengajuan berhasil dikirim!';
                $this->load->view('pengajuan_email', ['success' => $success, 'title' => 'Form Pengajuan Email']);
            } else {
                // CAPTCHA invalid, show error message
                $error = 'CAPTCHA salah. Coba lagi.';
                $this->load->view('pengajuan_email', ['error' => $error, 'title' => 'Form Pengajuan Email']);
            }
        } else {
            // Load the form page
            $this->load->view('pengajuan_email', ['title' => 'Form Pengajuan Email']);
        }
    }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmailModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function pengajuan_email() {
        $data['title'] = "Pengajuan Email";
        $data['captcha'] = $this->generate_captcha();

        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('emailDiajukan', 'Email yang Diajukan', 'required|valid_email');
        $this->form_validation->set_rules('emailPengguna', 'Email Pengguna', 'required|valid_email');
        $this->form_validation->set_rules('ktm', 'KTM', 'required');
        $this->form_validation->set_rules('captcha', 'CAPTCHA', 'required|callback_check_captcha');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengajuan_email', $data);
        } else {
            $formData = array(
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'prodi' => $this->input->post('prodi'),
                'emailDiajukan' => $this->input->post('emailDiajukan'),
                'emailPengguna' => $this->input->post('emailPengguna'),
                'ktm' => $this->input->post('ktm'),
                'tgl_Pengajuan' => date('Y-m-d H:i:s'),
                'statusPengajuan' => 'pending'
            );
            $this->EmailModel->insert_email($formData);
            $this->session->set_flashdata('success', 'Pengajuan Email Berhasil');
            redirect('emailcontroller/pengajuan_email');
        }
    }

    public function check_captcha($input) {
        if ($input == $this->session->userdata('captcha')) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'CAPTCHA salah.');
            return false;
        }
    }

    private function generate_captcha() {
        // Generate and store captcha code in session
        $captchaText = substr(md5(rand()), 0, 5);
        $this->session->set_userdata('captcha', $captchaText);
        return $captchaText;
    }
}

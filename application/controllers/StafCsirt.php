<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StafCsirt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Csirt_model');
        $this->load->library('session');
    }

    public function formPelaporan() {
        $this->load->view('staf_csirt/form_pelaporan');
    }

    public function kirimLaporan() {
        $user_id = $this->session->userdata('user_id');
        $nama = $this->session->userdata('nama');
        $email = $this->session->userdata('email');
        $departemen = $this->session->userdata('departemen');

        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        $this->form_validation->set_rules('deskripsi_masalah', 'Deskripsi Masalah', 'required');
        $this->form_validation->set_rules('bukti', 'Bukti', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->formPelaporan();
        } else {

            $bukti =$this->uploadFile('bukti');

            if ($bukti) {
                $data = array(
                    'user_id' => $user_id,
                    'nama' => $nama,
                    'email' => $email,
                    'departemen' => $departemen,
                    'nama_website' => $this->input->post('nama_website'),
                    'deskripsi_masalah' => $this->input->post('deskripsi_masalah'),
                    'bukti' => $bukti,
                    'tanggal_pelaporan' => date('Y-m-d H:i:s'),
                    'status' => 'Belum Diproses'
                );
                $this->Csirt_model->createLaporan($data);
                $this->sendEmailNotification($email, 'Laporan CSIRT Diterima', 'Laporan Anda telah diterima dan akan segera diproses oleh tim Sistem Informasi UNJANI.');
                $this->session->set_flashdata('success', 'Laporan SIRT berhasil dikirim. Silakan cek email untuk notifikasi.');
                redirect('stafcsirt/successPage');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah bukti. Silakan coba lagi.');
                redirect('stafcsirt/formPelaporan');
            }
        }
    }

    private function uploadFile($field_name) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '.pdf|jpg|png';
        $config['max_size'] = 5048;

        $this->load->library('upload', $config);

        if ($this-upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }

    private function sendEmailNotification($to_email, $subject, $message) {
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem CSIRT UNJANI');
        $this->email->to($to_email);

        $this->email->subject($subject);
        $this_>email->message($message);

        $this->email->send();
    }
}
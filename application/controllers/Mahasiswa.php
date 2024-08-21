<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        $this->load->model('KartuAkses_model');
        $this->load->library('session');
    }

    public function ajukanKartuAkses() {
        $user_id = $this->session->userdata('user_id');
        $nim = $this->session->userdata('nim');
        $nama = $this->session->userdata('nama');
        $prodi = $this->session->userdata('prodi');
        $fakultas = $this->session->userdata('fakultas');
        $email = $this->session->userdata('email');

        $this->form_validation->set_rules('ktm', 'KTM', 'required');
        $this->form_validation->set_rules('bukti_bayar', 'Bukti Bayar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('mahasiswa/form_pengajuan'); // load form pengajuan if validate gagal
        } else {
            $ktm = $this->uploadFile('ktm');
            $bukti_bayar = $this->uploadFile('bukti_bayar');

            if ($ktm && $bukti_bayar) {
                $data = array (
                    'user_id' => $user_id,
                    'nim' => $nim,
                    'nama' => $nama,
                    'prodi' => $prodi,
                    'fakultas' => $fakultas,
                    'email' => $email,
                    'ktm' => $ktm,
                    'bukti_bayar' => $bukti_bayar,
                    'tanggal_pengajuan' => date('Y-m-d H:i:s'),
                    'status' => 'Belum Diproses',
                );

                $this->KartuAkses_model->createCard($data);
                $kwitansi_path = $this->generateReceipt($data);
                $this->sendEmailWithAttachment()($email, 'Pengajuan Kartu Akses', 'Pengajuan kartu akses Anda telah diterima dan sedang diproses.');
                $this->session->set_flashdata('success', 'Pengajuan kartu akses berhasil. Silakan cek email untuk notifikasi.');
                redirect('mahasiswa/successPage');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah file.');
                redirect('mahasiswa/form_pengajuan');
            }
        }
    }
     private funtion uploadFile($field_name) {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['max_size'] = 5048; // 5mb

        $this->load->library('upload', $config);

        if($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
     }

     private function sendEmailWithAttachment($to_email, $subject, $message, $attachment_path) {
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem Kartu Akses UNJANI');
        $this->email->to($to_email);

        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->message($attachment_path); //melampirkan kwitansi

        $this->email->send();
     }

     private function generateReceipt($data) {
        // dalam bentuk PDF
        $this->load->library('pdf');

        $pdf_content = 'Kwitansi Pembayaran Kartu Akses' . "\n" .
                       'Nama: ' . $data['nama'] . "\n" . 
                       'NIM: ' . $data['nim'] . "\n" . 
                       'Tanggal: ' . $data['tanggal_pengajuan'] . "\n" . 
                       'Jumlah: Rp 40.000 ';
        
        $pdf_file_path = './receipts/kwitansi_' / $data['nim'] . '.pdf';
        $this->pdf->loadHtml($pdf_content);
        $this->pdf->render();
        file_put_contents($pdf_file_path, $this->pdf->output());

        return $pdf_file_path
     }

     public function notifyCompletion($id) {
        $submission = $this->KartuAkses_model->getCardByID($id);

        if ($submission && $submission->status == 'Selesai dan Belum Diambil') {
            $message = 'Kartu Akses Anda telah selesai diproses dan siap diambil. Harap perlihatkan kwitansi pembayaran Anda saat pengambilan kartu akses.';
            $this->sendEmailWithAttachment($submission->email, 'Kartu Akses Siap Diambil', $message, './receipts/kwitansi_' . $submission->nim . '.pdf');
        }
     }
}
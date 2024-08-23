<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KartuAkses_model');
        $this->load->library('session');
    }

    public function handleKartuAksesSubmission() {
        $role = $this->getUserRole();
        $this->setValidationRules($role);

        if ($this->form_validation->run() == FALSE) {
            $this->loadSubmissionForm();
        } else {
            $this->processSubmission($role);
        }
    }

    private function getUserRole() {
        return $this->session->userdata('role');
    }

    private function loadSubmissionForm() {
        $role = $this->getUserRole();
        $data = $this->prepareFormData($role);
        $this->load->view('user/form_pengajuan', $data);
    }

    private function setValidationRules($role) {
        if ($role == 'mahasiswa') {
            $this->form_validation->set_rules('ktm', 'KTM', 'required');
            $this->form_validation->set_rules('bukti_bayar', 'Bukti Bayar', 'required');
        } else {
            $this->form_validation->set_rules('id_card', 'ID Card', 'required');
        }
    }

    private function prepareFormData($role) {
        $data = array (
            'nama' => $this->session->userdata('nama'),
            'email' => $this->session->userdata('email')
        );

        if ($role == 'mahasiswa') {
            $data['nim'] = $this->session->userdata('nim');
            $data['prodi'] = $this->session->userdata('prodi');
            $data['fakultas'] = $this->session->userdata('fakultas');
        } elseif ($role == 'dosen') {
            $data['nid'] = $this->session->userdata('nid');
            $data['prodi'] = $this->session->userdata('prodi');
            $data['fakultas'] = $this->session->userdata('fakultas');
        } elseif ($role == 'staf') {
            $data['nip'] = $this->session->userdata('nip');
            $data['departemen'] = $this->session->userdata('departemen');
        }
        return $data;
    }

    private function processSubmission($role) {
        $document = $this->uploadDocument($role);

        if ($document) {
            $data = $this->prepareSubmissionData($role, $document);
            $this->KartuAkses_model->createCard($data);
            $this->sendNotificationBasedOnRole($role, $data);
            $this->redirectToSuccessPage();
        } else {
            $this->redirectToFormWithError();
        }
    }

    private function uploadDocument($role) {
        if ($role == 'mahasiswa') {
            $ktm = $this->uploadFile('ktm');
            $bukti_bayar = $this->uploadFile('bukti_bayar');
            return $ktm && $bukti_bayar ? array('ktm' => $ktm, 'bukti_bayar' => $bukti_bayar) : false;
        } else {
            return $this->uploadFile('id_card');
        }
    }

    private function prepareSubmissionData($role, $document) {
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'nama' => $this->session->userdata('nama'),
            'email' => $this->session->userdata('email'),
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'status' => 'Belum Diproses'
        );

        if ($role == 'mahasiswa') {
            $data['nim'] = $this->session->userdata('nim');
            $data['ktm'] = $document['ktm'];
            $data['bukti_bayar'] = $document['bukti_bayar'];
        } elseif ($role == 'dosen') {
            $data['nid'] = $this->session->userdata('nid');
            $data['prodi'] = $this->session->userdata('prodi');
            $data['fakultas'] = $this->session->userdata('fakultas');
            $data['id_card'] = $document;
        } elseif ($role == 'staf') {
            $data['nip'] = $this->session->userdata('nip');
            $data['departemen'] = $this->session->userdata('departemen');
            $data['id_card'] = $document;
        }
        return $data;
    }

    // Mengunggah file ke server
    private function uploadFile($field_name) {
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'pdf|jpg|png',
            'max_size' => 2048
        );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }

    private function sendNotificationBasedOnRole($role, $data) {
        if($role == 'mahasiswa') {
            $kwitansi_path = $this->generateReceipt($data);
            $this->sendEmailWithAttachment($data['email'], 'Pengajuan Kartu Akses', 'Pengajuan kartu akses Anda telah diterima dan sedang diproses.', $kwitansi_path);
        } else {
            $this->sendEmailNotification($data['email'], 'Pengajuan Kartu Akses', 'Pengajuan kartu akses Anda telah diterima dan sedang diproses.');
        }
    }

    // Mengirimkan email dengan lampiran
    private function sendEmailWithAttachment($to_email, $subject, $message, $attachment_path) {
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem Kartu Akses UNJANI');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->attach($attachment_path);

        $this->email->send();
    }

    // Mengirimkan email tanpa lampiran
    private function sendEmailNotification($to_email, $subject, $message) {
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem Kartu Akses UNJANI');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }

    // Menghasilkan kwitansi pembayaran untuk mahasiswa
    private function generateReceipt($data) {
        $this->load->library('pdf');

        $pdf_content = 'Kwitansi Pembayaran Kartu Akses' . "\n" .
                       'Nama: ' . $data['nama'] . "\n" .
                       'NIM: ' . $data['nim'] . "\n" .
                       'Tanggal: ' . $data['tanggal_pengajuan'] . "\n" .
                       'Jumlah: Rp40.000';

        $pdf_file_path = './receipts/kwitansi_' . $data['nim'] . '.pdf';
        $this->pdf->loadHtml($pdf_content);
        $this->pdf->render();
        file_put_contents($pdf_file_path, $this->pdf->output());

        return $pdf_file_path;
    }

    // Redirect ke halaman sukses
    private function redirectToSuccessPage() {
        $this->session->set_flashdata('success', 'Pengajuan kartu akses berhasil. Silakan cek email untuk notifikasi.');
        redirect('user/successPage');
    }

    // Redirect ke form pengajuan dengan pesan error
    private function redirectToFormWithError() {
        $this->session->set_flashdata('error', 'Gagal mengunggah file. Silakan coba lagi.');
        redirect('user/form_pengajuan');
    }

}

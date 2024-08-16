<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kakses extends CI_Controller {

    public function createCard() {
        // ambil data pengguna dari session atau parameter
        $user_id = $this->session->userdata('user_id'); 

        // Cek berapa kali pengguna telah mengajukan kartu akses
        $this->load->model('KartuAkses_model'); //terhubung ke model KartuAkses_model
        $submission_count = $this->KartuAkses_model->getSubmissionCount($user_id);

        if ($submission_count >= 7) {
            // if pengajuan sudah mencapai batas max, beri pemberitahuan
            $this->session->set_flashdata('error', 'Sudah melebihi batas pengajuan!');
            redirect('kakses/errorPage'); 
        } else {
            // logic u/membuat pengajuan kartu akses baru
            $data = array(
                'user_id' => $user_id,
                'tanggal_pengajuan' => date('Y-m-d H:i:s'), // Perbaikan format tanggal
                'status' => 'Belum Diproses',
            );
            $this->KartuAkses_model->createCard($data); //menyimpan pengajuan ke database
            $this->session->set_flashdata('success', 'Pengajuan Kartu Akses Berhasil!'); //pemberitahuan pengajuan berhasil
            redirect('kakses/successPage'); // redirect ke halaman sukses atau berikan pesan sukses
        }
    }


    public function updateCardStatus($id, $status) {
        $allowed_statuses = ['Belum Diproses', 'Sedang Diproses', 'Selesai', 'Belum Diambil', 'Sudah Diambil'];

        if (in_array($status, $allowed_statuses)) {
            $this->load->model('KartuAkses_model'); // u/melakukan update
            $submission = $this->KartuAkses_model->getCardById($id); // mengecek pengajuan dgn ID tersebut ada di database

            if ($submission) {
                // ditemukan, update statusnya
                $data = array('status' => $status);
                $this->KartuAkses_model->updateCard($id, $data); 

                // notif update berhasil
                $this->session->set_flashdata('success', 'Status Pengajuan berhasil diupdate');
            } else {
                // tidak ditemukan datanya, notif error
                $this->session->set_flashdata('error', 'Pengajuan Tidak Ditemukan');
            } 
        } else {
            $this->session->set_flashdata('error', 'Status Tidak Valid'); 
        }
        $this->sendNotification($id, 'Status pengajuan kartu akses Anda telah diperbarui menjadi: ' . $status);
        redirect('kakses/adminPage');
    }


    /*
    public function deleteCard($id) {
        // Logika untuk menghapus pengajuan kartu akses
    }

    */


    public function validatePayment($id) {
        $this->load->model('KartuAkses_model');
        $submission = $this->KartuAkses_model->getCardByID($id);

        // mengecek tipe pengguna
        if ($submission) { 
            if ($submission->user_type == 'mahasiswa') {
                // mengecek apakah pembayaran sudah dilakukan (melalui kolom payment_status)
                if ($submission->payment_status == 'paid') {
                    $this->KartuAkses_model->updateCard($id, array('status' => 'Sedang Diproses')); 
                    $this->session->set_flashdata('success', 'Pembayaran telah divalidasi. Pengajuan sedang diproses.'); //notifikasi bahwa pembayaran valid dan pengajuan diteruskan
                } else {
                    $this->session->set_flashdata('error', 'Pembayaran belum dilakukan atau tidak valid'); // pembayaran belum dilakukan atau tidak valid, tolak pengajuan
                    redirect('kakses/paymentPage'); 
                }
            } else {
                // jika pengguna dosen dan staf, tidak perlu verifikasi pembayaran
                $this->KartuAkses_model->updateCard($id, array('status' => 'Sedang Diproses'));
                $this->session->set_flashdata('success', 'Pengajuan sedang diproses.');
            }
        } else {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan.');
        }
        $this->sendNotification($id, 'Pembayaran Anda telah divalidasi. Pengajuan kartu akses Anda sedang diproses.');
        redirect('kakses/adminPage'); 
    }


    public function generateReceipt($id) {
        $this->load->model('KartuAkses_model'); 

        // ambil data pengajuan berdasarkan ID
        $submission = $this->KartuAkses_model->getCardById($id);
        if ($submission) {
            if ($submission->user_type == 'mahasiswa') {
                $receipt_data = array(
                    'user_name' => $submission->user_name,
                    'tanggal_kwitansi' => date('Y-m-d H:i:s'), 
                    'jumlah_pembayaran' => 'Rp 40.000',
                    'keterangan' => 'Pembayaran Kartu Akses',
                    'no_kwitansi' => 'KW-' . strtoupper(uniqid()) // example format no kwitansi
                );
                $this->KartuAkses_model->saveReceipt($receipt_data);
                $this->load->view('receipt_view', $receipt_data); // view yg menampilkan kwitansi
            } else {
                $this->session->set_flashdata('error', 'Pembayaran belum dilakukan atau tidak valid.');
                redirect('kakses/adminPage');
            }
        } else {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan.');
            redirect('kakses/adminPage');
        }
    }


    public function sendNotification($user_id, $message) {
        $this->load->model('User_model');
        $submission = $this->KartuAkses_model->getCardById($user_id); 

        if ($submission) {
            // Ambil data pengguna berdasarkan ID pengajuan
            $user = $this->User_model->getUserById($submission->user_id);
            if ($user) {
                $notification_data = array(
                    'user_id' => $user->id,
                    'message' => $message,
                    'date_sent' => date('Y-m-d H:i:s'),
                    'status' => 'unread' // Default status notifikasi adalah 'belum dibaca'
                );
                $this->User_model->sendNotification($notification_data); // Simpan notifikasi ke dalam tabel notifikasi

                //  mengirimkan email 
                // $this->sendEmailNotification($user->email, $message);
            }
        }
    }
    /*
    // Fungsi opsional untuk mengirimkan notifikasi melalui email (jika diperlukan)
    private function sendEmailNotification($email, $message) {
        // Implementasi pengiriman email
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem Kartu Akses');
        $this->email->to($email);

        $this->email->subject('Notifikasi Pengajuan Kartu Akses');
        $this->email->message($message);

        $this->email->send();
    }
     */

    public function logActivity($action, $id) {
        // Logika untuk mencatat aktivitas admin
    }
}

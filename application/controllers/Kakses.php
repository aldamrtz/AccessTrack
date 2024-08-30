<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kakses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KartuAkses_model');
        $this->load->library('session');
    }

    // Menampilkan daftar semua pengajuan kartu akses
    public function daftarPengajuan() {
        $data['pengajuan'] = $this->KartuAkses_model->getAllPengajuan();
        $this->load->view('admin/daftar_pengajuan', $data);
    }

    // Menampilkan detail pengajuan berdasarkan ID
    public function detailPengajuan($id) {
        $data['pengajuan'] = $this->KartuAkses_model->getPengajuanById($id);
        if ($data['pengajuan']) {
            $this->load->view('admin/detail_pengajuan', $data);
        } else {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan');
            redirect('kakses/daftarPengajuan');
        }
    }

    // Memperbarui status pengajuan
    public function updateStatusPengajuan($id, $status) {
        $allowed_statuses = ['Belum Diproses', 'Sedang Diproses', 'Selesai'];

        if (in_array($status, $allowed_statuses)) {
            $this->KartuAkses_model->updateCard($id, $status);
            $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Status tidak valid');
        }
        redirect('kakses/detailPengajuan/' . $id);
    }

    // Menghapus pengajuan berdasarkan ID
    public function hapusPengajuan($id) {
        if ($this->KartuAkses_model->deletePengajuan($id)) {
            $this->session->set_flashdata('success', 'Pengajuan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengajuan');
        }
        redirect('kakses/daftarPengajuan');
    }
}

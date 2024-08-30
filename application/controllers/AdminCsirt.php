<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCsirt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Csirt_model');
        $this->load->library('session');
    }

    public function daftarLaporan() {
        $data['laporan'] = $this->Csirt_model->getAllLaporan();
        $this->load->view('admin_csirt/daftar_laporan', $data);
    }

    public function detailLaporan($id) {
        $data['laporan'] = $this->Csirt_model->getLaporanById($id);
        if ($data['laporan']) {
            $this->load->view('admin_csirt/detail_laporan', $data);
        } else {
            $this->session->set_flashdata('error', 'Laporan tidak ditemukan');
            redirect('admincsirt/daftarLaporan');
        }
    }

    public function updateStatusLaporan($id, $status) {
        $allowed_statuses = ['Belum Diproses', 'Sedang Diproses', 'Selesai'];

        if (in_array($status, $allowed_statuses)) {
            $this->Csirt_model->updateStatusLaporan($id, $status);
            $this->session->set_flashdata('success', 'Status laporan berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Status tidak valid');
        }
        redirect('admincsirt/detailLaporan/' . $id);
    }

    public function hapusLaporan($id) {
        if ($this->Csirt_model->deleteLaporan($id)) {
            $this->session->set_flashdata('success', 'Laporan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus laporan');
        }
        redirect('admincsirt/daftarLaporan');
    }
}
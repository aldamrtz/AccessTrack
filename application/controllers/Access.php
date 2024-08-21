<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

    public function index() {
        // Memuat tampilan form pengajuan kartu akses
        $this->load->view('access_form');
    }

    public function submit() {
        // Ambil data dari form
        $data = array(
            'jenis_pemohon' => $this->input->post('applicantType'), // Mengambil data jenis pemohon
            'nama_lengkap' => $this->input->post('fullName'), // Mengambil data nama lengkap
            'nim_nid_nip' => $this->input->post('identityNumber'), // Mengambil data NIM/NID/NIP
            'fakultas_departemen' => $this->input->post('facultyDepartment'), // Mengambil data fakultas/departemen
            'program_studi' => $this->input->post('studyProgram'), // Mengambil data program studi
            'email' => $this->input->post('email') // Mengambil data email
        );

        // Simpan data ke tabel pengajuan_ka
        $this->db->insert('pengajuan_ka', $data);

        // Kirim data ke view 'access_confirmation.php'
        $this->load->view('access_confirmation', $data);
    }

    public function confirmation() {
        // Memuat tampilan konfirmasi pengajuan kartu akses
        $this->load->view('access_confirmation');
    }

    public function success() {
        // Memuat tampilan sukses pengajuan kartu akses
        $this->load->view('access_success');
    }
}

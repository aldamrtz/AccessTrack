<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Access_model');
    }

    public function index() {
        // Load the form view
        $this->load->view('access_form');
    }

    public function submit() {
        $data = array(
            'jenis_pemohon' => $this->input->post('applicantType'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nim_nid_nip' => $this->input->post('identityNumber'),
            'fakultas_departemen' => $this->input->post('facultyDepartment'),
            'program_studi' => $this->input->post('programStudi'),
            'email' => $this->input->post('email'),
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),  // Menyimpan tanggal pengajuan
            'ketPengajuan' => $this->input->post('keteranganPengajuan'),  // Menggunakan nama kolom yang benar
            'applicantType' => $this->input->post('applicantType')  // Kolom applicantType
        );

        // Simpan data ke database
        $this->Access_model->insert_pengajuan($data);

        // Redirect ke halaman konfirmasi
        redirect('access/confirmation');
    }

    public function confirmation() {
        // Load confirmation view
        $this->load->view('access_confirmation');
    }
}

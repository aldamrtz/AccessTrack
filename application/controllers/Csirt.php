<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csirt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Csirt_model');
    }

    public function report() {
        $this->load->view('csirt_report');
    }

    public function submit_report() {
        // Ambil data dari form
        $data = array(
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'email_pelapor' => $this->input->post('email_pelapor'),
            'nip' => $this->input->post('nip'),
            'fakultas' => $this->input->post('fakultas'),
            'jurusan' => $this->input->post('jurusan'),
            'bagian' => $this->input->post('bagian'),
            'nama_website' => $this->input->post('nama_website'),
            'deskripsi_masalah' => $this->input->post('deskripsi_masalah'),
            'bukti_file' => $this->_uploadFile(), // Proses unggah file
            'tanggal_pelaporan' => date('Y-m-d H:i:s')
        );
    
        // Masukkan data ke dalam database
        if ($this->Csirt_model->insert_report($data)) {
            // Jika berhasil, tampilkan halaman sukses
            $this->load->view('report_success');
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Gagal mengirim laporan.";
        }
    }
    
    private function _uploadFile() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = time() . '_' . $_FILES['bukti_file']['name'];
        $config['max_size'] = 2048; // 2MB
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('bukti_file')) {
            return $this->upload->data("file_name");
        } else {
            // Tampilkan error jika ada masalah dalam upload
            echo $this->upload->display_errors();
            return null;
        }
    }
}
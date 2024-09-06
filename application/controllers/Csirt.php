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

    private function _uploadMultipleFiles() {
        $files = $_FILES['bukti_file'];
        $uploadedFiles = [];
        
        for ($i = 0; $i < count($files['name']); $i++) {
            $_FILES['file']['name'] = $files['name'][$i];
            $_FILES['file']['type'] = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error'] = $files['error'][$i];
            $_FILES['file']['size'] = $files['size'][$i];
    
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = time() . '_' . $files['name'][$i];
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('file')) {
                $uploadedFiles[] = $this->upload->data("file_name");
            }
        }
        
        return implode(',', $uploadedFiles);  // Gabungkan file dengan koma
    }
    
    public function submit_report() {
        $uploadedFiles = $this->_uploadMultipleFiles();
    
        if ($uploadedFiles !== false) {
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
                'bukti_file' => implode(',', $uploadedFiles),  // Simpan file sebagai string dipisahkan koma
                'tanggal_pelaporan' => date('Y-m-d H:i:s')
            );
    
            // Masukkan data ke dalam database
            if ($this->Csirt_model->insert_report($data)) {
                $this->load->view('report_success');
            } else {
                echo "Gagal mengirim laporan.";
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    }
}
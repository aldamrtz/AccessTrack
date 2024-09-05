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

    private function _uploadFiles() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2MB per file
    
        $this->load->library('upload', $config);
    
        $files = $_FILES;
        $fileNames = []; // Array untuk menyimpan nama file yang diunggah
    
        $count = count($_FILES['bukti_file']['name']); // Hitung jumlah file yang diunggah
        
        for ($i = 0; $i < $count; $i++) {
            $_FILES['bukti_file']['name'] = $files['bukti_file']['name'][$i];
            $_FILES['bukti_file']['type'] = $files['bukti_file']['type'][$i];
            $_FILES['bukti_file']['tmp_name'] = $files['bukti_file']['tmp_name'][$i];
            $_FILES['bukti_file']['error'] = $files['bukti_file']['error'][$i];
            $_FILES['bukti_file']['size'] = $files['bukti_file']['size'][$i];
    
            $config['file_name'] = time() . '_' . $_FILES['bukti_file']['name'];
    
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('bukti_file')) {
                $fileNames[] = $this->upload->data("file_name"); // Tambahkan nama file ke array
            } else {
                echo $this->upload->display_errors();
                return null;
            }
        }
    
        return implode(',', $fileNames); // Gabungkan nama file menjadi string terpisah koma
    }
    
    public function submit_report() {
        $data = array(
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'email_pelapor' => $this->input->post('email_pelapor'),
            'nip' => $this->input->post('nip'),
            'fakultas' => $this->input->post('fakultas'),
            'jurusan' => $this->input->post('jurusan'),
            'bagian' => $this->input->post('bagian'),
            'nama_website' => $this->input->post('nama_website'),
            'deskripsi_masalah' => $this->input->post('deskripsi_masalah'),
            'bukti_file' => $this->_uploadFiles(), // Ubah sesuai fungsi multi-file
            'tanggal_pelaporan' => date('Y-m-d H:i:s')
        );
        
        if ($this->Csirt_model->insert_report($data)) {
            $this->load->view('report_success');
        } else {
            echo "Gagal mengirim laporan.";
        }
    }
}
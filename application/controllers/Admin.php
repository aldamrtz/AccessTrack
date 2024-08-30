<?php
class Admin extends CI_Controller {

    public function index() {
        // Memuat model Admin_model
        $this->load->model('Admin_model');
        
        // Mengambil pengajuan dengan status yang berbeda-beda
        $data['pending'] = $this->Admin_model->get_pengajuan_by_status('pending');
        $data['approved'] = $this->Admin_model->get_pengajuan_by_status('approved');
        $data['rejected'] = $this->Admin_model->get_pengajuan_by_status('rejected');
        
        // Memuat view admin_approval dengan data yang sesuai
        $this->load->view('admin_approval', $data);
    }

    public function approve($id) {
        // Memuat model Admin_model
        $this->load->model('Admin_model');
        
        // Mengubah status pengajuan menjadi approved
        $this->Admin_model->update_status($id, 'approved');
        
        // Mengarahkan kembali ke halaman admin
        redirect('admin');
    }

    public function reject($id) {
        // Memuat model Admin_model
        $this->load->model('Admin_model');
        
        // Mengubah status pengajuan menjadi rejected
        $this->Admin_model->update_status($id, 'rejected');
        
        // Mengarahkan kembali ke halaman admin
        redirect('admin');
    }

    public function laporan() {
        // Memuat model Access_model
        $this->load->model('Access_model');
        
        // Mengambil pengajuan berdasarkan tipe pemohon (Mahasiswa, Dosen, Staff)
        $data['mahasiswa'] = $this->Access_model->get_pengajuan_by_type('Mahasiswa');
        $data['dosen'] = $this->Access_model->get_pengajuan_by_type('Dosen');
        $data['staff'] = $this->Access_model->get_pengajuan_by_type('Staff');
        
        // Memuat view admin_laporan dengan data yang sesuai
        $this->load->view('admin_laporan', $data);
    }

}

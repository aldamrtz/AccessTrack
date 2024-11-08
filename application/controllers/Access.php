<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Access_model');
    }

    public function form()
    {
        $this->load->view('access_form');
    }

    public function submit_mahasiswa()
{
    $email = $this->input->post('email');
    $keterangan = $this->input->post('keteranganPengajuan');
    $data = [
        'applicant_type' => 'Mahasiswa',
        'email' => $email,
        'keterangan_pengajuan' => $keterangan,
        'status' => 'pending',
        'payment_status' => 'Belum Bayar',
        'tanggal_pengajuan' => date('Y-m-d H:i:s'),
        'nama_lengkap' => $this->input->post('nama_lengkap_mahasiswa'),
        'identity_number' => $this->input->post('identityNumber_mahasiswa'),
        'faculty_department' => $this->input->post('fakultas'),
        'program_studi' => $this->input->post('jurusan'),
        'payment_amount' => 40000
    ];

    if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] === UPLOAD_ERR_OK) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = time() . '_' . $_FILES['payment_proof']['name'];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('payment_proof')) {
            $uploadData = $this->upload->data();
            $data['payment_proof'] = 'uploads/' . $uploadData['file_name'];
        } else {
            $this->session->set_flashdata('error', 'Gagal mengunggah bukti pembayaran.');
            redirect('access/form');
        }
    } else {
        $this->session->set_flashdata('error', 'Bukti pembayaran wajib diunggah.');
        redirect('access/form');
    }

    if (empty($data['nama_lengkap'])) {
        $this->session->set_flashdata('error', 'Nama lengkap tidak boleh kosong.');
        redirect('access/form');
    } else {
        if ($this->Access_model->insert_pengajuan($data)) {
            redirect('access/confirmation');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
            redirect('access/form');
        }
    }
}

public function submit_dosen()
{
    $email = $this->input->post('email');
    $keterangan = $this->input->post('keteranganPengajuan');
    $data = [
        'applicant_type' => 'Dosen',
        'email' => $email,
        'keterangan_pengajuan' => $keterangan,
        'status' => 'pending',
        'tanggal_pengajuan' => date('Y-m-d H:i:s'),
        'nama_lengkap' => $this->input->post('nama_lengkap_Dosen'),
        'identity_number' => $this->input->post('identityNumber_Dosen'),
        'faculty_department' => $this->input->post('facultyDepartment_Dosen'),
        'jabatan' => $this->input->post('jabatan')
    ];

    if (empty($data['nama_lengkap'])) {
        $this->session->set_flashdata('error', 'Nama lengkap tidak boleh kosong.');
        redirect('access/form');
    } else {
        if ($this->Access_model->insert_pengajuan($data)) {
            redirect('access/confirmation');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
            redirect('access/form');
        }
    }
}

public function submit_staff()
{
    $email = $this->input->post('email');
    $keterangan = $this->input->post('keteranganPengajuan');
    $data = [
        'applicant_type' => 'Staff',
        'email' => $email,
        'keterangan_pengajuan' => $keterangan,
        'status' => 'pending',
        'tanggal_pengajuan' => date('Y-m-d H:i:s'),
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'identity_number' => $this->input->post('identityNumber'),
        'faculty_department' => $this->input->post('facultyDepartment'),
        'jabatan' => $this->input->post('jabatan')
    ];

    if (empty($data['nama_lengkap'])) {
        $this->session->set_flashdata('error', 'Nama lengkap tidak boleh kosong.');
        redirect('access/form');
    } else {
        if ($this->Access_model->insert_pengajuan($data)) {
            redirect('access/confirmation');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
            redirect('access/form');
        }
    }
}


    public function confirmation()
    {
        $this->load->view('access_confirmation');
    }

    public function approval_list()
    {
        $data['pending'] = $this->Access_model->get_pengajuan_by_status('pending');
        $data['approved'] = $this->Access_model->get_pengajuan_by_status('approved');
        $this->load->view('approval', $data);
    }

    public function approve($id)
    {
        $this->Access_model->update_status($id, 'approved');
        redirect('access/approval_list');
    }

    public function reject($id)
    {
        $this->Access_model->update_status($id, 'rejected');
        redirect('access/approval_list');
    }

    public function laporan()
    {
        $data['mahasiswa'] = $this->Access_model->get_pengajuan_by_type('Mahasiswa');
        $data['dosen'] = $this->Access_model->get_pengajuan_by_type('Dosen');
        $data['staff'] = $this->Access_model->get_pengajuan_by_type('Staff');
        $this->load->view('admin_laporan', $data);
    }

    public function hapus_pengajuan($id)
    {
        if ($this->Access_model->delete_pengajuan($id)) {
            redirect('access/approval_list');
        } else {
            show_error('Pengajuan tidak dapat dihapus.');
        }
    }
}

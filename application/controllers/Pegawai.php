<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KartuAkses_model');
        $this->load->library('session');
    }

    public function formPengajuanKartuAkses() {

        $role = $this->session->userdata('role');

        if($role == 'dosen') {
            $data = array(
                'nid' => $this->session->userdata('nid'),
                'nama' => $this->session->userdata('nama'),
                'prodi' => $this->session->userdata('prodi'),
                'fakultas' => $this->session->userdata('fakultas')
            );
        } elseif ($role == 'staf') {
            $data = array(
                'nip' => $this->session->userdata('nip'),
                'nama' => $this->session->userdata('nama'),
                'departemen' => $this->session->userdata('departemen')
            );
        }
        $this->load->view('pegawai/form_pengajuan', $data);
    }

    public function ajukanKartuAkses() {

        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role'); // dosen atau staf
        $nama = $this->session->userdata('nama');
        $email = $this->session->userdata('email');

        if ($role == 'dosen') {
            $id_number = $this->session->userdata('nid');
            $prodi = $this->session->userdata('prodi');
            $fakultas = $this->session->userdata('fakultas');
        } elseif ($role == 'staf') {
            $id_number = $this->session->userdata('nip');
            $departemen = $this->session->userdata('departemen');
        }
        $this->form_validation->set_rules('id_card', 'ID Card', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->formPengajuanKartuAkses(); // load form pengajuan lagi if validate gagal
        } else {
            $id_card = $this->uploadFile('id_card');

            if($id_card) {
                $data = array(
                    'user_id' => $user_id,
                    'role' => $role,
                    'nama' => $nama,
                    'email' => $email,
                    'id_card' => $id_card,
                    'tanggal_pengajuan' => date('Y-m-d H:i:s'),
                    'status' => 'Belum Diproses'
                );

                if ($role == 'dosen') {
                    $data['nid'] = $id_number;
                    $data['prodi'] = $prodi;
                    $data['fakultas'] = $fakultas;
                } elseif ($role == 'staf') {
                    $data['nip'] = $id_number;
                    $data['departemen'] = $departemen;
                }

                $this->KartuAkses_model->createCard($data);
                $this->sendEmailNotification($email, 'Pengajuan Kartu Akses', 'Pengajuan Kartu Akses Anda telah diterima dan sedang diproses.');

                $this->session->set_flashdata('success', 'Pengajuan kartu akses berhasil. Silakan cek email untuk notifikasi.');
                redirect('pegawai/successPage');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah file. Silakan coba lagi.');
                redirect('pegawai/form_pengajuan');
            }
        }
    }

    private function uploadFile($field_name) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }

    private function sendEmailNotification($to_email, $subject, $message) {
        $this->load->library('email');

        $this->email->from('no-reply@domain.com', 'Sistem Kartu Akses UNJANI');
        $this->email->to($to_email);

        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();


    }
}
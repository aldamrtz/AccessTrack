<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmailModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['program_studi'] = $this->EmailModel->getProgramStudi();
        $this->load->view('pengajuan_email', $data);
    }

    public function submit() {
        // Dapatkan input dari user
        $email_diajukan = $this->input->post('email_diajukan');
        $program_studi = $this->input->post('prodi');

        if ($this->input->post('email_option') == 'suggestion') {
            // Ambil nilai dari radio button jika opsi saran yang dipilih
            $email_diajukan = $this->input->post('email_saran');
        } else {
            $email_diajukan = $this->input->post('email_diajukan');
            // Tambahkan domain jika email custom yang dipilih
            $domain = $this->getDomainByProdi($program_studi);
            if (strpos($email_diajukan, $domain) === false) {
                $email_diajukan .= $domain;
            }
        }
        
        // Set input email yang sudah ditambahkan domain
        $_POST['email_diajukan'] = $email_diajukan;

        // Validasi form
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('email_diajukan', 'Email yang Diajukan', 'required|valid_email|callback_checkEmailExistence');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required|valid_email');

        // Jika opsi radio untuk custom email dipilih
        if ($this->input->post('email_option') == 'custom') {
            $this->form_validation->set_rules('email_diajukan', 'Email yang Diajukan', 'required|valid_email|callback_checkEmailExistence');
        } else {
            // Jika opsi saran dipilih, email_diajukan tidak perlu diisi
            $this->form_validation->set_rules('email_diajukan', 'Email yang Diajukan', 'callback_checkEmailExistence');
        }
        
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required|valid_email');

        // Validasi file KTM
        if (empty($_FILES['ktm']['name'])) {
            $this->form_validation->set_rules('ktm', 'Kartu Tanda Mahasiswa', 'required');
        }

        $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_validateCaptcha');

        if ($this->form_validation->run() == FALSE) {
            $data['program_studi'] = $this->EmailModel->getProgramStudi();
            $data['form_data'] = $this->input->post();
            $this->load->view('pengajuan_email', $data);
        } else {
            $ktm = '';
            if (!empty($_FILES['ktm']['name'])) {
                $config['upload_path'] = './uploads/ktm/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $this->input->post('nim').'_ktm';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ktm')) {
                    $uploadData = $this->upload->data();
                    $ktm = $uploadData['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('EmailController');
                }
            }

            $data = array(
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'nim' => $this->input->post('nim'),
                'prodi' => $this->input->post('prodi'),
                'email_diajukan' => $email_diajukan,
                'email_pengguna' => $this->input->post('email_pengguna'),
                'ktm' => $ktm,
                'tgl_pengajuan' => date('Y-m-d')
            );

            if ($this->EmailModel->insert($data)) {
                $this->session->set_flashdata('success', 'Pengajuan email berhasil dikirim.');
                $this->sendNotificationEmail($data['email_pengguna'], $data);
            } else {
                $this->session->set_flashdata('error', 'Pengajuan gagal. NIM sudah terdaftar.');
            }

            $this->load->model('NotificationModel');
            $notification_data = [
                'user' => $this->input->post('email_pengguna'),
                'type' => 'email',
            ];
            $this->NotificationModel->insertNotification($notification_data);

            redirect('EmailController');
        }
    }

    public function sendNotificationEmail($email_pengguna, $data) {
        $this->load->library('email');
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aldaamorita@gmail.com', // Ganti dengan email kamu
            'smtp_pass' => 'iftxvtcfydxwalsy',        // Ganti dengan password email kamu
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );
        
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        
        $this->email->from($email_pengguna, 'Pengajuan Email');
        $this->email->to('aldaamorita@gmail.com'); // Ganti dengan email admin
        $this->email->subject('Pengajuan Pembuatan Akun Email Baru');
        
        $message = '<p>Pengajuan pembuatan akun email baru oleh:</p>';
        $message .= '<p>NIM: ' . $data['nim'] . '</p>';
        $message .= '<p>Program Studi: ' . $data['prodi'] . '</p>';
        $message .= '<p>Nama: ' . $data['nama_depan'] . ' ' . $data['nama_belakang'] . '</p>';
        $message .= '<p>Email yang Diajukan: ' . $data['email_diajukan'] . '</p>';
        $message .= '<p>Email Pengguna: ' . $data['email_pengguna'] . '</p>';
        $message .= '<p>Kartu Tanda Mahasiswa (KTM): <a href="' . base_url('uploads/ktm/' . $data['ktm']) . '">' . $data['ktm'] . '</a></p>';

        $this->email->message($message);
        
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function validateEmailDiajukan($email) {
        $lengthPattern = '/^.{6,30}$/';
        $contentPattern = '/^[a-zA-Z0-9.]+$/';

        if (!preg_match($lengthPattern, $email)) {
            $this->form_validation->set_message('validateEmailDiajukan', 'Email yang diajukan harus terdiri dari 6-30 karakter.');
            return FALSE;
        }

        if (!preg_match($contentPattern, $email)) {
            $this->form_validation->set_message('validateEmailDiajukan', 'Hanya berisi huruf, angka, atau titik yang diizinkan.');
            return FALSE;
        }

        return TRUE;
    }

    
    public function checkEmailExistence($email) {
        if ($this->EmailModel->isEmailExist($email)) {
            $this->form_validation->set_message('checkEmailExistence', 'Email yang diajukan sudah ada, silakan coba email lain.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getDomainByProdi($prodi) {
        $domains = [
            'Informatika' => '@if.unjani.ac.id',
            'Sistem Informasi' => '@si.unjani.ac.id'
            // Tambahkan domain lain sesuai kebutuhan
        ];

        return isset($domains[$prodi]) ? $domains[$prodi] : '@if.unjani.ac.id'; // Default domain
    }

    public function check_email_availability() {
        $email_prefix = $this->input->post('email_prefix');
        $program_studi = $this->input->post('prodi');
        $domain = $this->getDomainByProdi($program_studi);
        $email_full = $email_prefix . $domain;

        if ($this->EmailModel->isEmailExist($email_full)) {
            $suggestions = [];
            $nama_depan = strtolower(str_replace(' ', '', $this->input->post('nama_depan')));
            $nama_belakang = strtolower(str_replace(' ', '', $this->input->post('nama_belakang')));

            // Generate suggestions for the radio button (with domain)
            $suggestionsWithDomain = [
                $nama_depan . '.' . $nama_belakang . $domain,
                $nama_belakang . '.' . $nama_depan . $domain,
                substr($nama_depan, 0, 1) . '.' . $nama_belakang . $domain
            ];

            $suggestionsWithDomain = array_filter($suggestionsWithDomain, function($suggestion) use ($domain) {
                return !$this->EmailModel->isEmailExist($suggestion);
            });

            // Generate suggestions for email feedback (without domain)
            $suggestionsWithoutDomain = [
                $nama_depan . '.' . $nama_belakang,
                $nama_belakang . '.' . $nama_depan,
                substr($nama_depan, 0, 1) . '.' . $nama_belakang,
                $nama_depan . rand(100, 999),
                $nama_belakang . rand(100, 999)
            ];

            // Filter out suggestions that appear in radio buttons
            $suggestionsWithoutDomain = array_diff($suggestionsWithoutDomain, array_map(function($suggestion) use ($domain) {
                return str_replace($domain, '', $suggestion);
            }, $suggestionsWithDomain));

            $suggestionsWithoutDomain = array_filter($suggestionsWithoutDomain, function($suggestion) use ($domain) {
                return !$this->EmailModel->isEmailExist($suggestion . $domain);
            });

            echo json_encode([
                'status' => 'taken',
                'suggestions' => array_slice($suggestionsWithoutDomain, 0, 3),
                'radioSuggestions' => $suggestionsWithDomain
            ]);
        } else {
            echo json_encode(['status' => 'available']);
        }
    }

    public function generateSuggestions() {
        $nama_depan = strtolower(str_replace(' ', '', $this->input->post('nama_depan')));
        $nama_belakang = strtolower(str_replace(' ', '', $this->input->post('nama_belakang')));
        $prodi = $this->input->post('prodi');
        
        $domain = $this->getDomainByProdi($prodi);
        
        $suggestions = [
            $nama_depan . '.' . $nama_belakang,
            $nama_belakang . '.' . $nama_depan,
            substr($nama_depan, 0, 1) . '.' . $nama_belakang,
            $nama_depan . substr($nama_belakang, 0, 1),
            $nama_depan . rand(100, 999),
        ];
        
        $valid_suggestions = array();
        foreach ($suggestions as $suggestion) {
            $full_email = $suggestion . $domain;
            if (!$this->EmailModel->isEmailExist($full_email)) {
                $valid_suggestions[] = $full_email;
            }
        }

        // Pastikan valid_suggestions berbeda dari saran di radio buttons
        $valid_suggestions = array_slice(array_unique($valid_suggestions), 0, 2);
        
        echo json_encode([
            'status' => 'success',
            'suggestions' => $valid_suggestions
        ]);
    }

    public function validateCaptcha($input) {
        if ($input == $this->session->userdata('captcha')) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validateCaptcha', 'Captcha yang dimasukkan salah.');
            return FALSE;
        }
    }
}
?>
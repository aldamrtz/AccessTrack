<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubDomainController extends CI_Controller
{

    private $recaptcha_secret;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('SubDomainModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->recaptcha_secret = '6Lf0PEQqAAAAACRlO3K96wdEZqJlS8qSfeD3IPCq';

        check_role([4, 5]);
        $this->load->model('Dashboard_ModelAktor');
        $this->load->helper('cookie');

        if (!$this->session->userdata('id_user')) {
            delete_cookie('user_session');
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('login');
        }
    }

    public function index()
    {
        if (!in_array($this->session->userdata('id_role'), ['1', '2', '3', '4', '5'])) {
            redirect('login');
        }

        $id_user = $this->session->userdata('id_user');
        $user_data = $this->Dashboard_ModelAktor->get_user_data($id_user);

        $data['id_user'] = $user_data->id_user;
        $data['nama_lengkap'] = $user_data->nama_lengkap;
        $data['unit_kerja'] = $this->SubDomainModel->getUnitKerja();
        $this->load->view('pengajuan_subdomain', $data);
    }

    public function submit()
    {
        $recaptcha_token = $this->input->post('recaptcha-token');

        if (empty($recaptcha_token)) {
            $this->session->set_flashdata('error', 'Token reCAPTCHA tidak ditemukan.');
            redirect('SubDomainController');
        }

        $response = $this->verifyRecaptcha($recaptcha_token);

        if (!$response['success'] || $response['score'] < 0.5) {
            $this->session->set_flashdata('error', 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
            redirect('SubDomainController');
        }

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $random_code = substr(str_shuffle($characters), 0, 7);

        $sub_domain_diajukan = $this->input->post('sub_domain');

        $sub_domain_diajukan = 'https://' . $sub_domain_diajukan . '.unjani.ac.id';
        $unit_kerja = $this->input->post('unit_kerja');

        $_POST['sub_domain'] = $sub_domain_diajukan;
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('email_penanggung_jawab', 'Email Penanggung Jawab', 'required|valid_email');
        $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');
        $this->form_validation->set_rules('sub_domain', 'Subdomain yang Diajukan', 'required|callback_checkSubDomainExistence');
        $this->form_validation->set_rules('kontak_penanggung_jawab', 'Kontak Penanggung Jawab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['unit_kerja'] = $this->SubDomainModel->getUnitKerja();
            $data['form_data'] = $this->input->post();
            $this->load->view('pengajuan_subdomain', $data);
        } else {
            $unit_kerja = $this->input->post('unit_kerja');

            $data = array(
                'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                'email_penanggung_jawab' => $this->input->post('email_penanggung_jawab'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'unit_kerja' => $this->input->post('unit_kerja'),
                'sub_domain' => $sub_domain_diajukan,
                'kontak_penanggung_jawab' => $this->input->post('kontak_penanggung_jawab'),
                'keterangan' => $this->input->post('keterangan'),
                'ip_pointing' => $this->input->post('ip_pointing'),
                'tgl_pengajuan' => date('Y-m-d H:i:s'),
                'kode_pengajuan' => $random_code
            );

            if ($this->SubDomainModel->insert($data)) {
                $status_data = array(
                    'id_pengajuan_subdomain' => $this->db->insert_id(),
                    'status' => 'Diajukan',
                    'tgl_update' => date('Y-m-d H:i:s')
                );
                $this->SubDomainModel->insertStatusHistorySubdomain($status_data);

                $this->session->set_flashdata('success', 'Pengajuan sub domain berhasil dikirim.');
                $this->sendNotificationEmail($data['email_penanggung_jawab'], $data);
                $this->sendUserNotificationEmail($data['email_penanggung_jawab'], $data, $random_code);
            } else {
                $this->session->set_flashdata('error', 'Pengajuan gagal. Nomor Induk sudah terdaftar.');
            }

            redirect('SubDomainController');
        }
    }

    public function sendNotificationEmail($email_penanggung_jawab, $data)
    {
        $this->load->library('email');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aldaamorita@gmail.com',
            'smtp_pass' => 'iftxvtcfydxwalsy',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($email_penanggung_jawab);
        $this->email->to('aldaamorita21@if.unjani.ac.id');
        $this->email->subject('Pengajuan Pembuatan Subdomain Baru');

        $message = '<p style="margin-top: 0; padding-top: 0;">Halo, Admin Staf Administrasi SISFO UNJANI!</p>';
        $message .= '<p style="margin: 0; padding: 0;">Terdapat pengajuan baru untuk pembuatan sub domain dengan rincian sebagai berikut:</p>';

        $message .= '<table>';
        $message .= '<tr><td style="padding-right: 20px;"><strong>Nama Penanggung Jawab</strong></td><td>:</td><td>' . $data['penanggung_jawab'] . '</td></tr>';
        $message .= '<tr><td style="padding-right: 20px;"><strong>Nomor Induk</strong></td><td>:</td><td>' . $data['nomor_induk'] . '</td></tr>';
        $message .= '<tr><td style="padding-right: 20px;"><strong>Unit Kerja</strong></td><td>:</td><td>' . $data['unit_kerja'] . '</td></tr>';
        $message .= '</table>';

        $message .= '<p style="margin-bottom: 0; padding-bottom: 0;">Untuk meninjau lebih lanjut, silakan klik tombol di bawah ini:</p>';
        $message .= '<p style="margin-bottom: 3px; padding-bottom: 3px; margin-top: 3px; padding-top: 3px;"><a href="' . base_url('AdminPengajuanController/data_pengajuan_subdomain') . '" style="display: inline-block; padding: 10px 20px; background-color: #13855c; color: #fff; text-decoration: none; border-radius: 5px; width: 155px; text-align: center;">Lihat Selengkapnya</a></p>';
        $message .= '<p style="margin: 0; padding: 0;">Terima kasih atas perhatian Anda.</p>';

        $message .= '<p style="margin-bottom: 0; padding-bottom: 0; font-size: 12px; color: #888;">Email ini dikirim secara otomatis. Mohon untuk tidak membalas email ini.</p>';

        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendUserNotificationEmail($email_penanggung_jawab, $data, $random_code)
    {
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aldaamorita@gmail.com',
            'smtp_pass' => 'iftxvtcfydxwalsy',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('aldaamorita21@if.unjani.ac.id');
        $this->email->to($email_penanggung_jawab);
        $this->email->subject('Pengajuan Subdomain Anda Telah Dikirim');

        $message = '<p style="margin-top: 0; padding-top: 0;">Halo, ' . $data['penanggung_jawab'] . '!</p>';
        $message .= '<p style="margin: 0; padding: 0;">Pengajuan pembuatan subdomain Anda telah berhasil dikirim.</p>';
        $message .= '<p style="margin: 0; padding: 0;">Gunakan kode berikut untuk memeriksa status pengajuan Anda: <strong>' . $random_code . '</strong></p>';
        $message .= '<p style="margin-bottom: 0; padding-bottom: 0;">Silakan klik tombol di bawah ini untuk informasi lebih lanjut:</p>';
        $message .= '<p style="margin-bottom: 3px; padding-bottom: 3px; margin-top: 3px; padding-top: 3px;"><a href="' . base_url('SubdomainController/status_pengajuan_subdomain_login') . '" style="display: inline-block; padding: 10px 20px; background-color: #00aaff; color: #fff; text-decoration: none; border-radius: 5px; width: 155px; text-align: center;">Lihat Status Pengajuan</a></p>';
        $message .= '<p style="margin: 0; padding: 0;">Terima kasih atas perhatian Anda.</p>';

        $message .= '<p style="margin-bottom: 0; padding-bottom: 0; font-size: 12px; color: #888;">Email ini dikirim secara otomatis. Mohon untuk tidak membalas email ini.</p>';

        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function status_pengajuan_subdomain_login()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('email_penanggung_jawab', 'Email Penanggung Jawab', 'required|valid_email');
            $this->form_validation->set_rules('kode_pengajuan', 'Kode Pengajuan', 'required');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['success' => false, 'error' => [
                    'email' => form_error('email_penanggung_jawab'),
                    'kode' => form_error('kode_pengajuan'),
                    'general' => ''
                ]]);
                return;
            }

            $email_penanggung_jawab = $this->input->post('email_penanggung_jawab');
            $kode_pengajuan = $this->input->post('kode_pengajuan');

            $result = $this->SubDomainModel->checkEmailAndCode($email_penanggung_jawab, $kode_pengajuan);

            if ($result === 'success') {
                $pengajuan_subdomain = $this->SubDomainModel->getPengajuanByEmailAndCode($email_penanggung_jawab, $kode_pengajuan);
                $this->session->set_userdata('pengajuan_subdomain', $pengajuan_subdomain);
                echo json_encode(['success' => true]);
            } else {
                if ($result === 'email_not_found') {
                    echo json_encode(['success' => false, 'error' => ['email' => 'Email tidak ditemukan.', 'kode' => '', 'general' => '']]);
                } else if ($result === 'kode_salah') {
                    echo json_encode(['success' => false, 'error' => ['email' => '', 'kode' => 'Kode salah.', 'general' => '']]);
                }
            }
        } else {
            $this->load->view('status_pengajuan_subdomain_login');
        }
    }

    public function status_pengajuan_subdomain()
    {
        if (!$this->session->userdata('pengajuan_subdomain')) {
            redirect('SubDomainController/status_pengajuan_subdomain_login');
        }

        $data['pengajuan_subdomain'] = $this->session->userdata('pengajuan_subdomain');
        $data['pengajuan_subdomain'] = $this->SubDomainModel->getPengajuanById($data['pengajuan_subdomain']->id_pengajuan_subdomain);

        $id_pengajuan_subdomain = $data['pengajuan_subdomain']->id_pengajuan_subdomain;
        $data['status_history_subdomain'] = $this->SubDomainModel->getStatusHistory($id_pengajuan_subdomain);

        $this->load->view('status_pengajuan_subdomain', $data);
    }

    public function logoutStatus()
    {
        $this->session->unset_userdata('pengajuan_subdomain');
        $this->session->set_flashdata('success', 'Anda berhasil keluar dari halaman status pengajuan.');
        redirect('SubDomainController/status_pengajuan_subdomain_login');
    }

    public function updateStatus($id, $status)
    {
        $this->SubDomainModel->updateStatus($id, $status);

        $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui dan email telah dikirim.');
        redirect('AdminPengajuanController/data_pengajuan_subdomain');
    }

    public function validateSubDomain($sub_domain)
    {
        $lengthPattern = '/^.{6,63}$/';
        $contentPattern = '/^[a-z0-9\-\.]+$/';
        $consecutiveHyphenPattern = '/--/';
        $consecutiveDotPattern = '/\.\./';
        $startEndHyphenPattern = '/^-|-$/';
        $startEndDotPattern = '/^\.|.$/';
        $hyphenDotFollowingPattern = '/[-]\./';
        $dotHyphenFollowingPattern = '/\.[-]/';

        if (!preg_match($lengthPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Subdomain yang diajukan harus terdiri dari 6-63 karakter.');
            return FALSE;
        }
        if (!preg_match($contentPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Hanya huruf kecil (a-z), angka (0-9), tanda hubung (-), dan titik (.) yang diizinkan.');
            return FALSE;
        }
        if (preg_match($consecutiveHyphenPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Subdomain tidak boleh mengandung dua tanda hubung berturut-turut.');
            return FALSE;
        }
        if (preg_match($consecutiveDotPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Subdomain tidak boleh mengandung dua titik berturut-turut.');
            return FALSE;
        }
        if (preg_match($startEndHyphenPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Subdomain tidak boleh dimulai atau diakhiri dengan tanda hubung (-).');
            return FALSE;
        }
        if (preg_match($startEndDotPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Titik (.) tidak boleh di awal atau akhir sub domain.');
            return FALSE;
        }
        if (preg_match($hyphenDotFollowingPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Tanda hubung (-) tidak boleh diikuti oleh titik (.).');
            return FALSE;
        }
        if (preg_match($dotHyphenFollowingPattern, $sub_domain)) {
            $this->form_validation->set_message('validateSubDomain', 'Titik (.) tidak boleh diikuti oleh tanda hubung (-).');
            return FALSE;
        }

        return TRUE;
    }

    public function checkSubDomainExistence($sub_domain)
    {
        if ($this->SubDomainModel->isSubDomainExist($sub_domain)) {
            $this->form_validation->set_message('checkSubDomainExistence', 'Subdomain sudah terdaftar');
            return FALSE;
        }
        if ($this->SubDomainModel->isSubDomainExistInRegistered($sub_domain)) {
            $this->form_validation->set_message('checkSubDomainExistence', 'Subdomain sudah terdaftar');
            return FALSE;
        }
        return TRUE;
    }

    public function check_subdomain_availability()
    {
        $sub_domain_prefix = $this->input->post('sub_domain_prefix');
        $sub_domain_prefix = str_replace(['https://', 'http://', '.unjani.ac.id'], '', $sub_domain_prefix);

        $exists = $this->SubDomainModel->checkSubDomainExists($sub_domain_prefix);

        if ($exists) {
            echo json_encode(['status' => 'taken']);
        } else {
            echo json_encode(['status' => 'available']);
        }
    }

    private function verifyRecaptcha($recaptcha_token)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $this->recaptcha_secret,
            'response' => $recaptcha_token
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return ['success' => false];
        }

        return json_decode($result, true);
    }

    public function logout()
    {
        $this->load->helper('cookie');
        $this->session->unset_userdata('id_user');
        delete_cookie('user_session');

        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        redirect('login');
    }
}

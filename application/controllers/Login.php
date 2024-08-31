<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries and helpers
        $this->load->library('form_validation');
        $this->load->helper('cookie'); // Load the cookie helper
        $this->load->model('LoginModel');
    }

    public function index()
    {
        // Ambil site_key untuk reCAPTCHA
        $data['site_key'] = $this->config->item('recaptcha_site_key');
        $this->load->view('auth/login', $data);
    }

    public function authenticate()
    {
        // Aturan validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required');

        // Verifikasi reCAPTCHA
        $recaptcha_response = $this->input->post('g-recaptcha-response');
        $response = $this->verifyRecaptcha($recaptcha_response);

        if ($this->form_validation->run() == FALSE || !$response['success']) {
            // Jika validasi atau reCAPTCHA gagal, tampilkan pesan error
            $error_message = validation_errors();
            if (!$response['success']) {
                $error_message .= ' Verifikasi reCAPTCHA gagal.';
            }
            $this->session->set_flashdata('error', $error_message);
            redirect('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Validasi login melalui LoginModel
            $user = $this->LoginModel->validate($email, $password);

            if ($user) {
                // Set session jika login berhasil
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('email', $user->email);

                // Set cookie untuk sesi login
                $cookie = array(
                    'name'   => 'user_session',
                    'value'  => 'logged_in',
                    'expire' => '3600', // 1 jam
                    'secure' => FALSE,  // TRUE jika menggunakan HTTPS
                    'httponly' => TRUE, // Mencegah akses dari JavaScript
                    'samesite' => 'Lax' // Mengatur SameSite menjadi Lax
                );

                $this->input->set_cookie($cookie);

                // Redirect ke dashboard jika login berhasil
                redirect('dashboard');
            } else {
                // Tampilkan pesan error jika email atau password salah
                $this->session->set_flashdata('error', 'Email atau Password salah');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        // Load Cookie Helper (should be already loaded in constructor)
        // Hapus cookie saat logout
        delete_cookie('user_session');

        // Hapus session data
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');

        // Tampilkan pesan sukses logout
        $this->session->set_flashdata('success', 'Anda berhasil logout');
        redirect('login');
    }

    private function verifyRecaptcha($recaptcha_response)
    {
        $secret = $this->config->item('recaptcha_secret_key');
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $data = array(
            'secret' => $secret,
            'response' => $recaptcha_response
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true);
    }
}

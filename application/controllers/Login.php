<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries, helpers, and model
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        $this->load->model('LoginModel');
    }

    public function index()
    {
        // Load reCAPTCHA site key
        $data['site_key'] = $this->config->item('recaptcha_site_key');
        $this->load->view('auth/login', $data);
    }

    public function authenticate()
    {
        // Form validation rules
        $this->form_validation->set_rules('id_user', 'Id_user', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required');

        // Verify reCAPTCHA
        $recaptcha_response = $this->input->post('g-recaptcha-response');
        $response = $this->verifyRecaptcha($recaptcha_response);

        if ($this->form_validation->run() == FALSE || !$response['success']) {
            // Display error message if validation or reCAPTCHA fails
            $error_message = validation_errors();
            if (!$response['success']) {
                $error_message .= ' Verifikasi reCAPTCHA gagal.';
            }
            $this->session->set_flashdata('error', $error_message);
            redirect('login');
        } else {
            $id_user = $this->input->post('id_user');
            $password = $this->input->post('password');

            // Validate login with LoginModel
            $user = $this->LoginModel->validate($id_user, $password);

            if ($user !== false) {
                // Set session data on successful login
                $this->session->set_userdata('id_user', $user->id_user);
                $this->session->set_userdata('id_role', $user->id_role);

                // Set session data based on user role
                if ($user->id_role === '1' || $user->id_role === '2' || $user->id_role === '3' || $user->id_role === '4' || $user->id_role === '5') {
                    $this->session->set_userdata('login', true);
                    $this->session->set_userdata('Nama', $user->nama_lengkap);
                }
                // Redirect based on id_role
                switch ($user->id_role) {
                    case 1: // Kepala Sisfo
                        redirect('dashboard');
                        break;
                    case 2: // Mahasiswa
                        redirect('dashboardmahasiswa');
                        break;
                    case 3: // Admin
                        redirect('dashboardadmin');
                        break;
                    case 4: // Tenaga Pendidik
                        redirect('dashboardtendik');
                        break;
                    case 5: // Dosen
                        redirect('dashboarddosen');
                        break;
                    default:
                        // If role is undefined, redirect to login with error
                        $this->session->set_flashdata('error', 'Role tidak valid.');
                        redirect('login');
                        break;
                }
            } else {
                // Display error if user id or password is incorrect
                $this->session->set_flashdata('error', 'user id atau Password salah');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        // Delete login session and cookie
        delete_cookie('user_session');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_role');

        // Redirect to login with logout message
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $data['site_key'] = $this->config->item('recaptcha_site_key');
        $this->load->view('auth/login', $data);
    }

    public function authenticate()
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required');

        $recaptcha_response = $this->input->post('g-recaptcha-response');
        $response = $this->verifyRecaptcha($recaptcha_response);

        if ($this->form_validation->run() == FALSE || !$response['success']) {
            $error_message = validation_errors();
            if (!$response['success']) {
                $error_message .= ' Verifikasi reCAPTCHA gagal.';
            }
            $this->session->set_flashdata('error', $error_message);
            redirect('login');
        } else {
            $id_user = $this->input->post('id_user');
            $password = $this->input->post('password');

            $user = $this->LoginModel->validate($id_user, $password);

            if ($user !== false) {
                $this->session->set_userdata('id_user', $user->id_user);
                $this->session->set_userdata('id_role', $user->id_role);

                if ($user->id_role === '1' || $user->id_role === '2' || $user->id_role === '3' || $user->id_role === '4' || $user->id_role === '5') {
                    $this->session->set_userdata('login', true);
                    $this->session->set_userdata('Nama', $user->nama_lengkap);

                    // Check if password needs to be changed
                    if (in_array($user->id_role, [2, 4, 5]) && $user->password_changed == 0) {
                        // Redirect to change password page
                        redirect('login/change_password');
                    }
                }

                switch ($user->id_role) {
                    case 1:
                        redirect('dashboard');
                        break;
                    case 2:
                        redirect('dashboardmahasiswa');
                        break;
                    case 3:
                        redirect('dashboardadmin');
                        break;
                    case 4:
                        redirect('dashboardtendik');
                        break;
                    case 5:
                        redirect('dashboarddosen');
                        break;
                    default:
                        $this->session->set_flashdata('error', 'Role tidak valid.');
                        redirect('login');
                        break;
                }
            } else {
                $this->session->set_flashdata('error', 'user id atau Password salah');
                redirect('login');
            }
        }
    }

    public function change_password()
    {
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/change_password');
        } else {
            $id_user = $this->session->userdata('id_user');
            $new_password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);

            // Panggil fungsi update_password yang sudah dimodifikasi
            $this->LoginModel->update_password($id_user, $new_password); 

            $this->session->set_flashdata('success', 'Password berhasil diubah, silakan login kembali.');

            // Redirect to login page 
            redirect('login'); 
        }
    }

    public function logout()
    {
        delete_cookie('user_session');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_role');
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

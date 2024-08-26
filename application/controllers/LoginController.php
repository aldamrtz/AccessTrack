<?php
class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('login_approval');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $admin = $this->LoginModel->validate($username, $password);
        
        if ($admin) {
            // Set session data
            $this->session->set_userdata('username', $username);
            redirect('ApprovalLoginDomainController'); // arahkan ke controller ApprovalLoginDomain
        } else {
            $data['error'] = "Invalid username or password!";
            $this->load->view('login_approval', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        redirect('LoginController');
    }
}

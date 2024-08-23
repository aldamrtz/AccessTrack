<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KartuAkses_model');
        $this->load->library('session');
    }

    public function handleKartuAksesSubmission() {
        $role = $this->getUserRole();
        $this->setValidationRule($role);

        if ($this->form_validation->run() == FALSE) {
            $this->loadSubmissionForm();
        } else {
            $this->processSubmission($role);
        }
    }

    private function getUserRole() {
        return $this->session->userdata('role');
    }

}
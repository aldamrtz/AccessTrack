<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_role')) {
    function check_role($allowed_roles = array())
    {
        $CI = &get_instance();
        $user_role = $CI->session->userdata('id_role');

        if (!in_array($user_role, $allowed_roles)) {
            $CI->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('login');
        }
    }
}
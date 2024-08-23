<?php
class AdminController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $captcha = $_POST['captcha'];

            // Validasi CAPTCHA di sini

            $admin = $this->model->getAdminByUsername($username);

            if ($admin && password_verify($password, $admin['password'])) {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                header('Location: dashboard.php');
                exit;
            } else {
                $error = 'Username atau Password salah';
                include 'views/login_view.php';
            }
        } else {
            include 'views/login_view.php';
        }
    }
}
?>

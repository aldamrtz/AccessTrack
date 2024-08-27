<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?= base_url('assets/img/Unjani.png'); ?>" type="image/png">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <img src="<?= base_url('assets/img/Unjani.png'); ?>" alt="Logo Unjani">
            <h2>Access Track</h2>
        </div>
        <div class="login-box">
            <h3>Login</h3>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('login/authenticate'); ?>" method="POST">
                <div class="input-group">
                    <!-- <label for="username">Masukkan Email/Username</label> -->
                    <input type="text" id="username" name="username" placeholder="Masukkan Email/Username" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="mb-3">
                    <img src="<?= site_url('CaptchaController/generateCaptcha') . '?t=' . time(); ?>" alt="Captcha">
                </div>
                <div class="input-group">
                    <input type="text" id="captcha" name="captcha" placeholder="Masukkan Kode Diatas" required>
                </div>

                <div class="input-group">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link rel="icon" href="<?= base_url('assets/img/Unjani.png'); ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>"> </head>

<body>
    <div class="login-wrapper">
        <div class="login-header">
            <img src="<?= base_url('assets/img/Unjani.png'); ?>" alt="Logo Unjani">
            <h2>Access Track</h2>
        </div>
        <div class="login-box">
            <h3>Ganti Password</h3>
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('login/change_password'); ?>" method="POST">
                <div class="input-group">
                    <input type="password" id="new_password" name="new_password" placeholder="Password Baru" required>
                </div>
                <div class="input-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                </div>
                <div class="input-group">
                    <button type="submit">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
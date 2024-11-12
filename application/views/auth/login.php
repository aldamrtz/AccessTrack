<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?= base_url('assets/img/Unjani.png'); ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $this->config->item('recaptcha_site_key'); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?= $this->config->item('recaptcha_site_key'); ?>', { action: 'login' }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
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
                    <input type="text" id="id_user" name="id_user" placeholder="Masukkan ID User" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>

                <!-- reCAPTCHA Token -->
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

                <div class="input-group">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
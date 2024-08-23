<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/assets/css/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="login-container">
        <img src="logo.png" alt="Logo Universitas" class="logo">
        <h2>Acces Track</h2>
        <h3>Login</h3>
        <form action="index.php?controller=AdminController&action=login" method="POST">
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Masukan Email/Username" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Masukan Password/Sandi" required>
            </div>
            <div class="input-group captcha">
                <img src="captcha.php" alt="CAPTCHA Image">
                <input type="text" id="captcha" name="captcha" placeholder="Masukan Kode Diatas" required>
            </div>
            <button type="submit">Masuk</button>
        </form>
        <?php if(isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

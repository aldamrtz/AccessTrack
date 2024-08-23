<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Track - Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to right, #a29bfe, #6c5ce7);
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .login-header {
            background-color: #6c5ce7;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: relative;
            margin-bottom: 20px;
        }

        .login-header img {
            width: 100px;
            height: auto;
            border-radius: 50%;
            background-color: #fff;
            padding: 10px;
            margin-top: -60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .login-box h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #6c5ce7;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .input-group button {
            width: 100%;
            padding: 10px;
            background-color: #6c5ce7;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-group button:hover {
            background-color: #4c3ee0;
        }

        .alert {
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <img src="<?= base_url('assets/img/Unjani.png'); ?>" alt="Logo Unjani">
            <h2>Access Track</h2>
        </div>
        <div class="login-box">
            <h3>Login</h3>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('login/authenticate'); ?>" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

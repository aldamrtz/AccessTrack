<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><?= $title ?></h2>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <?php if (isset($success)) { ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php } ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nim">Nomor Induk (NIM, NID, NIP)</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="prodi">Unit Kerja/Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" required>
        </div>
        <div class="form-group">
            <label for="email_diajukan">Email yang Diajukan</label>
            <input type="email" class="form-control" id="email_diajukan" name="email_diajukan" required>
        </div>
        <div class="form-group">
            <label for="email_pengguna">Email Pengguna</label>
            <input type="email" class="form-control" id="email_pengguna" name="email_pengguna" required>
        </div>
        <div class="form-group">
            <label for="ktm">KTM/ID Card</label>
            <input type="text" class="form-control" id="ktm" name="ktm" required>
        </div>
        <div class="form-group">
            <label for="captcha_image">Captcha</label>
            <img src="<?= base_url('public/captcha.php') ?>" alt="CAPTCHA" class="d-block mb-2">
            <input type="text" class="form-control" id="captcha_image" name="captcha" required>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

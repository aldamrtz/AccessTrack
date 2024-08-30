<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pelaporan Insiden CSIRT</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/csirt_report.css'); ?>">
    <script src="<?php echo base_url('assets/js/validateForm.js'); ?>" defer></script>
</head>
<body>
    <div class="container">
        <img src="<?php echo base_url('assets/img/Unjani.png'); ?>" alt="Unjani Logo" class="logo">
        <h2>Formulir Pelaporan Insiden CSIRT</h2>
        <form action="<?php echo site_url('csirt/submit_report'); ?>" method="post" enctype="multipart/form-data">
            <label for="email_pelapor">Email Pelapor</label>
            <input type="email" name="email_pelapor" id="email_pelapor" required>
            <div id="email_error" class="error-message"></div>

            <label for="nama_pelapor">Nama Pelapor</label>
            <input type="text" name="nama_pelapor" id="nama_pelapor" required>

            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" required>
            <div id="nip_error" class="error-message"></div>

            <label for="fakultas">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" required>

            <label for="bagian">Bagian</label>
            <input type="text" name="bagian" id="bagian" required>

            <label for="nama_website">Nama Website</label>
            <input type="text" name="nama_website" id="nama_website" required>

            <label for="deskripsi_masalah">Deskripsi Masalah</label>
            <textarea name="deskripsi_masalah" id="deskripsi_masalah" rows="4" required></textarea>

            <label for="bukti_file">Bukti File</label>
            <input type="file" name="bukti_file" id="bukti_file" accept=".png, .jpg, .jpeg, .pdf" required>
            <div id="file_error" class="error-message"></div>

            <button type="submit" id="submit_button" class="disabled-button" disabled>Kirim Laporan</button>
        </form>
    </div>
</body>
</html>
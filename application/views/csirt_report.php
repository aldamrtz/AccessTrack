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
            <select class="form-select" id="fakultas" name="fakultas">
                        <option value="" disabled selected>Pilih Fakultas</option>
                        <option value="Fakultas Sains dan Informatika">Fakultas Sains dan Informatika</option>
                        <option value="Fakultas Teknik Metalurgi">Fakultas Teknik Metalurgi</option>
                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                        <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                        <option value="Fakultas Ilmu Sosial dan Ilmu Politik">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                        <option value="Fakultas Farmasi">Fakultas Farmasi</option>
                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                        <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                        <option value="Fakultas Ilmu Teknologi Kesehatan">Fakultas Ilmu Teknologi Kesehatan</option>
                        <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                        </select>

            <label for="jurusan">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="Teknik Elektro S-1">Teknik Elektro S-1</option>
                        <option value="Teknik Kimia S-1">Teknik Kimia S-1</option>
                        <option value="Teknik Sipil S-1">Teknik Sipil S-1</option>
                        <option value="Magister Teknik Sipil S-2">Magister Teknik Sipil S-2</option>
                        <option value="Teknik Geomatika S-1">Teknik Geomatika S-1</option>
                        <option value="Teknik Mesin S-1">Teknik Mesin S-1</option>
                        <option value="Teknik Industri S-1">Teknik Industri S-1</option>
                        <option value="Teknik Metalurgi S-1">Teknik Metalurgi S-1</option>
                        <option value="Magister Manajemen Teknologi S-2">Magister Manajemen Teknologi S-2</option>
                        <option value="Akuntansi S-1">Akuntansi S-1</option>
                        <option value="Manajemen S-1">Manajemen S-1</option>
                        <option value="Magister Manajemen S-2">Magister Manajemen S-2</option>
                        <option value="Ilmu Pemerintahan S-1">Ilmu Pemerintahan S-1</option>
                        <option value="Ilmu Hub. Internasional S-1">Ilmu Hub. Internasional S-1</option>
                        <option value="Magister Hub. Internasional S-2">Magister Hub. Internasional S-2</option>
                        <option value="Ilmu Hukum S-1">Ilmu Hukum S-1</option>
                        <option value="Magister Ilmu Pemerintahan S-2">Magister Ilmu Pemerintahan S-2</option>
                        <option value="Kimia S-1">Kimia S-1</option>
                        <option value="Magister Kimia S-2">Magister Kimia S-2</option>
                        <option value="Teknik Informatika S-1">Teknik Informatika S-1</option>
                        <option value="Sistem Informasi S-1">Sistem Informasi S-1</option>
                        <option value="Psikologi S-1">Psikologi S-1</option>
                        <option value="Farmasi S-1">Farmasi S-1</option>
                        <option value="Profesi Apoteker">Profesi Apoteker</option>
                        <option value="Magister Farmasi S-2">Magister Farmasi S-2</option>
                        <option value="Pendidikan Dokter S-1">Pendidikan Dokter S-1</option>
                        <option value="Profesi Dokter">Profesi Dokter</option>
                        <option value="Administrasi Rumah Sakit S-1">Administrasi Rumah Sakit S-1</option>
                        <option value="Magister Penuaan Kulit dan Estetika S-2">Magister Penuaan Kulit dan Estetika S-2</option>
                        <option value="Kedokteran Gigi S-1">Kedokteran Gigi S-1</option>
                        <option value="Profesi Dokter Gigi">Profesi Dokter Gigi</option>
                        <option value="Kedokteran Umum S-1">Kedokteran Umum S-1</option>
                        <option value="Profesi Dokter Umum">Profesi Dokter Umum</option>
                        <option value="Administrasi Rumah Sakit S-1">Administrasi Rumah Sakit S-1</option>
                        <option value="Magister Keperawatan S-2">Magister Keperawatan S-2</option>
                        <option value="Profesi Ners">Profesi Ners</option>
                        <option value="Ilmu Keperawatan S-1">Ilmu Keperawatan S-1</option>
                        <option value="Keperawatan D-3">Keperawatan D-3</option>
                        <option value="Kesehatan Masyarakat S-1">Kesehatan Masyarakat S-1</option>
                        <option value="Teknologi Laboratorium Medis D-4">Teknologi Laboratorium Medis D-4</option>
                        <option value="Teknologi Laboratorium Medis D-3">Teknologi Laboratorium Medis D-3</option>
                        <option value="Kebidanan S-1">Kebidanan S-1</option>
                        <option value="Profesi Bidan">Profesi Bidan</option>
                        </select>

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
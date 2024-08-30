<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berhasil</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/csirt_report.css'); ?>">
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <!-- Ikon centang hijau menggunakan SVG -->
            <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="12" fill="#28a745"/>
                <path d="M17 8L10 15L7 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2>Laporan Berhasil Dikirim!</h2>
        <p>Terima kasih, laporan Anda telah berhasil dikirim. Kami akan segera memprosesnya.</p>
        <a href="<?php echo base_url(); ?>" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>
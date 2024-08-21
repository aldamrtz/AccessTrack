<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5fa;
        }

        .alert-success {
            background-color: #e9d8fd;
            border-color: #d8b4fe;
            color: #5a189a;
            border-radius: 8px;
        }

        h4 {
            color: #5a189a;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #6a0dad;
            border-color: #6a0dad;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4b0082;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container my-5 text-center">
        <div class="alert alert-success shadow-lg p-4" role="alert">
            <h4 class="alert-heading">Pengajuan Sukses!</h4>
            <p>Pengajuan kartu akses Anda telah berhasil dikirim. Mohon tunggu konfirmasi lebih lanjut melalui email.</p>
            <hr>
            <p class="mb-0">Terima kasih telah menggunakan layanan kami.</p>
        </div>
        <a href="<?= base_url('access'); ?>" class="btn btn-primary mt-4">Kembali ke Beranda</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

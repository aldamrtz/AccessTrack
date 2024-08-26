<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengajuan</title>
    <!-- Memuat CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Internal -->
    <style>
        body {
            background-color: #f5f5fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            color: #5a189a;
            font-weight: bold;
        }

        p {
            color: #555;
        }

        a {
            color: #6a0dad;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #4b0082;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Terima kasih atas pengajuan Anda!</h1>
        <p>Pengajuan kartu akses Anda telah diterima. Kami akan memprosesnya secepat mungkin.</p>
        <a href="<?= base_url('access'); ?>">Kembali ke Form</a>
    </div>
</body>
</html>

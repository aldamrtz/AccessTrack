<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #5a189a;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            color: #333;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #6a0dad;
            border-color: #6a0dad;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #4b0082;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Pengajuan Berhasil!</h1>
        <p>Terima kasih atas pengajuan Anda. Kami akan segera memprosesnya.</p>
        <a href="<?= base_url('access/form'); ?>" class="btn btn-primary">Kembali</a>
    </div>
</body>
</html>
